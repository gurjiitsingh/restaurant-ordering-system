<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gstadeveloperRestaurant
 */

get_header();
?>


<!-- start of new hero -->


<section class="site-hero-section" id="hero-section">

    <div class="hero-section-bg">

        <div class="container">
            <div class="food-section-inner-cover">
                <div class="hero-section-flex">
                    <div class="hero-section-col">

                        <div class="food-box">
                            <div class="gsta-wrapper">
                                <img src="<?php echo get_theme_file_uri('/img/stars.png') ?>" alt="" loading="lazy"
                                    class="image-class-12 " data-aos="fade-down" data-aos-easing="linear"
                                    data-aos-duration="1500">
                            </div>
                            <h1 class="gb-headline-hero-left-h1">
                                The ultimate food experience
                            </h1>
                            <p class="text-[1rem] lg:text-[1.5rem] font-Josefin">
                            Welcome to Masala-, where culinary boundaries blur and flavors unite in a symphony of taste. 
                            <!-- <h5 class="gsta-heading gsta-heading-u69d7ird "><span>Marino
                                    Yunkky
                                </span></h5> -->
                            <div class="button-menu-container">

                                <a class="gb-button gsta-hero-button gb-button-text" data-aos="fade-left"
                                    href="<?php echo site_url('/menu'); ?>">ORDER FOOD</a>




                             

                            </div>

                        </div>

                    </div><!-- col end -->

                    <div class="hero-section-col">
                        <div class="hero-section-col-inner-right">
                            <div class="flyer-wrapper"><img src="<?php echo get_theme_file_uri('/img/delicious.webp') ?>"
                                    alt="" loading="lazy" class="flyer-image">
                            </div>

                        </div>

                    </div><!-- col end -->




                </div>
            </div>
        </div>
    </div><!-- end of hero-section container -->
    </div>
</section>


<!-- end of new hero -->
<div class="gb-container-ticker">
    <div class="gb-container-ticker-in2">
        <div class="container">

            <div class="gb-container-ticker-in3">


                <div class="gb-grid-column" data-aos="fade-right">
                    <div class="tikker-item">

                        <figure class="gb-block-image image-align"><img decoding="async" class="gb-image gs-image-width"
                                src="<?php echo get_theme_file_uri('/img/deliveroo_logo.svg') ?>" alt=""
                                title="deliveroo_logo" /></figure>

                    </div>
                </div>

                <div class=" gb-grid-column" data-aos="fade-left">
                    <div class="tikker-item">



                        <figure class="gb-block-image image-align"><img decoding="async" class="gb-image gs-image-width"
                                src="<?php echo get_theme_file_uri('/img/uber-eats_logo.svg') ?>" alt=""
                                title="uber-eats_logo" /></figure>

                    </div>
                </div>

                <div class="gb-grid-column" data-aos="fade-right">
                    <div class="tikker-item">

                        <figure class="gb-block-image image-align"><img decoding="async"
                                class="gb-image gb-image-ea9f270f gs-image-width"
                                src="<?php echo get_theme_file_uri('/img/postmates_logo.svg') ?>" alt=""
                                title="postmates_logo" /></figure>

                    </div>
                </div>

                <div class="gb-grid-column" data-aos="fade-left">
                    <div class="tikker-item">

                        <figure class="gb-block-image image-align"><img decoding="async" class="gb-image gs-image-width"
                                src="<?php echo get_theme_file_uri('/img/DoorDash_logo.svg') ?>" alt=""
                                title="DoorDash_logo" /></figure>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear-both h-12"></div>




    
<!-- start of product page -->


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


</section><!-- end of product page -->

<section class="" id="about">
    <div class="te">
        <div class="about-us-wapper">
            <div class="container">
            
            

            <?php
//echo do_shortcode("[product_page]");
?>


              
            </div>
        </div>
    </div>
</section>





