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

// add_filter( 'formatted_woocommerce_price', 'ts_woo_decimal_price', 10, 5 );
// function ts_woo_decimal_price( $formatted_price, $price, $decimal_places, $decimal_separator, $thousand_separator ) {
// 	$unit = number_format( intval( $price ), 0, $decimal_separator, $thousand_separator );
// 	$decimal = sprintf( '%02d', ( $price - intval( $price ) ) * 100 );
// 	return $unit . '<sup>' . $decimal . '</sup>';}
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

	wp_enqueue_style( 'head-css', get_theme_file_uri() . '/header-css.css' );
	wp_enqueue_style( 'testimonial-css', get_theme_file_uri() . '/testimonial.css' );
	wp_enqueue_style( 'mywoocommerce-css', get_theme_file_uri() . '/woo.css' );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gstadeveloperrestaurant_scripts' );




add_action( 'wp_enqueue_scripts', 'techiepress_wp_enqueue_scripts' );
// <script
//   src="https://code.jquery.com/jquery-3.7.1.min.js"
//   integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
//   crossorigin="anonymous"></script>
function techiepress_wp_enqueue_scripts() {

	wp_enqueue_script( 'bootstrap-jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-bundle', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'bootstrap-jquery' ), '1.0.0', true );
	
	wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', '', '1.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', '', '1.0.0', 'all' );

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





//***************** Ajax for Bookings *************************







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