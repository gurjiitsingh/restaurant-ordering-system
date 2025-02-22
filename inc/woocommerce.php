<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package gstadeveloperRestaurant
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function gstadeveloperrestaurant_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'gstadeveloperrestaurant_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function gstadeveloperrestaurant_woocommerce_scripts() {
	//wp_enqueue_style( 'gstadeveloperrestaurant-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'gstadeveloperrestaurant-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'gstadeveloperrestaurant_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function gstadeveloperrestaurant_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'gstadeveloperrestaurant_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function gstadeveloperrestaurant_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'gstadeveloperrestaurant_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'gstadeveloperrestaurant_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function gstadeveloperrestaurant_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'gstadeveloperrestaurant_woocommerce_wrapper_before' );

if ( ! function_exists( 'gstadeveloperrestaurant_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function gstadeveloperrestaurant_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'gstadeveloperrestaurant_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'gstadeveloperrestaurant_woocommerce_header_cart' ) ) {
			gstadeveloperrestaurant_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'gstadeveloperrestaurant_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function gstadeveloperrestaurant_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		gstadeveloperrestaurant_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'gstadeveloperrestaurant_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'gstadeveloperrestaurant_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function gstadeveloperrestaurant_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'gstadeveloperrestaurant' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'gstadeveloperrestaurant' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'gstadeveloperrestaurant_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function gstadeveloperrestaurant_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php gstadeveloperrestaurant_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


/*added code for change button text */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_change_add_to_cart_text' );

function woocommerce_change_add_to_cart_text() {

    return __( 'Add', 'woocommerce' );

}

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_change_archive_product_page_add_to_cart_text' );  

function woocommerce_change_archive_product_page_add_to_cart_text() {

    return __( 'Add', 'woocommerce' );

}




//************************************************************* 
                /*Minimum payment to order a food
//*********************************************************** */




//$total_cart = WC()->cart->get_displayed_subtotal(); // without taxs and shipping fees

// $cart_subtotal = WC()->cart->get_cart_subtotal();;
//echo $total_cart; 
// global $woocommerce;
 //echo $woocommerce->cart->total;
// debug_to_console($woocommerce->cart->total);

// add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
// add_action( 'woocommerce_before_cart', 'wc_minimum_order_amount' );

// function wc_minimum_order_amount() {
//     // Set your minimum order amount here
//     $minimum_order_amount = 9.99;



//     if ( WC()->cart->total < $minimum_order_amount ) {
//         if ( is_cart() ) {
//             wc_print_notice( 
//                 sprintf( 'You must have an order with a minimum of %s to proceed to checkout.', 
//                 wc_price( $minimum_order_amount ) ), 'error' 
//             );
//         } else {
//             wc_add_notice( 
//                 sprintf( 'You must have an order with a minimum of %s to proceed to checkout.', 
//                 wc_price( $minimum_order_amount ) ), 'error' 
//             );
//         }
//     }
// }



// Set a minimum amount of order based on shipping zone & shipping method before checking out.

//add_action( 'woocommerce_check_cart_items', 'cw_min_num_products' );

// Only run in the Cart or Checkout pages.
// function cw_min_num_products() {
//     if ( is_cart() || is_checkout() ) {
//         global $woocommerce;

//         // Set the minimum order amount, shipping zone & shipping method before checking out.
//         $minimum         = 25;
//         $county          = array( 'GR' );
//         $chosen_shipping = WC()->session->get( 'chosen_shipping_methods' )[0];
//         $chosen_shipping = explode( ':', $chosen_shipping );

//         // Defining var total amount.
//         $cart_tot_order = WC()->cart->subtotal;

//         // Compare values and add an error in Cart's total amount.
//         // happens to be less than the minimum required before checking out.
//         // Will display a message along the lines.
//         if ( $cart_tot_order < $minimum && in_array( WC()->customer->get_shipping_country(), $county ) && $chosen_shipping[0] != 'local_pickup' ) {
//             // Display error message.
//             wc_add_notice(
//                 sprintf(
//                     'Δεν έχετε φτάσει ακόμη το ελάχιστο ποσό παραγγελίας των %s€.' . '<br/>Δεν υπάρχει ελάχιστη παραγγελία εάν επιλέξετε την παραλαβή από το κατάστημα.'
//                     . '<br />Το τρέχον ποσό της παραγγελίας σας είναι : %s€.',
//                     $minimum,
//                     $cart_tot_order
//                 ),
//                 'error'
//             );
//         }
//     }
// }