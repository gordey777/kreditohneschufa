<?php 
$enki_config = Enki_Config::get_instance();
$enki_layout = Enki_Layout::get_instance();

if( !$enki_config->setting['sidebar']['before_footer']['is_active'] ){ return; }

add_filter('dynamic_sidebar_params', array( $enki_layout, 'modify_sidebar_args_for_footer' ) ); 
?>

    <div id="before-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?php get_sidebar( 'footer-01' ); ?>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?php get_sidebar( 'footer-02' ); ?>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?php get_sidebar( 'footer-03' ); ?>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?php get_sidebar( 'footer-04' ); ?>
                </div>
            </div>
        </div>
    </div>

<?php
remove_filter('dynamic_sidebar_params', array( $enki_layout, 'modify_sidebar_args_for_footer' ) );