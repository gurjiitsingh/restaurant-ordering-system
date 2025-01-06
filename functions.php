<?php
/**
 * gstadeveloperRestaurant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gstadeveloperRestaurant
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
function add_support() 
{
   add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_support' );
add_filter('woocommerce_cart_needs_shipping_address','fun_return_shipping_param');

function fun_return_shipping_param($needs_shipping_address)
{

    $items = WC()->cart->get_cart();
    $product_ids = array();
    foreach($items as $item => $values) 
    { 
            $product_ids[] = $values['data']->get_id(); //You can get product id of product added in cart
    }
   // if(in_array($your_product_id, $product_ids)) // check whether your product is in cart
       $needs_shipping_address = false;

    return $needs_shipping_address;

}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gstadeveloperrestaurant_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gstadeveloperRestaurant, use a find and replace
		* to change 'gstadeveloperrestaurant' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gstadeveloperrestaurant', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-2' => esc_html__( 'Primary', 'gstadeveloperrestaurant' ),
			'header-menu'=> esc_html__( 'Header Menu', 'gstadeveloperrestaurant1' )
		)
	);


	class AWP_Menu_Walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
			
			$linkId = "iconId";
			if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $item->title)){
				$linkId = "iconId";;
			}else{
				$linkId = strtolower($item->title);
			}
			$output .= '<li id="'.$linkId.'">';
			if ($item->url && $item->url != '#') {
				$output .= '<a class="main-nav-link"  href="' . $item->url . '">';
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


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gstadeveloperrestaurant_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'gstadeveloperrestaurant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gstadeveloperrestaurant_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gstadeveloperrestaurant_content_width', 640 );
}
add_action( 'after_setup_theme', 'gstadeveloperrestaurant_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gstadeveloperrestaurant_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gstadeveloperrestaurant' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gstadeveloperrestaurant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gstadeveloperrestaurant_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gstadeveloperrestaurant_scripts() {
	
	wp_enqueue_style( 'gstadeveloperrestaurant-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gstadeveloperrestaurant-style', 'rtl', 'replace' );


	wp_enqueue_script( 'gstadeveloperrestaurant-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

//	wp_enqueue_style( 'head-css', get_theme_file_uri() . '/header-css.css' );
//	wp_enqueue_style( 'testimonial-css', get_theme_file_uri() . '/testimonial.css' );
//wp_enqueue_style( 'mywoocommerce-css', get_theme_file_uri() . '/woo.css' );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gstadeveloperrestaurant_scripts' );

function enqueue_styles(){
// wp_enqueue_style( 'gstadeveloperrestaurant-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'gstadeveloperrestaurant-style', 'rtl', 'replace' );
}
add_action( 'wp_head', 'enqueue_styles', 99 );


add_action( 'wp_enqueue_scripts', 'techiepress_wp_enqueue_scripts' );
// <script
//   src="https://code.jquery.com/jquery-3.7.1.min.js"
//   integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
//   crossorigin="anonymous"></script>
function techiepress_wp_enqueue_scripts() { 

	wp_enqueue_script( 'bootstrap-jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'bootstrap-bundle', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'bootstrap-jquery' ), '1.0.0', true );
	
	wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', '', '1.0.0', 'all' );
	//wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', '', '1.0.0', 'all' );

  //wp_enqueue_script('my-custom-script',get_template_directory_uri().'/js/custom.js',array('jquery'),'1.0',true);
   // wp_localize_script('my-cutom-script', 'ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
	
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * additions by me.
 */
require get_template_directory() . '/inc/extra.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}




/**********************/
   //EXTRA BY ME



   add_shortcode( 'product_description', 'display_product_description' );
function display_product_description( $atts ){
    $atts = shortcode_atts( array(
        'id' => get_the_id(),
    ), $atts, 'product_description' );

    global $product;

    if ( ! is_a( $product, 'WC_Product') )
        $product = wc_get_product($atts['id']);

    return $product->get_description();
}





