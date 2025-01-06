<?php

// $current_shipping_method = WC()->session->get( 'chosen_shipping_methods' );
// if($current_shipping_method[0] !== "pickup_location:0"){
// echo $current_shipping_method[0];

// }


function prefix_add_discount_line( $cart ) {

  //$shipping_id = WC()->session->get( 'chosen_shipping_methods' )[0];
  $current_shipping_method = WC()->session->get( 'chosen_shipping_methods' );
  
  if(!is_null($current_shipping_method)){
  if($current_shipping_method[0] === "pickup_location:0"){
  //echo $current_shipping_method[0];
  $discount = $cart->subtotal * 0.2;
  
	$cart->add_fee( __( 'Pickup Discunt', 'yourtext-domain' ) , -$discount );
  }
}
  
	  
  }
  add_action( 'woocommerce_cart_calculate_fees', 'prefix_add_discount_line' );



  //add_action( 'init', 'get_packages_custom' );

function get_packages_custom() {

//print_r(WC()->cart->calculate_totals());
//print_r(WC()->cart->calculate_shipping());

}



/**
 * Change the default state and country on the checkout page
 */
// add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
// add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );

// function change_default_checkout_country() {
//   return '49'; // country code
// }

// function change_default_checkout_state() {
//   return '49'; // state code
// }

/**
 * show dashicome on frot end
 */
function ww_load_dashicons(){
  wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons', 999);


?> 