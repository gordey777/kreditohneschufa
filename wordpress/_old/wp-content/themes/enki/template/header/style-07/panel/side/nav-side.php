<?php 
if( has_nav_menu( 'primary-nav' ) ) {

    $args = array(
        'theme_location' => 'primary-nav',
        'container'      => 'nav',
        'container_class'=> 'slide-nav',
        'menu_class'     => 'slide-menu'    
    );
    
    wp_nav_menu( $args );
}