//add_action( 'woocommerce_before_main_content', 'add_div' );

add_action('woocommerce_before_shop_loop_item', 'action_woocommerce_before_shop_loop_item', 10, 0);
function action_woocommerce_before_shop_loop_item( ) {
   echo "<div class='demo_div_wrapper'>";
};


/**
 * @snippet       WooCommerce: Redirect to Custom Thank you Page
 */
  
//  add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
  
//  function bbloomer_redirectcustom( $order_id ){
// 	 $order = wc_get_order( $order_id );
// 	 $url = 'http://localhost/0-websites/restaurant/thanks';
// 	 if ( ! $order->has_status( 'failed' ) ) {
// 		 wp_safe_redirect( $url );
// 		 exit;
// 	 }
//  }


/**
* FORM SUBMIT FOR TABLE BOOKING.
*/

/**
* Enqueue scripts and styles.
*/

function fancy_lab_scripts(){

	//wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'),null,true );
	
	//	 wp_enqueue_style( 'gsta-form', get_template_directory_uri() . '/form.css', array(), '1.0', 'all' );
	
	
	 }
	 add_action( 'wp_enqueue_scripts', 'fancy_lab_scripts' );
	
	// -------------------- my code start ------------------
	
	
	 function load_ajax() {
	
	wp_localize_script( 'main',
	 'cpm_object',
	array( 
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		 // generate a nonce with a unique ID "myajax-post-comment-nonce"
		// so that you can check it later when an AJAX request is sent
		'postCommentNonce' => wp_create_nonce( 'myajax-post-comment-nonce' ),
		'data_var_1' => 'value 1'
	)
	);
		
	}
	add_action('wp_enqueue_scripts', 'load_ajax');
	
	// THE AJAX ADD ACTIONS
	add_action( 'wp_ajax_set_form', 'set_form' );    //execute when wp logged in
	add_action( 'wp_ajax_nopriv_set_form', 'set_form'); //execute when logged out
	
	
	
	// function to send mail, insert message in database
	function set_form(){
	
		//CHeck  nonce FIRST HERE
	
	$nonce = $_POST['postCommentNonce'];
	
	// check to see if the submitted nonce matches with the
	// generated nonce we created earlier
	if ( ! wp_verify_nonce( $nonce, 'myajax-post-comment-nonce' ) ){
		die ( 'Busted!');
	}
	// code start for sending email
	
		 //$name = $_POST['$name1'];//sanitize_text_field($_POST['name']);
		 $name = $_POST['sender_name'];
		$email = $_POST['sender_email'];
	//	$message = "data";//$_POST['sender_message'];
	$book_date = $_POST['book_date'];
	$book_time = $_POST['book_time'];
	// Set the recipient email address.
			// FIXME: Update this to your desired email address.
			$recipient = "gurjiitsingh2@gmail.com";
	
			// Set the email subject.
			$subject = "Website contact form ". $name;
	
			// Build the email content.
			$email_content = "Name: $name\n";
			
		  //  $email_content .= "Phone: $phone\n";
			$email_content .= "Email: $email\n\n";
			$email_content .= "Date:\n$book_date\n";
			$email_content .= "Time:\n$book_time\n";
	
			// Build the email headers.
			$email_headers = "From: $name <$email>";
	
	//mail($recipient, $name, "message", "admin@infiniteplumbingsolutions.co.uk");
	if(mail($recipient, $subject, $email_content, $email_headers)) {
				// Set a 200 (okay) response code.
			  //  http_response_code(200);
				echo "Thank You! Your table booking info has been sent.";
			} else {
				// Set a 500 (internal server error) response code.
			  //  http_response_code(500);
				echo "Oops! Something went wrong and we couldn't send your message.";
			}
		//echo $name;
		 wp_die();
		//die();
	
	}
	
	
	// -------------------- my code end







