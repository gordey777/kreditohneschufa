<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_system', 99 );

function enki_get_options_system( $options ){
    
    $options[] = array(
        'title' => esc_html__( 'System', 'enki' ),
        'type'  => 'title',        
        'id'    => 'system'        
    );	
	
    $options[] = array( 'title' => esc_html__( 'Optimize CSS & JS', 'enki'), 'type' => 'groupstart' );
        
      $options[] = array(        
        'type'    => 'radio',
        'id'      => 'optimize_resource_level',
        'default' => 'lvl_0',
        'options' => array(
        	'lvl_0' => esc_html__( 'Level 0: Turn off this feature', 'enki' ),
        	'lvl_1' => esc_html__( 'Level 1: Minify CSS & Javascript', 'enki' ),
        	'lvl_2' => esc_html__( 'Level 2: Compress all CSS & Javascript to single file.', 'enki' ),
        )
      );  

    $options[] = array( 'type' => 'groupend' );

	
		if( class_exists( 'Kopa_Page_Builder' ) ):

	    $options[] = array( 'title' => esc_html__( 'Page Builder - Cache Timeout', 'enki'), 'type' => 'groupstart' );
	  			
      $options[] = array(        
        'type'    => 'radio',
        'id'      => 'pagebuilder_cache_timeout',
        'default' => 'MINUTE_IN_SECONDS',
        'options' => array(
					''                  => esc_html__( 'Level 0: Turn off this feature', 'enki' ),
					'MINUTE_IN_SECONDS' => esc_html__( 'Level 1: One minutue', 'enki' ),
					'HOUR_IN_SECONDS'   => esc_html__( 'Level 2: One hour', 'enki' ),
					'DAY_IN_SECONDS'    => esc_html__( 'Level 3: One day', 'enki' ),
					'WEEK_IN_SECONDS'   => esc_html__( 'Level 4: One week', 'enki' )
        )
      );  

	    $options[] = array( 'type' => 'groupend' );  	

		endif;

	return $options;
}