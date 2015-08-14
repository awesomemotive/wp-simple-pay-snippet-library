<?php

// This action will completely overwrite the default charge function of SC Pro - it should be used 
// with extreme caution!
// It is mainly intended for add-on plugins that want to add specific functionality that the normal
// charge function can't handle itself.
// Below is an example of how the SC Subscriptions Add-On utilizes it
function sc_sub_do_charge() {

    global $sc_options;

    $query_args = array();

    // Set redirect
    $redirect      = $_POST['sc-redirect'];
    $fail_redirect = $_POST['sc-redirect-fail'];
    $failed = null;

    $message = '';

    // Get the credit card details submitted by the form
    $token                 = $_POST['stripeToken'];
    $amount                = $_POST['sc-amount'];
    $description           = $_POST['sc-description'];
    $store_name            = $_POST['sc-name'];
    $currency              = $_POST['sc-currency'];

    $sub                   = ( isset( $_POST['sc_sub_id'] ) );
    $interval              = ( isset( $_POST['sc_sub_interval'] ) ? $_POST['sc_sub_interval'] : 'month' );
    $interval_count        = ( isset( $_POST['sc_sub_interval_count'] ) ? $_POST['sc_sub_interval_count'] : 1 );
    $statement_description = ( isset( $_POST['sc_sub_statement_description'] ) ? $_POST['sc_sub_statement_description'] : '' );

    $coupon                = ( isset( $_POST['sc_coup_coupon_code'] ) ? $_POST['sc_coup_coupon_code'] : '' );

    $test_mode             = ( isset( $_POST['sc_test_mode'] ) ? $_POST['sc_test_mode'] : 'false' );

    if( $sub ) {
        $sub = ( ! empty( $_POST['sc_sub_id'] ) ? $_POST['sc_sub_id'] : 'custom' );
    }

    sc_set_stripe_key( $test_mode );

    $meta = array();

    $meta = apply_filters( 'sc_meta_values', $meta );

    try {

        if( $sub == 'custom' ) {

            $timestamp = time();

            $plan_id = $_POST['stripeEmail'] . '_' . $amount . '_' . $timestamp;

            $name = __( 'Subscription:', 'sc' ) . ' ' . sc_stripe_to_formatted_amount( $amount, $currency ) . ' ' . strtoupper( $currency ) . '/' . $interval;

            // Create a plan
            $plan_args = array(
                'amount'                => $amount,
                'interval'              => $interval,
                'name'                  => $name,
                'currency'              => $currency,
                'id'                    => $plan_id,
                'interval_count'        => $interval_count
            );

            if( ! empty( $statement_description ) ) {
                $plan_args['statement_description'] = $statement_description;
            }

            $new_plan = Stripe_Plan::create( $plan_args );

            // Create a customer and charge
            $new_customer = Stripe_Customer::create( array(
                'email'    => $_POST['stripeEmail'],
                'card'     => $token,
                'plan'     => $plan_id,
                'metadata' => $meta
            ));

        } else {

            // Create new customer
            $cust_args = array(
                'email' => $_POST['stripeEmail'],
                'card'  => $token,
                'plan' => $sub,
                'metadata' => $meta
            );

            if( ! empty( $coupon ) ) {
                $cust_args['coupon'] = $coupon;
            }

            $new_customer = Stripe_Customer::create( $cust_args );

            // Set currency based on sub
            $plan = Stripe_Plan::retrieve( $sub );

            //echo $subscription . '<Br>';
            $currency = strtoupper( $plan->currency );

        }

        // We want to add the meta data and description to the actual charge so that users can still view the meta sent with a subscription + custom fields
        // the same way that they would normally view it without subscriptions installed.
        // We need the steps below to do this

        // First we get the latest invoice based on the customer ID
        $invoice = Stripe_Invoice::all( array(
                'customer' => $new_customer->id,
                'limit' => 1 )
        );

        // If this is a trial we need to skip this part since a charge is not made
        $trial = $invoice->data[0]->lines->data[0]->plan->trial_period_days;

        if( empty( $trial ) ) {
            // Now that we have the invoice object we can get the charge ID
            $inv_charge = $invoice->data[0]->charge;

            // Finally, with the charge ID we can update the specific charge and inject our meta data sent from Stripe Custom Fields
            $ch = Stripe_Charge::retrieve( $inv_charge );
            $ch->metadata = $meta;

            if( ! empty( $description ) ) {
                $ch->description = $description;
            }

            $ch->save();

            $query_args = array( 'charge' => $ch->id, 'store_name' => urlencode( $store_name ) );

            $failed = false;
        } else {

            $sub_id = $invoice->data[0]->subscription;

            $query_args = array( 'cust_id' => $new_customer->id, 'sub_id' => $sub_id, 'trial' => true, 'store_name' => urlencode( $store_name ) );

            $failed = false;
        }

    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe

        $redirect = $fail_redirect;

        $failed = true;

        $e = $e->getJsonBody();

        $query_args = array( 'sub' => true, 'error_code' => $e['error']['type'], 'charge_failed' => true );
    }

    unset( $_POST['stripeToken'] );

    do_action( 'sc_redirect_before' );

    if( $test_mode == 'true' ) {
        $query_args['test_mode'] = 'true';
    }

    wp_redirect( add_query_arg( $query_args, apply_filters( 'sc_redirect', $redirect, $failed ) ) );

    exit;
}
if( isset( $_POST['sc_sub_id'] ) ) {
    add_action( 'sc_do_charge', 'sc_sub_do_charge' );
}