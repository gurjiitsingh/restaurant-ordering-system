<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gstadeveloperRestaurant
 */
defined( 'ABSPATH' ) || exit;
get_header();
?>
<style>

</style>

<?php

global $set_product_cat;
global $set_product_cat_name;
$set_product_cat_name = "";
if (isset($_GET['add-to-cart'])) {
 //   echo $_GET['add-to-cart'];

    global $product;
$set_product_cat = get_the_terms( $_GET['add-to-cart'], 'product_cat' );
$set_product_cat_name =  $set_product_cat[0]->name;
$set_product_cat_name_l = strtolower($set_product_cat_name);
} else {
    // Fallback behaviour goes here
}

?>


<div class="container">
    <main id="primary" class="site-main">


        <!-- Tab links -->
        <div class="scrolling-wrapper">
 
  <div class="card">
        <div class="tab">

            <?php




            $i=0;
$args = array('taxonomy'     => 'product_cat');
$all_categories = get_categories( $args );

 foreach ($all_categories as $cat) {
    $l_catName = strtolower($cat->name); 




    if($set_product_cat_name){
        
        if($set_product_cat_name==$cat->name){?>
            <button class="tablinks active"
                onclick="openCity(event, '<?php echo $l_catName; ?>')"><?php echo $cat->name; ?></button>
            <?php
        }else{
?>
            <button class="tablinks"
                onclick="openCity(event, '<?php echo $l_catName; ?>')"><?php echo $cat->name; ?></button>
            <?php
        }

    }else{
        if($i==0):
            $i++;
        ?>
            <button class="tablinks active"
                onclick="openCity(event, '<?php echo $l_catName; ?>')"><?php echo $cat->name; ?></button>
            <?php  else:  ?>
            <button class="tablinks"
                onclick="openCity(event, '<?php echo $l_catName; ?>')"><?php echo $cat->name; ?></button>
            <?php
        endif; 
    }
   
   
            
 }
?>

        </div>
      
        </div>

</div>

        <!-- Display Tabs content -->
        <?php
        
        $i=0;
foreach ($all_categories as $cat) {
    $l_catName = strtolower($cat->name); 
         


    
if($set_product_cat_name){
    
    if($set_product_cat_name==$cat->name){
      //  echo $set_product_cat_name;
        ?>
        <div style="display:block;" id="<?php echo $l_catName; ?>" class="tabcontent active">
            <?php
    }else{
        ?>
            <div id="<?php echo $l_catName; ?>" class="tabcontent">
                <?php
    }
}else{

    if($i==0):
        $i++;
    ?>
                <div style="display:block;" id="<?php echo $l_catName; ?>" class="tabcontent active">
                    <?php
  else:
    ?>
                    <div id="<?php echo $l_catName; ?>" class="tabcontent">
                        <?php
    endif;

}



  
    ?>

                        <?php
         
         $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1
        
      );

      $posts = new WP_Query($args);
      if ($posts->have_posts()) {
        while ($posts->have_posts()) {
          $posts->the_post();
          
          // Output the post title with a link
          //echo '<a href="'.get_the_permalink() . '">'.get_the_title() .'</a><br>';
          $post_id = get_the_ID(); // Get the current post ID
          $categories = get_the_category($post_id);
          $products_categories = get_the_terms( get_the_ID(), 'product_cat' );
          $cat_name = $products_categories[0]->name;

          $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
         // var_dump($products_categories);
          //echo $cat->name."<br>";
         // echo $cat_name."<br>";
          //$cat_name = $products_categories[0]->name;
          if($cat->name == $cat_name){
            ?>
                        <li class='menu-product-flex'>
                            <div class="menu-product-img">
                                <img src="<?php echo $image[0]; ?>"
                                    alt="<?php echo wp_get_attachment_caption( get_the_ID() )?>">
                            </div>


                            <div class="menu-product-title">
                                <h3 class=""><?php echo get_the_title(); ?></h3>
                                <p><?php 
                         echo do_shortcode( "[product_description]" );
                             ?>
                             </p>
                            </div>


                            <div class="menu-product-pr-ad">

                                <div class="menu-product-price">

                                
                               <?php
                             //  '<a href="%s" data-quantity="1" class="%s" %s>%s</a>'
                echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( implode( ' ', array_filter( array(
                        'button', 'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                    ) ) ) ),
                    wc_implode_html_attributes( array(
                        'data-product_id'  => $product->get_id(),
                        'data-product_sku' => $product->get_sku(),
                        'aria-label'       => $product->add_to_cart_description(),
                        'rel'              => 'nofollow',
                    ) ),
                    esc_html( $product->add_to_cart_text() )
                );
              ?>
                                    <?php 
                                    //wc_get_template( 'loop/add-to-cart.php' );/ ?>
                                </div>
                                <div class="menu-product-price">
                                    <?php wc_get_template( 'loop/price.php' ); ?>
                                </div>

                            </div>



                        </li>
                        <?php
          }
      
             
      
     // $obje = ["title"=>get_the_title(),"link"=>get_the_permalink(),"cat"=>$cat_name];
      
        //  array_push($stack,$obje);
        }
      } else {
        echo 'no found';
      }
      wp_reset_query();





         ?>
                    </div> <?php
        }
?>


                    <br /><br />

    </main><!-- #main -->
</div>
<?php
// get_sidebar();
get_footer();

?>

<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>




<?php



wp_reset_query();