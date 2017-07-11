<?php
global $product;
$enki_utility = Enki_Utility::get_instance();

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) === 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

	<div class="enki-module-shop-list style-01">
	    <h3 class="widget-title style-09"><?php esc_html_e( 'You might also like', 'enki' ); ?></h3>
	    <div class="widget-content">
	        <div class="enki-arrow">
	            <span class="enki-owl-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow/short-left.png" alt=""></span>
	            <span class="enki-text"><a href="<?php echo esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'See all', 'enki' ); ?></a></span>
	            <span class="enki-owl-next"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow/short-right.png" alt=""></span>
	        </div>
	        <div class="row enki-custom-row">
	            <div class="owl-carousel enki-carousel-10">
				
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>

		      	<div class="entry-item">
                <div class="entry-thumb">
                    <a href="<?php the_permalink(); ?>" title="">
                    	<?php the_post_thumbnail( 'shop_catalog' ); ?>
                    </a>
                </div>
                <div class="entry-content">
                    <h5 class="entry-title">
                    	<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
                    </h5>
                    <span class="enki-price"><?php echo wp_kses( $product->get_price_html(), $enki_utility->get_allowed_tags() ); ?></span>
                </div>
            </div>

					<?php endwhile; ?>
					
				</div>
			</div>
		</div>
	</div>
<?php endif;

wp_reset_postdata();
