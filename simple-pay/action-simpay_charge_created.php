<?php

// Do something right after a Stripe charge is recorded.
// For charge response info see: https://stripe.com/docs/api#charge_object

function simpay_do_something_after_charge( $charge ) {
	// Do anything with Stripe's $charge object here.
	// See how AffiliateWP adds a referral using this hook in
	// https://github.com/affiliatewp/AffiliateWP/blob/master/includes/integrations/class-stripe.php
}

add_filter( 'simpay_charge_created', 'simpay_do_something_after_charge' );
