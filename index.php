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
                            <h1 class="gb-headline-hero-left-h1 text-slate-400">
                                <!-- The ultimate food experience -->
                                Abhol Rabatt: 20%
                            </h1>
                            <p class=" text-slate-400"> Willkommen bei Masala - Taste of India! Gifhorn: Braunschweiger</p>
                            <p
                                class="text-[.9rem] border md:text-[1rem] lg:text-[1.5rem] ff-Josefin free-order underline text-zinc-400
                                 hover:bg-slate-200 px-1 hover:px-[3px]  rounded-lg cursor-pointer">
                               
                                <!-- <h5 class="gsta-heading gsta-heading-u69d7ird "><span>Marino
                                    Yunkky
                                </span></h5> -->

                                4 km and Min order: 9.99 €, Delivery Fee: 0.00 €
                            <p>
                            <div class="button-menu-container">

                                <!-- <a class="gb-button gsta-hero-button gb-button-text" data-aos="fade-left"
                                    href="<?php 
                                    //echo site_url('/shop'); 
                                    ?>">ORDER FOOD</a> -->

<div class="gb-container-butt-left">

<a data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500" class="gb-button gsta-button"
    href="<?php echo site_url('/table-reservation/'); ?>">
    <!-- <span class="gb-icon">
        <svg viewBox="-1.5 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.57 3.193c.73-.845 1.221-2.022 1.087-3.193-1.05.04-2.322.671-3.075 1.515-.677.749-1.267 1.946-1.108 3.094 1.172.087 2.368-.57 3.097-1.416m2.628 7.432c.03 3.027 2.77 4.034 2.801 4.047-.022.07-.438 1.435-1.444 2.845-.87 1.218-1.774 2.43-3.196 2.457-1.398.025-1.848-.794-3.447-.794-1.597 0-2.097.768-3.42.819-1.373.049-2.42-1.318-3.296-2.532C.403 14.984-.967 10.45.873 7.39c.915-1.52 2.548-2.482 4.321-2.506 1.348-.025 2.621.869 3.445.869.825 0 2.372-1.075 3.998-.917.68.027 2.591.263 3.818 1.984-.1.059-2.28 1.275-2.256 3.805"
                fill-rule="evenodd"></path>
        </svg>
    </span> -->
    <span class="gb-button-text font-bold">Tisch reservation</span>
</a>



<a href="#buffet" data-aos="fade-left" data-aos-easing="linear"
    data-aos-duration="1500" class="gb-button gb-button-app-gplay">
    <!-- <span class="gb-icon"><svg viewBox="0 0 256 256"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M223.635 114.182 55.852 18.142a15.99 15.99 0 0 0-16.123.046 15.663 15.663 0 0 0-7.915 13.668v192.288a15.663 15.663 0 0 0 7.915 13.668 15.989 15.989 0 0 0 16.123.046l167.783-96.04a15.762 15.762 0 0 0 0-27.636ZM144 139.313l18.856 18.857-88.19 50.477ZM74.655 47.341l88.202 50.488L144 116.687Zm102.592 102.593L155.313 128l21.935-21.934L215.568 128Z">
            </path>
        </svg></span> -->
    <span class="gb-button-text font-bold">Buffet</span>
</a>

</div>




                            </div>

                        </div>

                    </div><!-- col end -->

                    <div class="hero-section-col">
                        <div class="hero-section-col-inner-right">
                            <div class="flyer-wrapper"><img
                                    src="<?php echo get_theme_file_uri('/img/delicious.webp') ?>" alt="" loading="lazy"
                                    class="flyer-image">
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



            </div>
        </div>
    </div>
</div>
<div class="clear-both h-12">


</div>



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
        <div class="flex flex-col  items-center  py-3   mb-6">
            <!-- <div> <button id="slideLeft" type="button">Slide left</button>
                <button id="slideRight" type="button">Slide right</button>
            </div> -->
            <div class="scrolling-wrapper w-full">

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

        </div><!-- end of most outer wrap with button  -->


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

                                <div class="menu-list-add-cart-button">


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
                            Das Essen ist wunderschön und der Kundenservice ist sogar noch besser. Es gibt eine große Auswahl an
                            Essen, und alles ist wunderschön. Einer der besten Food-Spots in Braunschweig Broitzem.

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
                            Masala Taste on India (Braunschweig-Broitzem) in Beckenham ist der richtige Ort für ein kulinarisches Abenteuer, das das Beste vereint
                            Australische, indische und mexikanische Aromen. Die Tatsache, dass es mehrere fleischfreie Optionen gab
                            Die Speisekarte hat mich begeistert, denn sie sorgte dafür, dass für jeden etwas dabei war.

                            Die Atmosphäre im Masala Braunschweig-Broitzem ist
                            gemütlich und einladend, perfekt für ein ungezwungenes Essen mit Freunden oder der Familie. Das kulinarische Erlebnis
                            wird durch das freundliche und aufmerksame Personal noch angenehmer.</p>



                        <p data-aos="fade-left" class="container-testimonial-inner-l5-text-fmc">
                            kiranbir </p>



                        <p class="testimonial-inner-l5-text-fmc2">
                            Local Guide</p>

                    </div>
                </div>


                <div class="gb-container-testimonial-inner-l4">
                    <div class="gb-container-testimonial-inner-l5">

                        <p data-aos="fade-right"
                            class="gb-container-testimonial-inner-l5-headline-color gb-container-testimonial-inner-l5-headline-text">
                            Exzellenter Kundenservice! Jeden Tag komme ich zum Mittagessen hierher und das Essen ist gleichbleibend
                            lecker. Wenn Sie in der Gegend sind und etwas zu essen brauchen, kann ich Ihnen dieses wärmstens empfehlen. Holen Sie sich die Yiros
                            !!</p>



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



