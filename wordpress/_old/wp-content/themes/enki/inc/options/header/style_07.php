<?php 

function enki_get_options_header_details_07( &$options ){
    
    $options[] = array( 
        'title' => esc_html__( 'Details', 'enki'), 
        'type'  => 'groupstart',
        
    );

        // Begin: Logo
        $options[] = array( 'title' => esc_html__( 'Logos', 'enki'), 'type' => 'groupstart' );

            $options[] = array(
							'type' => 'image',
							'size' => 'thumb',
							'id'   => 'logo',
							'desc' => esc_html__( 'Upload your logo.', 'enki'),
            );

            $options[] = array(
							'type' => 'image',
							'size' => 'thumb',
							'id'   => 'logo_mobile',
							'desc' => esc_html__( 'Upload your logo for side panel.', 'enki'),
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Logo

        // Begin: Search box
        $options[] = array( 'title' => esc_html__( 'Search form', 'enki'), 'type' => 'groupstart' );

            $options[] = array(
                'label'   => esc_html__( 'Is show on side panel.', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_search_form_mobile',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );     
        // End: Search box

        // Begin: Phone number
        $options[] = array( 'title' => esc_html__( 'Phone number', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'type'    => 'text',
                'id'      => 'phone_number',
                'desc'    => esc_html__( 'Enter your phone number.', 'enki'),
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Phone number

    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
