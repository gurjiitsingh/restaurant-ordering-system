<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gstadeveloperRestaurant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
    window.onload = function() {
        AOS.init();
    };
    </script>




    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet"> -->


        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ultra&display=swap" rel="stylesheet">


</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text"
        href="#primary"><?php esc_html_e( 'Skip to content', 'gstadeveloperrestaurant' ); ?></a>


    <header class="header wg" id="top">
        <div class="container">
            <div class="nav-wrapper">
            <!-- bg-green-200 -->
                <div class="site-branding ">
                <!-- bg-red-300 -->
                    <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
			else :
				?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
			endif;
			$gstadeveloperrestaurant_description = get_bloginfo( 'description', 'display' );
			if ( $gstadeveloperrestaurant_description || is_customize_preview() ) :
				?>
                    <p class="site-description">
                        <?php echo $gstadeveloperrestaurant_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </p>
                    <?php endif; ?>
                </div><!-- .site-branding -->


                <nav class="main-nav flex items-center justify-end w-1/2 ">
                    <?php
		                wp_nav_menu( array( 
                    'theme_location' => 'header-menu', 
                   // 'container_class' => 'my_extra_menu_class'
                       'container' => 'ul',
                     'menu_class'=> 'main-nav-list',
                   'walker' => new AWP_Menu_Walker()
                    ) );                
			?>
                </nav>
               
                <button class="btn-mobile-nav ">
                    <span class="icon-mobile-nav" name="menu-outline">

                    <img decoding="async" class="w-[35px] h-[35px] "
                                src="<?php echo get_theme_file_uri('/img/menu-50.svg') ?>" alt=""
                                title="menu" />

                        <!-- <svg viewBox="0 0 512 512" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em">
                            <path
                                d="M0 96c0-13.255 10.745-24 24-24h464c13.255 0 24 10.745 24 24s-10.745 24-24 24H24c-13.255 0-24-10.745-24-24zm0 160c0-13.255 10.745-24 24-24h464c13.255 0 24 10.745 24 24s-10.745 24-24 24H24c-13.255 0-24-10.745-24-24zm0 160c0-13.255 10.745-24 24-24h464c13.255 0 24 10.745 24 24s-10.745 24-24 24H24c-13.255 0-24-10.745-24-24z">
                            </path>
                        </svg> -->
                    </span>
                    <span class="icon-mobile-nav" name="close-outline">
                    <img decoding="async" class="w-[35px] h-[35px] "
                                src="<?php echo get_theme_file_uri('/img/close.png') ?>" alt=""
                                title="menu" />
                        <!-- <svg viewBox="0 0 512 512" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em">
                            <path
                                d="M71.029 71.029c9.373-9.372 24.569-9.372 33.942 0L256 222.059l151.029-151.03c9.373-9.372 24.569-9.372 33.942 0 9.372 9.373 9.372 24.569 0 33.942L289.941 256l151.03 151.029c9.372 9.373 9.372 24.569 0 33.942-9.373 9.372-24.569 9.372-33.942 0L256 289.941l-151.029 151.03c-9.373 9.372-24.569 9.372-33.942 0-9.372-9.373-9.372-24.569 0-33.942L222.059 256 71.029 104.971c-9.372-9.373-9.372-24.569 0-33.942z">
                            </path>
                        </svg> -->
                    </span>
                </button>
            </div>
        </div>
    </header>



    <!-- next if show head on all page except home -->
    <?php if ( ! is_home() ) : ?>


    <section class="site-hero-section" id="hero-section">

        <div class="hero-section-bg mb">

            <div class="container">
                <div class="food-section-inner-cover">
                    <div class="hero-section-flex">
                        <div class="hero-section-col">

                            <div class="food-box">

                                <h1 class="gb-headline-hero-left-h1">
                                    The ultimate food experience
                                </h1>

                            </div>

                        </div><!-- col end -->

                        <div class="hero-section-col">


                        </div><!-- col end -->




                    </div>
                </div>
            </div>
        </div><!-- end of hero-section container -->
        
    </section>


    <?php endif; ?>