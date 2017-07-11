<?php 
if( has_nav_menu( 'mobile-nav' ) ) {

    $args = array(
        'theme_location' => 'mobile-nav',
        'container'      => 'nav',
        'container_class'=> 'mobile-nav',
        'menu_class'     => 'mobile-menu'    
    );
    
    wp_nav_menu( $args );
}