<?php 
if( has_nav_menu( 'primary-nav' ) ) {

    $args = array(
        'theme_location' => 'primary-nav',
        'container'      => 'nav',
        'container_class'=> 'main-nav',
        'menu_class'     => 'main-menu sf-menu style-02'    
    );

    wp_nav_menu( $args );
}
