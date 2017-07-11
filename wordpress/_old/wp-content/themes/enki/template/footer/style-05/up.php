<?php 
$is_show_newsletter                = (int)get_theme_mod( 'is_show_newsletter', true );
$is_show_social_links_footer       = (int)get_theme_mod( 'is_show_social_links_footer', true );
$is_show_payment_gateway_providers = (int)get_theme_mod( 'is_show_payment_gateway_providers', true );
?>

<div class="footer-area-1">

    <div class="container">

        <?php get_template_part( 'template/footer/style-05/up/copyright' ); ?>

        <?php if( $is_show_newsletter ): ?>
            <div class="row">
                <div class="col-md-push-4 col-sm-push-3 col-xs-push-0 col-md-4 col-sm-6 col-xs-12">
                    <?php get_template_part( 'template/footer/style-05/up/newsletter' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php 
        if( $is_show_social_links_footer ){
            get_template_part( 'template/footer/style-05/up/socials' ); 
        }
        ?>

        <?php 
        if( $is_show_payment_gateway_providers ){
            get_template_part( 'template/footer/style-05/up/payments' ); 
        }
        ?>
    
    </div>

</div>  
