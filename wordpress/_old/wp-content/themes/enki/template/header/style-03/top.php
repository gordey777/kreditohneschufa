<?php 
$is_show_social_links   = (int)get_theme_mod( 'is_show_social_links', true );
$is_show_call_to_action = (int)get_theme_mod( 'is_show_call_to_action', true );

if( $is_show_social_links || $is_show_call_to_action ): 
?>
    <div class="kopa-header-top white-text-style">
        <div class="container">

            <?php if( $is_show_social_links ): ?>
                <div class="kopa-pull-left">    
                    <?php get_template_part( 'template/header/style-03/top/socials' ); ?>
                </div>
            <?php endif; ?>

            <?php if( $is_show_call_to_action ): ?>
                <div class="kopa-pull-right">  
                   <?php get_template_part( 'template/header/style-03/top/call-to-action' ); ?>
                </div>                    
            <?php endif; ?>
            
        </div>            
    </div>
<?php 
endif;