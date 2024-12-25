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

get_header();
?>

<div class="container">
    <?php
    $timezone = date_default_timezone_get();
    ?>

    <main id="primary" class="site-main">


        <div class="form-select">

            <div class="booking-head">
                <div class="form-cover">
                    <form action="" class="slot_form">
                        <div>
                            <label for="Name">Your Name:</label>

                            <input type="text" require id="name" name="name" value="" />
                        </div>
                        <div>
                            <label for="Phone">Your Phone:</label>

                            <input type="phone" require id="phone" name="phone" value="" />
                        </div>
                        <div>
                            <label for="foobar_submit">Select Date:</label>

                            <input type="date" id="date" name="" value="<?php echo $timezone ?>"
                                min="<?php echo $timezone ?>" max="2025-1-1" />
                        </div>

                    </form>

                    <button id="find-but"> Find Available Tables </button>
                    <button id="reset-but"> Reset </button>
                </div>
                <div class="inst_text"><p>Fill in your name, phone number, and select a date. Then click 'Find available tables'.</p></div>
<div class="book-save-btn">
                <div class="save_booking">Save Table Booking</div></div>

            </div>

          

        </div>
        <div id="post-list"></div>


    </main><!-- #main -->
</div>
<?php
//get_sidebar();
get_footer();