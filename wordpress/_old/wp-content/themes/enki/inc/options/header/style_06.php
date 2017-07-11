<?php 

function enki_get_options_header_details_06( &$options ){
    
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
                'label'   => esc_html__( 'Is show on header', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_search_form',
                'default' => 0
            );

            $options[] = array(
                'label'   => esc_html__( 'Is show on side panel.', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_search_form_mobile',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );     
        // End: Search box


        // Begin: Intro text
        $options[] = array( 'title' => esc_html__( 'Intro text', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show intro text.', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_intro_text',
                'default' => 1
            );

            $options[] = array(                
                'type'    => 'textarea',
                'id'      => 'intro_text'
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Intro text


        // Begin: Socials
        $options[] = array( 'title' => esc_html__( 'Social links', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show social links', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_social_links',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Intro text

    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
