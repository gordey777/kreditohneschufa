<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_socials' );

function enki_get_options_socials( $options ){
  $enki_utility = Enki_Utility::get_instance();

  $options[] = array(
      'title' => esc_html__( 'Social Links', 'enki' ),
      'type'  => 'title',        
      'id'    => 'social-links'        
  );   

  $options[] = array(
      'id'    => 'social_links',
      'type'  => 'repeater_link',
      'title' => '',
      'size'  => 'sm'      
  ); 
  
	return $options;
}