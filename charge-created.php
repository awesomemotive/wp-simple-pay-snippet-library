<?php
/**
 * Plugin Name: WP Simple Pay - Charge Created
 * Plugin URI: https://wpsimplepay.com
 * Description: Perform an action right after a successful Stripe charge is completed.
 * Stripe charge response reference: https://stripe.com/docs/api#charge_object
 * Also see "simpay_subscription_created" action hook.
 * Version: 1.1
 */

/**
 * Generic template for acting on the Stripe charge object after a successful charge.
 */
function simpay_do_something_after_charge( $charge ) {

	/**
	 * See how AffiliateWP adds a referral using this hook in
	 * https://github.com/affiliatewp/AffiliateWP/blob/master/includes/integrations/class-stripe.php
	 */
}

add_action( 'simpay_charge_created', 'simpay_do_something_after_charge' );

/**
 * Send an email to the site admin after a charge has been successfully created.
 */
function simpay_custom_send_email_on_charge( $charge ) {

	$url    = site_url();
	$amount = simpay_formatted_amount( $charge->amount );
	$email  = $charge->receipt_email;

	$to      = get_bloginfo( 'admin_email' );
	$subject = 'New WP Simple Pay Charge';
	$body    = sprintf( 'You have just received a payment of %1$s by %2$s on %3$s', $amount, $email, $url );
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	wp_mail( $to, $subject, $body, $headers );

}

add_action( 'simpay_charge_created', 'simpay_custom_send_email_on_charge' );
