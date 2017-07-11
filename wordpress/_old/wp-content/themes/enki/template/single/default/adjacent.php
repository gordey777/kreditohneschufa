<?php 
$path      = get_template_directory_uri() . '/images/arrow/';
$prev_post = get_previous_post();
$next_post = get_next_post();

if( $prev_post || $next_post ):
?>

    <div class="single-other-post">
        
        <?php if( $prev_post ): ?>
            <div class="entry-item prev-post">
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" rel="prev">
                    <span class="fa fa-angle-left"></span> 
                    <div>
                        <?php
                        if( has_post_thumbnail( $prev_post->ID ) ){
                            the_post_thumbnail( 'enki-small-04' );
                        }
                        ?>                         

                        <div class="entry-content">
                            <h4 class="entry-title"><?php echo get_the_title( $prev_post->ID ); ?></h4>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <?php if( $next_post ): ?>
            <div class="entry-item next-post">
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" rel="next">
                    <span class="fa fa-angle-right"></span> 
                    <div>
                        <?php
                        if( has_post_thumbnail( $next_post->ID ) ) {
                            the_post_thumbnail( 'enki-small-04' );
                        }
                        ?>
                        <div class="entry-content">
                          <h4 class="entry-title"><?php echo get_the_title( $next_post->ID ); ?></h4>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

    </div>

<?php
endif;