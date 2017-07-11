<?php 
$enki_post = Enki_Post::get_instance();

$query   = $enki_post->get_related_query( 'portfolio_tag', 3 );
$records = new WP_Query( $query );

if ( $records->have_posts() ): 
    ?>

    <section class="kopa-area kopa-area-03">
        <div class="widget">
            <div class="enki-single-portfolio style-3">

                <header class="widget-header style-01">
                    <h4 class="widget-sub-title"><?php esc_html_e( 'Related Work', 'enki' ); ?></h4>
                    <h3 class="widget-title"><?php esc_html_e( 'You may also like', 'enki' ); ?></h3>
                    <span class="icon-title"></span>
                </header>            

                <div class="widget-content">
                    <?php 
                    while ($records->have_posts()):
                        $records->the_post();

                        $subtitle     = get_post_meta( get_the_ID(), 'enki_subtitle', true );
                        $subtitle_url = get_post_meta( get_the_ID(), 'enki_subtitle_url', true );                        
                        $subtitle_url = $subtitle_url ? $subtitle_url : get_permalink();
                        ?>
                        <article class="entry-item">
                            
                          <?php if( has_post_thumbnail() ) : ?>
                            <div class="entry-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'enki-medium-10' ); ?>
                                </a>
                            </div>
                          <?php endif; ?>

                            <div class="entry-content">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>

                                <?php if( $subtitle ): ?>
                                    <p>
                                        <a href="<?php echo esc_url( $subtitle_url ); ?>"><?php echo esc_html( $subtitle ); ?></a>
                                    </p>
                                <?php endif; ?>
                            </div>                    

                        </article>
                    
                    <?php endwhile; ?>

                </div>            
            </div>
        </div>
    </section>

    <?php
    wp_reset_postdata();
endif;