//************************************************************* 
                /*Ajax for Bookings
//*********************************************************** */







add_action('after_setup_theme', 'mytheme_theme_setup');

if ( ! function_exists( 'mytheme_theme_setup' ) ){
    function mytheme_theme_setup(){
        add_action( 'wp_enqueue_scripts', 'mytheme_scripts');
    }
}

if ( ! function_exists( 'mytheme_scripts' ) ){
    function mytheme_scripts() {
        wp_enqueue_script( 'custom_js', get_template_directory_uri().'/js/my_voter_script.js', array( 'jquery'), '1.0.0', true );
        wp_localize_script( 'custom_js', 'ajax_object', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        ));
    }
}



// Add this action for logged-in users
add_action('wp_ajax_find_booking_record', 'find_booking_record');
// Add this action for non-logged-in users
add_action('wp_ajax_nopriv_find_booking_record', 'find_booking_record');


// Add this action for logged-in users
add_action('wp_ajax_save_value', 'save_value');
// Add this action for non-logged-in users
add_action('wp_ajax_nopriv_save_value', 'save_value');

add_action('wp_ajax_find_allready_booked', 'find_allready_booked');
// Add this action for non-logged-in users
add_action('wp_ajax_nopriv_find_allready_booked', 'find_allready_booked');



function save_value(){
$cc=0;
	global $wpdb;
			//$lastname = json_decode($_POST['lastName']);
				 $dropdown1 = $_POST['data'];

							
				$table = $wpdb->prefix . 'booking_table' ;   
				
				foreach($dropdown1 as $bd){

                  $cc++;
					$slot = $bd['slot'];
					
					$slot_start = (int)$slot;
				 $slot_end = (int)$slot +1;
				 
				 if($slot_start>12){
					 $ss1 = $slot_start - 12; 
					 $ss = $ss1 ." PM";
				 }else{
				 $ss = $slot_start ." AM";
				 }

				  if($slot_end>12){
					 $se1 = $slot_end - 12;
					 $se = $se1 ." PM";
				 }else{
				 $se = $slot_end ." AM";
				 }
$s_th = $ss."-".$se;
//$com_field = $bd['table_id']."-".$bd['slot']."-".$bd['date'];


                   

					$wpdb->insert($table, array(
						'name' => $bd['name'],
						'tablename' => $bd['table'],
						'table_id' => $bd['table_id'],
						'book_date' => $bd['date'],
						'phone' => $bd['phone'],
						'slot' => $bd['slot'],
						'slot_th' => $s_th,
						//'com_field' => $com_field,
					)); 

			//	$is_ok1 = $wpdb->insert_id;
			//	echo $is_ok1;
}			
				

//fetch data

$stack = array();
$search = "%{$bd['date']}%";
//echo $search;
$query = "SELECT * FROM $table WHERE book_date LIKE %s";
$query = $wpdb->prepare( $query, $search );

$table_data = $wpdb->get_results( $query, OBJECT );


foreach($table_data as $td){
	
	
	$obje = (object)["titleID"=>$td->table_id,"timeSlot"=>$td->slot,"bookDate"=>$td->book_date];
      
         array_push($stack,$obje);

	}

	echo json_encode($stack);

	die();
}


function find_allready_booked() {
    
	$date = $_POST['dateValue'];
	global $wpdb;
//FETCH ALREADY BOOKED SLOT DATA

$dataArray = array();
$search = "%{$bd['date']}%";
$table = $wpdb->prefix . 'booking_table' ;   
//echo $search;
$query = "SELECT * FROM $table WHERE book_date LIKE %s";
$query = $wpdb->prepare( $query, $search );
$table_data = $wpdb->get_results( $query, OBJECT );
foreach($table_data as $td){
	$obje = (object)["titleID"=>$td->table_id,"timeSlot"=>$td->slot,"bookDate"=>$td->book_date];
           array_push($dataArray,$obje);
	
	}
	echo json_encode($dataArray);
	
	die();
}



