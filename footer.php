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



<footer class="site-footer">
        <div class="footer-bg">
            <div class="container">
                <div class="footer-flex ">
                    <div class="footer-col-f">
                        <h2>About us</h2>
                        <p>At Masala-, we believe in the power of culinary fusion to create memorable dining
                            experiences. Our restaurant is a celebration of diversity, bringing together the rich
                            flavors and spices of Australian, Mexican, and Indian cuisines under one roof.
                            <br />
                            Founded with a passion for innovation and a love for bold flavors, Masala- aims to redefine
                            traditional dining norms and offer our guests a unique and exciting culinary adventure. Our
                            menu is a reflection of our commitment to creativity and authenticity, featuring a diverse
                            range of dishes that seamlessly blend the best of each culinary tradition.
                            <br />But Masala- is more than just a restaurant—it's a place where cultures collide,
                            friendships are forged, and memories are made.
                        </p>
                    </div>
                    <div class="footer-col-s">




                        <h2 class="text-align-center"></h2>


                        <div class="box-shadow  g">

                            <div class="footer-col-content">



                                <p class=" ">Braunschweiger Str. 93, 38518 Gifhorn, Germany<br />

                                    <!-- <br><a href="mailto:hello@flavor.com">hello@flavor.com</a> -->

                                </p>
                                <div class="tel"><a href="tel: 05371 6266291">05371 6266291</a></div>
                                <div class="email"><a href="email: info@masala-gf.de">info@masala-gf.de</a></div>

                                <h3 class="h-headline-text"></h3>











                                <!-- <a class="gb-button gb-button-58914634 gb-button-text" href="#">Book a table</a> -->
                            </div>
                        </div>
                        <p class="fp-c">
                            Whether you're joining us for a casual meal with friends or celebrating a special occasion
                            with loved ones, we invite you to embark on a culinary journey like no other at Masala-.

                            <br />
                            Come experience the fusion feast at Masala- and discover the magic of
                            Australian-Mexican-Indian cuisine. Our doors are open, and our flavors await your arrival.
                            Welcome to Masala-, where every bite tells a story of culinary adventure and cultural
                            discovery.

                        </p>

                    </div>
                    <div class="footer-col-t">
                        <div class="op-our">

                            <h2>Opening hours</h2>



                            <p class="op-h-p">From mouthwatering tacos with a spicy Indian twist to sumptuous curries
                                infused with Mexican flair,
                                every dish at Masala- is a testament to our dedication to culinary excellence and
                                cultural appreciation. </p>


                            <div class="row-footer-col">

                                <p class="book-day">Monday</p>



                                <p class="book-time">7&nbspAM-2:30&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Tuesday</p>



                                <p class="book-time">7&nbspAM-2:30 PM,&ensp; 6-9:30&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Wednesday</p>



                                <p class="book-time">7&nbspAM-2:30&nbspPM,&ensp; 6-9&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Thursday</p>



                                <p class="book-time">7&nbspAM-3&nbspPM,&ensp; 6-9&nbspPM</p>

                            </div>

                            <div class="row-footer-col">

                                <p class="book-day">Friday</p>



                                <p class="book-time">7&nbspAM-3&nbspPM,&ensp; 6-9&nbspPM</p>

                            </div>
                            <div class="row-footer-col">

                                <p class="book-day">Saturday</p>



                                <p class="book-time">9&nbspAM-2:30&nbspPM,&ensp; 6-10&nbspPM</p>

                            </div>
                            <div class="row-footer-col">

                                <p class="book-day">Sunday</p>



                                <p class="book-time">Closed</p>

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

    <?php wp_footer(); ?>

<script>


const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector(".header");

btnNavEl.addEventListener("click", function () {
  
  headerEl.classList.toggle("nav-open");
});

// prevent reload add to cart button 

(function ($) {
$( document ).on( 'click', '.single_add_to_cart_button', function(e) {
e.preventDefault();
});
})(jQuery);

</script>

</body>
</html>