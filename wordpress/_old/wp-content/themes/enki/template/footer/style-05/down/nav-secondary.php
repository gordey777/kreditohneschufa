<?php 

if( has_nav_menu( 'secondary-nav' ) ) {
	
    $args = array(
		'theme_location'  => 'secondary-nav',
		'container'       => 'nav',
		'container_class' => 'footer-nav',
		'menu_class'      => 'footer-menu',
		'depth'           => 1
    );

    wp_nav_menu( $args );
}