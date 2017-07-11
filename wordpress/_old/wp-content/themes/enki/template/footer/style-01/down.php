<?php $is_show_social_links_footer = (int)get_theme_mod( 'is_show_social_links_footer', true ); ?>

<footer class="kopa-footer">

    <div class="footer-area-1">
        <div class="container">
            <div class="row">
                
                <?php if( $is_show_social_links_footer ): ?>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-left">
                       <?php get_template_part( 'template/footer/style-01/down/socials' ); ?>
                    </div>
                <?php endif; ?>

                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <?php get_template_part( 'template/footer/style-01/down/logo' ); ?>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                    <?php get_template_part( 'template/footer/style-01/down/button', 'back' ); ?>
                </div>

            </div>        
        </div>
    </div>  

    <div class="footer-area-2">
        <div class="container">
            <?php get_template_part( 'template/footer/style-01/down/copyright' ); ?>          
        </div>
    </div>

</footer>