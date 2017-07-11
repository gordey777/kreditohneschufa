<?php 

function enki_get_options_footer_details_01( &$options ){
    
    $options[] = array( 
        'title' => esc_html__( 'Details', 'enki'), 
        'type'  => 'groupstart',
        
    );

        // Begin: Logo
        $options[] = array( 'title' => esc_html__( 'Logo', 'enki'), 'type' => 'groupstart' );

            $options[] = array(
							'type' => 'image',
							'size' => 'thumb',
							'id'   => 'logo_footer',
							'desc' => esc_html__( 'Upload your logo.', 'enki'),
            );
         
        $options[] = array( 'type' => 'groupend' );
        // End: Logo      


        // Begin: Copyright
        $options[] = array( 'title' => esc_html__( 'Copyright information', 'enki'), 'type' => 'groupstart' );
        
            $options[] = array(                
                'type'     => 'textarea',
                'id'       => 'copyright',
                'validate' => false
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Copyright


        // Begin: Social links
        $options[] = array( 'title' => esc_html__( 'Social links', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show social links on footer ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_social_links_footer',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Social links

    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
