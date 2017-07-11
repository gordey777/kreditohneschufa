<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_custom' );

function enki_get_options_custom( $options ){
    $enki_utility = Enki_Utility::get_instance();
    $viewports = $enki_utility->get_viewports();

    if( $viewports ){
        $options[] = array(
            'title' => esc_html__( 'Custom CSS', 'enki' ),
            'type'  => 'title',        
            'id'    => 'custom'        
        );

        foreach ( $viewports as $slug => $viewport ) {
            $options[] = array( 'title' => $viewport['title'], 'type' => 'groupstart' );            
                $options[] = array(
                    'title'    => '',                  
                    'type'     => 'textarea',
                    'id'       => sprintf( 'css_for_%s', $slug ),
                    'validate' => false
                );
            $options[] = array( 'type' => 'groupend' );
        }
       
    }

	return $options;
}