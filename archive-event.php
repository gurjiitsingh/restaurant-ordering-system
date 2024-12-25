<?php get_header();   ?>


        <div class="page-content">
        <div class="container">

        <h1> News and Event </h1>
<?php 
while(have_posts()){

    the_post();
    ?>
   <h2><a href="<?php echo the_permalink(); ?>"> <?php the_title(); ?></a> </h2>
                    <p><?php echo wp_trim_words(get_the_content(),18); ?> </p>
    
    <?php }  ?>

            </div>
</div>


<?php get_footer();   ?>