<section class="food-type" id="food-types">
    <div class="food-type-bg">
        <div class="container">
            <h2 class="food-type-h2">Range of choice
            </h2>



            <h3 class="food-type-h3 aos-init aos-animate" data-aos="fade-down" data-aos-easing="linear"
                data-aos-duration="1500">Our cuisine</h3>


            <div class="gb-grid-wrapper food-type-inner-waper">
                <div class="gb-grid-column gb-grid-column-1">
                    <div class="gb-container-2 aos-init aos-animate" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="1500">

                        <figure class="gb-block-image gb-block-image-mb"><img decoding="async"
                                class="gb-image gb-image-width"
                                src="<?php echo get_theme_file_uri('/img/western-cousine_icon.svg') ?>" alt=""
                                title="western-cousine_icon"></figure>



                        <h4 class="gb-headline-ls-c">
                            Western</h4>



                        <p class="gb-headline-mb-c">Sed
                            mattis suscipit justo non interdum. Interdum et malesuada fames
                            ac ante ipsum primis in faucibus.</p>

                    </div>
                </div>

                <div class="gb-grid-column gb-grid-column-image aos-init aos-animate" data-aos="fade-right"
                    data-aos-easing="linear" data-aos-duration="1500">
                    <div class="gb-container-text-align">

                        <figure class="gb-block-image gb-block-image-mb"><img decoding="async"
                                class="gb-image gb-image-width"
                                src="<?php echo get_theme_file_uri('/img/greek-cousine_icon.svg') ?>" alt=""
                                title="greek-cousine_icon"></figure>



                        <h4 class="gb-headline-ls-c">Greek
                        </h4>



                        <p class="gb-headline-mb-c">Sed
                            mattis suscipit justo non interdum. Interdum et malesuada fames
                            ac ante ipsum primis in faucibus.</p>

                    </div>
                </div>

                <div class="gb-grid-column gb-grid-column-image aos-init aos-animate" data-aos="fade-left"
                    data-aos-easing="linear" data-aos-duration="1500">
                    <div class="gb-container-text-align">

                        <figure class="gb-block-image gb-block-image-mb"><img decoding="async"
                                class="gb-image gb-image-width"
                                src="<?php echo get_theme_file_uri('/img/japanese-cousine_icon.svg') ?>" alt=""
                                title="japanese-cousine_icon"></figure>



                        <h4 class="gb-headline-ls-c">
                            Japanese</h4>



                        <p class="gb-headline-mb-c">Sed
                            mattis suscipit justo non interdum. Interdum et malesuada fames
                            ac ante ipsum primis in faucibus.</p>

                    </div>
                </div>

                <div class="gb-grid-column gb-grid-column-image aos-init aos-animate" data-aos="fade-right"
                    data-aos-easing="linear" data-aos-duration="1500">
                    <div class="gb-container-text-align">

                        <figure class="gb-block-image gb-block-image-mb"><img decoding="async"
                                class="gb-image gb-image-width"
                                src="<?php echo get_theme_file_uri('/img/mexican-cousine_icon.svg') ?>" alt=""
                                title="mexican-cousine_icon"></figure>



                        <h4 class="gb-headline-ls-c">
                            Mexican</h4>



                        <p class="gb-headline-mb-c">Sed
                            mattis suscipit justo non interdum. Interdum et malesuada fames
                            ac ante ipsum primis in faucibus.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="gb-container-mob-app" id="contact">
    <div class="gb-container-mob-app-inner">

        <p data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500" class="gb-headline-online-order">Quick
            Delivery</p>



        <h2 class="gb-headline-online-order-h2">Online Food
            Delivery</h2>



        <p data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" class="gb-headline-online-order-p">
        We source only the finest ingredients
         and meticulously craft each recipe to ensure an unforgettable dining experience for our guests.</p>


        <div class="gb-container-butt-left">

            <a data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500"
                class="gb-button gsta-button" href="<?php echo site_url('/shop'); ?>">
                <!-- <span class="gb-icon">
                    <svg viewBox="-1.5 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.57 3.193c.73-.845 1.221-2.022 1.087-3.193-1.05.04-2.322.671-3.075 1.515-.677.749-1.267 1.946-1.108 3.094 1.172.087 2.368-.57 3.097-1.416m2.628 7.432c.03 3.027 2.77 4.034 2.801 4.047-.022.07-.438 1.435-1.444 2.845-.87 1.218-1.774 2.43-3.196 2.457-1.398.025-1.848-.794-3.447-.794-1.597 0-2.097.768-3.42.819-1.373.049-2.42-1.318-3.296-2.532C.403 14.984-.967 10.45.873 7.39c.915-1.52 2.548-2.482 4.321-2.506 1.348-.025 2.621.869 3.445.869.825 0 2.372-1.075 3.998-.917.68.027 2.591.263 3.818 1.984-.1.059-2.28 1.275-2.256 3.805"
                            fill-rule="evenodd"></path>
                    </svg>
                </span> -->
                <span class="gb-button-text">Menu</span>
            </a>



            <a href="<?php echo site_url('/shop'); ?>" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500"
                class="gb-button gb-button-app-gplay">
                <!-- <span class="gb-icon"><svg viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M223.635 114.182 55.852 18.142a15.99 15.99 0 0 0-16.123.046 15.663 15.663 0 0 0-7.915 13.668v192.288a15.663 15.663 0 0 0 7.915 13.668 15.989 15.989 0 0 0 16.123.046l167.783-96.04a15.762 15.762 0 0 0 0-27.636ZM144 139.313l18.856 18.857-88.19 50.477ZM74.655 47.341l88.202 50.488L144 116.687Zm102.592 102.593L155.313 128l21.935-21.934L215.568 128Z">
                        </path>
                    </svg></span> -->
                <span class="gb-button-text">Order Online</span>
            </a>
           
        </div>
    </div>

    <div class="gb-container-image-right">

        <figure class="gb-block-image gb-block-image-ac"><img decoding="async" class="gb-image gb-image-mobinhand"
                title="daniel-korpai-aUmq85-2V7I-unsplash"
                src="<?php echo get_theme_file_uri('/img/order-oline.webp') ?>" class="gb-image-4a4be7d7" alt=""
                srcset="<?php echo get_theme_file_uri('/img/order-oline.webp') ?> 1920w, <?php echo get_theme_file_uri('/img/daniel-korpai-aUmq85-2V7I-unsplash-546x682.web') ?> 1920w" />
        </figure>

    </div>
