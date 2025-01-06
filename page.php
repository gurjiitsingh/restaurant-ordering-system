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
<style>
	/* cart page address style overide  */

	.wc-block-components-shipping-address{
		line-height: 30px !important;
	
	}
.wc-block-components-totals-shipping .wc-block-components-totals-shipping__change-address__link{
	width:100%;
  padding: 8px !important;
  background: #eee !important;
  border-radius: 6px !important;
  color:#00cc00;
}
</style>
<div class="container">
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	</div>
<?php
//get_sidebar();
get_footer();
