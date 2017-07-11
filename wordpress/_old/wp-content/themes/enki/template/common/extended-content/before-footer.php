<?php

if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

$page_id = apply_filters( 'enki_get_extended_content_before_footer', 0 );

if( $page_id ){
	
	$enki_builder = Enki_Builder::get_instance();
	
	$layouts               = Kopa_Page_Builder::get_registed_layouts();			
	$activated_layout_id   = Kopa_Page_Builder::get_current_layout( $page_id );			
	$activated_layout_info = $layouts[$activated_layout_id];
	
	$enki_builder->print_page( $page_id, $activated_layout_info );

}