</section>


<section class="gb-container-testimonial">
    <div class="gsta-container-inner-testimonial-l2">
        <div class="container">

            <h2 class="gsta-headline-h2" data-aos="fade-right">Our Customers</h2>



            <h3 class="gsta-headline-testimonial-h3">Customer
                reviews
            </h3>
           

            <div class="gb-container-testimonial-inner-l3">




            <div class="gb-container-testimonial-inner-l4">
                    <div class="gb-container-testimonial-inner-l5">

                        <p data-aos="fade-right"
                            class="gb-container-testimonial-inner-l5-headline-color gb-container-testimonial-inner-l5-headline-text">
                            The food is beautiful and the customer service is even better. There is a wide range of food, and it is all beautiful. One of the best food spots in Perth.

                        <p data-aos="fade-left" class="container-testimonial-inner-l5-text-fmc">
                        Dylan Martin</p>



                        <p class="testimonial-inner-l5-text-fmc2">
                        Local</p>

                    </div>
                </div>





                <div class="gb-container-testimonial-inner-l4">
                    <div class="gb-container-testimonial-inner-l5">

                        <p data-aos="fade-right"
                            class="gb-container-testimonial-inner-l5-headline-color gb-container-testimonial-inner-l5-headline-text">
                            Masala BS in Beckenham is the place to go for a culinary adventure that blends the best of Aussie, Indian, and Mexican flavors. The fact that there were multiple meat-free options on their menu made me thrilled, as it ensured there was something for everyone.

                         The atmosphere at Masala BS is
                                 cozy and welcoming, perfect for a casual meal with friends or family. The dining experience is made even more pleasant by the friendly and attentive staff.</p>



                        <p data-aos="fade-left" class="container-testimonial-inner-l5-text-fmc">
                        kiranbir kaur</p>



                        <p class="testimonial-inner-l5-text-fmc2">
                        Local Guide</p>

                    </div>
                </div>


                <div class="gb-container-testimonial-inner-l4">
                    <div class="gb-container-testimonial-inner-l5">

                        <p data-aos="fade-right"
                            class="gb-container-testimonial-inner-l5-headline-color gb-container-testimonial-inner-l5-headline-text">
                            Excellent customer service! Every day, I come here for lunch and the food is consistently delicious. If you're in the area and need some food, I highly recommend this. Get the yiros !!</p>



                        <p data-aos="fade-left" class="container-testimonial-inner-l5-text-fmc">
                        Riley Gleason</p>



                        <p class="testimonial-inner-l5-text-fmc2">
                            Local</p>

                    </div>
                </div>





            </div>
        </div>
    </div>
</section>



