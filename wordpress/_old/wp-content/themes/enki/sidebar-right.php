<?php
$sidebar = apply_filters( 'enki_get_sidebar_by_position', 'sb_right', 'pos_right' );

if( is_active_sidebar( $sidebar ) ){
	dynamic_sidebar( $sidebar );
}