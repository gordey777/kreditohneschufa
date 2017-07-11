<?php 

function enki_get_options_footer_details_05( &$options ){
    
    $options[] = array( 
        'title' => esc_html__( 'Details', 'enki'), 
        'type'  => 'groupstart',
        
    );
   
        // Begin: Copyright
        $options[] = array( 'title' => esc_html__( 'Copyright information', 'enki'), 'type' => 'groupstart' );
        
            $options[] = array(                
                'type'     => 'textarea',
                'id'       => 'copyright',
                'validate' => false
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Copyright


        // Begin: Newsletter
        $options[] = array( 'title' => esc_html__( 'Newsletter with MailChimp', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show newsletter form ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_newsletter',
                'default' => 1
            );

            $options[] = array(
                'desc'    => esc_html__( 'Enter "action" attribute of mailchimp form. Please read document for more information !?', 'enki' ),
                'type'    => 'text',
                'id'      => 'mailchimp_form_action',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Newsletter

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

        // Begin: Social links
        $options[] = array( 'title' => esc_html__( 'Payment gateway providers', 'enki'), 'type' => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Is show this module ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_payment_gateway_providers',
                'default' => 1
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Social links        

    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