<section class="gb-container our-dish-container">
    <div class="gb-container our-dish-comtainer-l2">

        <h2 class="gb-headline our-dish-online-order-h2 gb-headline-text">Online orders</h2>



        <h3 class="gb-headline our-dish-online-order-h3 gb-headline-text">Our fresh dishes
        </h3>



        <div class="dish-container-flex">

        <div class="dish-box">
        <figure class="gb-block-image gb-block-image-4a4be7d7"><a
                            href="<?php echo site_url('/shop'); ?>"><img decoding="async"
                                width="1024" height="683"
                                src="<?php echo get_theme_file_uri('/img/j-luis-esquivel-PerJ_q-EuKw-unsplash.webp') ?>"
                                class="gb-image-4a4be7d7" alt=""
                                srcset="<?php echo get_theme_file_uri('/img/j-luis-esquivel-PerJ_q-EuKw-unsplash.webp') ?> 1920w, <?php echo get_theme_file_uri('/img/j-luis-esquivel-PerJ_q-EuKw-unsplash.webp') ?> 1920w"
                                sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                    </figure>

                    <h4 class="gb-headline gb-headline-f58c8765 gb-headline-text"><a
                            href="<?php echo site_url('/shop'); ?>">Crème
                            Brûlée</a></h4>

                    <p class="dish-box-p">Crème
                        Brûlée is an elegant and velvety dessert that epitomizes
                        indulgence and sophistication. This classic French dessert
                        consists of a &#8230;</p>

                    <a class="gb-button gb-button-2f660185 gb-button-text"
                        href="<?php echo site_url('/shop'); ?>">Order
                        now</a>
        </div>

        <div class="dish-box">

        <figure class="gb-block-image gb-block-image-4a4be7d7"><a
                            href="<?php echo site_url('/shop'); ?>"><img decoding="async"
                                width="1024" height="683"
                                src="<?php echo get_theme_file_uri('/img/diliara-garifullina-Lkb1g9ivC2c-unsplash.webp') ?>"
                                class="gb-image-4a4be7d7" alt=""
                                srcset="<?php echo get_theme_file_uri('/img/diliara-garifullina-Lkb1g9ivC2c-unsplash.webp') ?>   1920w, <?php echo get_theme_file_uri('/img/diliara-garifullina-Lkb1g9ivC2c-unsplash-600x400.webp') ?>   1920w"
                                sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                    </figure>

                    <h4 class="gb-headline gb-headline-f58c8765 gb-headline-text"><a
                            href="<?php echo site_url('/shop'); ?>">Apple
                            Pie</a></h4>

                    <p class="dish-box-p">Apple
                        Pie is a timeless and comforting dessert that evokes a sense of
                        nostalgia and homey warmth. With its flaky &#8230;</p>

                    <a class="gb-button gb-button-2f660185 gb-button-text"
                        href="<?php echo site_url('/shop'); ?>">Order
                        now</a>

        </div>

        <div class="dish-box">

        <figure class="gb-block-image gb-block-image-4a4be7d7"><a
                            href="<?php echo site_url('/shop'); ?>"><img
                                loading="lazy" decoding="async" width="1024" height="683"
                                src="<?php echo get_theme_file_uri('/img/pexels-jasmine-lew-140831.webp') ?>"
                                class="gb-image-4a4be7d7" alt=""
                                srcset="<?php echo get_theme_file_uri('/img/pexels-jasmine-lew-140831.webp') ?> 1920w, <?php echo get_theme_file_uri('/img/pexels-jasmine-lew-140831-600x400.webp') ?>  1920w"
                                sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                    </figure>

                    <h4 class="gb-headline gb-headline-f58c8765 gb-headline-text"><a
                            href="<?php echo site_url('/shop'); ?>">Chocolate
                            Lava Cake</a></h4>

                    <p class="dish-box-p">
                        Chocolate Lava Cake is a decadent dessert that tantalizes the
                        taste buds with its indulgent and irresistible qualities. This
                        velvety &#8230;</p>

                    <a class="gb-button gb-button-2f660185 gb-button-text"
                        href="<?php echo site_url('/shop'); ?>">Order
                        now</a>


        </div>

        </div>
<!-- end dish-container-flex -->


       



        <a class="gb-button our-dishes-button-b1 gb-button-text" href="<?php echo site_url('/shop'); ?>">View all
            dishes</a>

    </div>
</section>

<?php get_footer(); ?>


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





// Slider
const slider = function () {
  const slides = document.querySelectorAll('.slide');
  const btnLeft = document.querySelector('.slider__btn--left');
  const btnRight = document.querySelector('.slider__btn--right');
  const dotContainer = document.querySelector('.dots');

  let curSlide = 0;
  const maxSlide = slides.length;

  // Functions
  const createDots = function () {
    slides.forEach(function (_, i) {
      dotContainer.insertAdjacentHTML(
        'beforeend',
        `<button class="dots__dot" data-slide="${i}"></button>`
      );
    });
  };

  const activateDot = function (slide) {
    document
      .querySelectorAll('.dots__dot')
      .forEach(dot => dot.classList.remove('dots__dot--active'));

    document
      .querySelector(`.dots__dot[data-slide="${slide}"]`)
      .classList.add('dots__dot--active');
  };

  const goToSlide = function (slide) {
    slides.forEach(
      (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
    );
  };

  // Next slide
  const nextSlide = function () {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const prevSlide = function () {
    if (curSlide === 0) {
      curSlide = maxSlide - 1;
    } else {
      curSlide--;
    }
    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const init = function () {
    goToSlide(0);
    createDots();

    activateDot(0);
  };
  init();

  // Event handlers
  btnRight.addEventListener('click', nextSlide);
  btnLeft.addEventListener('click', prevSlide);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') prevSlide();
    e.key === 'ArrowRight' && nextSlide();
  });

  dotContainer.addEventListener('click', function (e) {
    if (e.target.classList.contains('dots__dot')) {
      const { slide } = e.target.dataset;
      goToSlide(slide);
      activateDot(slide);
    }
  });
};
slider();






</script>


</body>

</html>