<?php
$sidebar = apply_filters( 'enki_get_sidebar_by_position', 'sb_footer_2', 'pos_footer_2' );

if( is_active_sidebar( $sidebar ) ){
	dynamic_sidebar( $sidebar );
}