<section class="gb-container our-dish-container" id="buffet">
    <div class="container our-dish-comtainer-l2 items-center ">

        <h2
            class="p-[3rem] rounded-full border text-center shadow-lg  ff-Josefin text-[4rem] md:text-[6rem] font-bold text-slate-500">
            Buffet</h2>



        <h3 class="gb-headline our-dish-online-order-h3 gb-headline-text ff-ultra font-light text-slate-400">Welcome to
            Masala Taste of India
        </h3>



        <div class="dish-container-flex">
            <!-- flex flex-col md:  -->
            <div class="dish-box">
                <figure class="gb-block-image gb-block-image-4a4be7d7"><a href="<?php echo site_url('/shop'); ?>"><img
                            decoding="async" width="1024" height="683"
                            src="<?php echo get_theme_file_uri('/img/buffet.webp') ?>" class="gb-image-4a4be7d7" alt=""
                            srcset="<?php echo get_theme_file_uri('/img/buffet.webp') ?> 1920w, <?php echo get_theme_file_uri('/img/buffet.webp') ?> 1920w"
                            sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                </figure>
                <div class="w-full flex flex-col  pt-4">
                    <h5 class="w-full text-center p-2 border rounded-xl text-[2rem]  text-slate-400">Highlights</h5>
                    <p class="w-full text-left pl-0 m-0  text-[1.7rem] ff-Josefin text-slate-600">Fresh ingredients &
                        live cooking stations</p>
                    <p class="w-full text-left  pl-0 m-0 text-[1.7rem] ff-Josefin text-slate-600">Vegetarisch, vegan und
                    kinderfreundliche Optionen</p>
                </div>
            </div>

            <div class="flex flex-col w-full lg:w-1/2 text-zinc-500">
              
                <h3 class="text-slate-400"> Bei Masala Taste of India sind wir stolz darauf, Gerichte zuzubereiten, die die reichhaltige Kulinarik zur Geltung bringen
                Erbe.</h3>
                <p>
                    Our buffet features live cooking stations where our chefs prepare your favorite dishes right before
                    your eyes.
                    Watch the magic unfold as they grill, sauté, and carve with expertise, delivering meals that are as
                    fresh as they are delicious.
                    For those with a sweet tooth, our dessert section offers a tempting array of treats..
                </p>
                <p>
                    We cater to all dietary preferences, offering vegetarian, vegan options to ensure every guest feels
                    welcome.
                    Families are always welcome, and children will find plenty to enjoy at our kid-friendly stations.
                </p>
                <p>
                    Whether you're celebrating a special occasion, gathering with friends, or simply indulging in a
                    feast,
                    Masala Taste of India promises a warm, inviting atmosphere and flavors that will delight your taste
                    buds.
                </p>
                <p class="font-bold">
                    Visit us today and savor the best cuisine with a modern twist. We look forward to serving you!
                </p>

            </div>

        </div>
        <!-- end dish-container-flex -->






        <a class="gb-button our-dishes-button-b1 gb-button-text bg-slate-700"
            href="<?php echo site_url('/shop'); ?>">View all
            dishes</a>

    </div>
</section>

<?php get_footer(); ?>


<script>
//*****  Get date and time to disable order ***********/  

const date = new Date();
const currentTime = date.getHours();
const currentDay = date.getDay();
canOrder = true;

if (currentTime >= 11 && currentTime <= 22) {

} else {
    canOrder = false;
}

// if(currentDay == 6 || currentDay == 7){
//     canOrder = false;
//   }


window.addEventListener("load", function() {
    if (canOrder == false) {
        const targetCat = document.querySelector("#lunches");
        const bt = targetCat.querySelectorAll(".button")
        const message = targetCat.querySelectorAll(".menu-list-add-cart-button")
        message.forEach((i) => {
            i.innerHTML =
                "Mittagessen können derzeit nicht bestellt werden, wählen Sie andere Speisen aus";
        })

        bt.forEach((i) => {
            i.style.display = "none";
        })
    }
});
</script>
<style>
#lunches .menu-list-add-cart-button {
    font-size: .7rem;
    color: #0c0;

}

.bgDrop {
    z-index: 999;
    width: 100%;
    height: 100%;
    background: #eee;
}
</style>

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


</body>

</html>