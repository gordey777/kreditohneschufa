<section class="kopa-area kopa-area-no-space">

    <div class="widget enki-module-404">

        <div class="enki-module-404-thumb">
            <h4><?php esc_html_e( 'Page Not Found', 'enki' ); ?></h4>
            <img src="<?php echo get_template_directory_uri() ?>/images/404.png">
        </div>

        <div class="enki-module-404-content">
            
            <header class="widget-header style-01">
                <h3 class="widget-title"><?php esc_html_e( 'What now?', 'enki' ); ?></h3>
                <span class="icon-title"></span>
                <p><?php echo wp_kses_post( __( 'Sorry, the page you are looking for cannot be found here. Head back to the <br> home page and start from there.', 'enki' ) ); ?></p>
            </header>

            <div class="enki-back-home">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php esc_html_e( 'Back to Home', 'enki' ); ?>                    
                    <i class="fa fa-arrow-circle-o-up"></i>
                </a>
            </div>

        </div>

    </div>

</section>

