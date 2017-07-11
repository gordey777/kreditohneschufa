<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_color' );

function enki_get_options_color( $options ){    
    
    $options[] = array(
        'title' => esc_html__( 'Color', 'enki' ),
        'type'  => 'title',        
        'id'    => 'color'        
    );

		$options[] = array(			
			'label'   => esc_html__( 'Enable custom color', 'enki' ),
			'id'      => 'is_enable_custom_color',
			'type'    => 'checkbox',
			'default' => 0,
			'folds'   => 1
		);

		$options[] = array( 'title' =>  esc_html__( 'Custom color', 'enki'), 'type'  => 'groupstart' );			

			$options[] = array(
				'title'   => esc_html__( 'Primary color', 'enki' ),
				'type'    => 'color',					
				'id'      => 'primary_color',
				'default' => '',
				'fold'    => 'is_enable_custom_color'
			);			
		
		$options[] = array( 'type' => 'groupend' );
   
	return $options;
}