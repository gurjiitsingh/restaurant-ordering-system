0. to Overwrite woocommerce css add css in wordpress edit 'Aditional CSS' in dashboard

.add_to_cart_button{
width:fit-content !important;
}

1 Added div class "container" in page.php 

2. Overwrite archive-product.php by add woocomer folder.

3 Write css for single product  and added div class "container" for width


4. functions.php file edition
 /* for nav modification */

register_nav_menus(
		array(
			'menu-2' => esc_html__( 'Primary', 'gstadeveloperrestaurant' ),
			'header-menu'=> esc_html__( 'Header Menu', 'gstadeveloperrestaurant1' )
		)
	);


	class AWP_Menu_Walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
			$output .= "<li>";
	 
			if ($item->url && $item->url != '#') {
				$output .= '<a class="main-nav-link" href="' . $item->url . '">';
			} else {
				$output .= '<span>';
			}
	 
			$output .= $item->title;
	 
			if ($item->url && $item->url != '#') {
				$output .= '</a>';
			} else {
				$output .= '</span>';
			}
		}
	}




5 inc/woocommer.php 

/*added code for change button text */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_change_add_to_cart_text' );

function woocommerce_change_add_to_cart_text() {

    return __( 'Order Now', 'woocommerce' );

}

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_change_archive_product_page_add_to_cart_text' );  

function woocommerce_change_archive_product_page_add_to_cart_text() {

    return __( 'Order Now', 'woocommerce' );

}




/*** woocommer theme support ***/