<?php 

function enki_get_options_header_details_03( &$options ){
    
    $options[] = array( 
        'title' => esc_html__( 'Details', 'enki'), 
        'type'  => 'groupstart',
        
    );

        // Begin: Logo
        $options[] = array( 'title' => esc_html__( 'Logos', 'enki'), 'type' => 'groupstart' );

            $options[] = array(                
							'type' => 'image',
							'id'   => 'logo',
							'size' => 'thumb',
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
                'label'   => esc_html__( 'Is show on header ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_search_form',
                'default' => 0
            );

            $options[] = array(
                'label'   => esc_html__( 'Is show on side panel ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_search_form_mobile',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );     
        // End: Search box

        // Begin: Socials
        $options[] = array( 'title' => esc_html__( 'Social links', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show social links', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_social_links',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Socials

        // Begin: Call to action
        $options[] = array( 'title' => esc_html__( 'Call to action button', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show this box', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_call_to_action',
                'default' => 1
            );

            $options[] = array(
                'desc'   => esc_html__( 'Message', 'enki'),
                'type'    => 'text',
                'id'      => 'call_to_action_message'                
            );

            $options[] = array( 'title' => esc_html__( 'Button', 'enki'), 'type' => 'groupstart' );
                
                $options[] = array(
                    'desc'   => esc_html__( 'Text', 'enki'),
                    'type'    => 'text',
                    'id'      => 'call_to_action_button_text'                
                );

                $options[] = array(
                    'desc'   => esc_html__( 'URL', 'enki'),
                    'type'    => 'text',
                    'id'      => 'call_to_action_button_url'                
                );

                $options[] = array(
                    'label'   => esc_html__( 'Is open by new tab ?', 'enki'),
                    'type'    => 'checkbox',
                    'id'      => 'call_to_action_is_open_new_tab',
                    'default' => 1
                );

            $options[] = array( 'type' => 'groupend' );

        $options[] = array( 'type' => 'groupend' );
        // End: Call to action


    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
