<?php $path = 'template/portfolio/single/default/main/'; ?>

<?php if( have_posts() ):   ?>

    <?php while( have_posts() ): the_post(); ?>

        <div <?php post_class( 'row' ); ?>>
            <?php
            $main_col_classes = 'col-xs-12';

            $is_has_featured = (int)get_post_meta( get_the_ID(), 'enki_is_has_featured', true );
            if( $is_has_featured ):
                $main_col_classes = ' col-md-6 col-sm-6';
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php get_template_part( $path . 'featured' ); ?>
                </div>
            <?php endif; ?>

            <div class="<?php echo esc_attr( $main_col_classes ); ?>">
                <div class="widget">

                    <div class="enki-single-portfolio style-2">
                        
                        <h3  id="enki-page-title" class="widget-title"><?php the_title(); ?></h3>

                        <div class="widget-content">
                            
                            <div id="enki-page-content" class="entry-content clearfix">
                                <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                            </div>

                            <?php get_template_part( $path . 'additional' ); ?>
                            
                            <?php get_template_part( $path . 'button', 'share' ); ?>

                            <?php get_template_part( $path . 'button', 'download' ); ?>                                                

                        </div>
                    
                    </div>
                    
                </div>
            </div>
            
        </div>        

        <div class="row">
            <div class="col-md-12">
                <?php get_template_part( $path . 'testimonials' ); ?>
                
                <?php get_template_part( $path . 'adjacent' ); ?>
            </div>
        </div>        
    
    <?php endwhile; ?>

<?php
endif;