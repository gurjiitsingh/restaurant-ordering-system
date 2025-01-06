<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gstadeveloperRestaurant
 */

?>



<footer class="site-footer z-999">
        <div class="">
            <div class="container">
                <div class="footer-flex ">
                    <div class="footer-col-f z-999">
                        <h2 class="w-full">Links</h2>
                        <ul class="flex flex-col gap-3">
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo site_url('/shop'); ?>">Menü</a></li>
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo site_url('/about'); ?>">Über Uns</a></li>
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo site_url('/contact'); ?>">Kontakt</a></li>
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo site_url('/table-reservation'); ?>">Tisch reservation</a></li>
                            <li class="border-b border-slate-500 pb-1"><a href="<?php echo site_url('/allergene'); ?>">Allergene</a></li>

</ul>
                    </div>
                    <div class="footer-col-s pt-0 ">




                        <h2 class="text-align-center ">Address</h2>
                       

                        <div class="box-shadow  g md:mt-12">

                            <div class="footer-col-content">



                                <p class=" ">Braunschweiger Str. 93, 38518 Gifhorn, Germany<br />

                                    <!-- <br><a href="mailto:hello@flavor.com">hello@flavor.com</a> -->

                                </p>
                                <div class="tel"><a href="tel: 05371 6266291"><span class="dashicons dashicons-phone"></span> 05371 6266291</a></div>
                                <div class="email"><a href="email: info@masala-gf.de"><span class="dashicons dashicons-email"></span>info@masala-gf.de</a></div>

                                <h3 class="h-headline-text"></h3>











                                <!-- <a class="gb-button gb-button-58914634 gb-button-text" href="#">Book a table</a> -->
                            </div>
                        </div>
                        <p class="fp-c">

                        </p>

                    </div>
                    <div class="footer-col-t">
                        <div class="op-our">

                            <h2>Opening hours</h2>



                           


                            <div class="row-footer-col">

                                <p class="book-day">Monday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Tuesday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Wednesday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Thursday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Friday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>
                            <div class="row-footer-col">

                                <p class="book-day">Saturday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>
                            <div class="row-footer-col">

                                <p class="book-day">Sunday</p>



                                <p class="book-time">11.00&nbspAM-10.00&nbspPM</p>

                            </div>









                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer-min">
            <div class="container">

                <div class="footer-copyrights">

                    <p>Powerd by
                        <a href="http://www.gstadeveloper.com">GstaDeveloper</a>
                    </p>

                    <p class="copyright">
                        Copyright © <span class="year">2024</span> All Rights Reserved by <b>Masala-</>

                    </p>
                </div>

            </div>

        </div>

    </footer>


<script>


const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector(".header");

btnNavEl.addEventListener("click", function () {
  
  headerEl.classList.toggle("nav-open");
});



</script>

<div class="overlay hidden1"></div>

<div class="modal1 hidden1   rounded-lg bg-slate-200 text-slate-700">
 <div class="flex flex-col gap-2">   
   <div class="flex gap-2">
<div><h3>Delivery Tiers</h3></div><div><button class="btn--close-modal">&times;</button></div>
   </div>
   <div class="flex gap-2 justify-between border-blue-100 rounded-md">
<div >4 Km</div><div class="text-[.9rem] font-light">Min order: 9.99 &#8364;, Delivery Free: 0.00 &#8364;</div>
</div>

<div class="flex gap-2 justify-between border-blue-100 rounded-md">
<div >10 Km</div><div class="text-[.9rem] font-light">Min order: 9.99 &#8364;, Delivery Free: 2.00 &#8364;</div>
</div>

<div class="flex gap-2 justify-between border-blue-100 rounded-md">
<div >15 Km</div><div class="text-[.9rem] font-light">Min order: 29.99 &#8364;, Delivery Free: 3.00 &#8364;</div>
</div>

<div class="flex gap-2 justify-between border-blue-100 rounded-md">
<div >20 Km</div><div class="text-[.9rem] font-light">Min order: 69.99 &#8364;, Delivery Free: 5.00  &#8364;</div>
</div>
   </div>



   
</div>

</div>


<?php wp_footer(); ?>
</body>
</html>