function find_allready_booked_slot($date) {
    
	$date = $_POST['dateValue'];
	global $wpdb;
//FETCH ALREADY BOOKED SLOT DATA

$dataArray = array();
$search = "%{$bd['date']}%";
$table = $wpdb->prefix . 'booking_table' ;   
//echo $search;
$query = "SELECT * FROM $table WHERE book_date LIKE %s";
$query = $wpdb->prepare( $query, $search );
$table_data = $wpdb->get_results( $query, OBJECT );
foreach($table_data as $td){
	$obje = (object)["tableID"=>$td->table_id,"timeSlot"=>$td->slot,"bookDate"=>$td->book_date];
           array_push($dataArray,$obje);
		
	}
	return $dataArray;
	
}

function find_booking_record() {
    
	$date = $_POST['dateValue'];

	$booking_records = find_allready_booked_slot($date);

	global $wpdb;
//FIND DATA ABOUT RESTURANT TABLE DATA
	
	$day_of_week = date('l', strtotime($date));
	$table_rt = $wpdb->prefix .'restaurant_table';
	$table = $wpdb->prefix .'day_slots';

	$query_table = "SELECT * FROM $table_rt";
$query = $wpdb->prepare( $query, $day_of_week );

$rs_table_data = $wpdb->get_results( $query_table, OBJECT );

$search = "%{$day_of_week}%";

$query = "SELECT * FROM $table WHERE name LIKE %s";
$query = $wpdb->prepare( $query, $day_of_week );

$table_data = $wpdb->get_results( $query, OBJECT );

?>
<?php
 $day_of_weekL = strtolower($day_of_week);

 if($day_of_weekL== 'sunday'){?> 
	<div class="booking-slot-cover">
 	<h3>

	 Restaurant remain closed on Sunday
	</h3>
     <p>Search for another day.</p>
	
 </div>
	<?php

}else{
	?>

<div class="booking-slot-cover">

    <h3> <?php echo sizeof($rs_table_data); ?> tables are available for booking</h3>
    <p>Use the boxes to select the time slot for the table reservation.<br />
        Choose all slots for the entire day.</p>


    <?php
$status = "";

foreach($rs_table_data as $td){
	
	?>
    <div class="table-data">
        <div class="table-tile">
            <h4>
                <?php
echo $td->name
?>
            </h4>
            <!-- <p>Select Time Slot</p> -->
        </div>
        <div class="slot-cover">
            <?php
//var_dump($table_data);

foreach($table_data as $table_datas){

//$name = $table_datas->name;
$slot = $table_datas->time;

$slot_start = (int)$slot;
$slot_end = (int)$slot +1;

if($slot_start>12){
	$ss = $slot_start -12 ."PM";
}else{
$ss = $slot_start ."AM";
}

if($slot_end>12){
	$se = $slot_end -12 ."PM";
}else{
$se = $slot_end ."AM";
}


?>



<?php 

foreach($booking_records as $booking_record){
	
	
	$booked_rec_id = $booking_record->timeSlot."-".$booking_record->tableID;
	if(($booked_rec_id == $slot."-".$td->id)&&($booking_record->bookDate==$date)){
     $status = "already-booked";
	}
}

?>
            <button class="slot-box <?php echo $status ?>" id="<?php echo $slot."-".$td->id ?>" data-slot="<?php echo $slot ?>"
                data-table="<?php echo $td->name ?>" data-tableid="<?php echo $td->id ?>"
                data-date="<?php echo $date ?>"><?php echo $ss ."<br/> to <br/>".$se; ?>

            </button>

            <?php
			$status = "";
}	
?>
        </div>
    </div><!-- end of table div -->
    <?php

}//end of tables

?>
</div><!-- end of booking slot cover -->

<?php
	}// end of if sunday
	die();
}// end of function

//exit();

