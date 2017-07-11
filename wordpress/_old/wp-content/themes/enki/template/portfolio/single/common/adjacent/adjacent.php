<?php 
$path      = get_template_directory_uri() . '/images/arrow/';
$prev_post = get_previous_post();
$next_post = get_next_post();

if( $prev_post || $next_post ):
?>
    <div class="enki-pagination style-03">
        <nav class="navigation pagination">        
            <div class="nav-links">
                <?php if( $prev_post ): ?>
                    <a class="prev page-numbers" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                        <img src="<?php echo esc_url( $path ); ?>prev.png" alt="">
                        <?php esc_html_e( 'Previous', 'enki' ); ?>
                    </a>
                <?php endif; ?>

                <?php if( $next_post ): ?>
                    <a class="next page-numbers" href="<?php echo get_permalink( $next_post->ID ); ?>">
                        <img src="<?php echo esc_url( $path ); ?>next.png" alt="">
                        <?php esc_html_e( 'Next', 'enki' ); ?>                
                    </a>            
                <?php endif; ?>

            </div>
        </nav>    
    </div>
<?php
endif;