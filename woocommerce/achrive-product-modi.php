
<?
// full code
//https://stackoverflow.com/questions/53015309/enable-ajax-add-to-cart-button-on-products-custom-loop-in-woocommerce


$loop = new WP_Query( array(
    'post_type' => 'product',
    'posts_per_page' => 12,
) );

if ($loop->have_posts()) {
    while ($loop->have_posts()): $loop->the_post();
      $product = wc_get_product($loop->post->ID);
      ?>
        <!-- tab product -->
        <li class="col-sx-12 col-sm-4">
          <div class="product-container">
            <div class="left-block">
              <a href="<?php echo get_permalink(); ?>" target="_blank">
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'single-post-thumbnail');?>
                <img height="300px" width="300px" class="img-responsive" alt="product" src="<?php echo $image[0]; ?>">
              </a>
              <div class="quick-view">

              </div>
              <div class="add-to-cart "><?php
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
              ?></div>
            </div>
            <div class="right-block">
              <h5 class="product-name">
                <a href="<?php echo get_permalink(); ?>" target="_blank" class="product-block-click">
                  <?php echo $product->get_title(); ?>
                </a>
              </h5>
              <div class="content_price">
                <span class="price product-price">
                  <i class="fa fa-inr" aria-hidden="true">
                  </i>
                  <?php echo $product->get_regular_price(); ?>
                </span>
                <span class="price old-price">
                  <i class="fa fa-inr" aria-hidden="true">
                  </i>
                  <?php echo $product->get_sale_price(); ?>
                </span>
                <span class="discount-block">50 % OFF
                </span>
              </div>
            </div>
          </div>
        </li>
      <?php
    endwhile;
}
echo "</ul>";
wp_reset_postdata();
?>