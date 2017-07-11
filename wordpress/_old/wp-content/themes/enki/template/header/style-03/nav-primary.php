<?php 
if( has_nav_menu( 'primary-nav' ) ) {

    $args = array(
        'theme_location' => 'primary-nav',
        'container'      => 'nav',
        'container_class'=> 'main-nav',
        'menu_class'     => 'main-menu sf-menu style-01'    
    );

    add_filter( 'nav_menu_item_title', array( 'Enki_Navigation', 'add_index_to_lv0' ), 10, 2 );
    wp_nav_menu( $args );
    remove_filter( 'nav_menu_item_title', array( 'Enki_Navigation', 'add_index_to_lv0' ), 10, 2 );
}