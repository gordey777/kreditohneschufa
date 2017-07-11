<?php 

function enki_get_options_breadcrumb_details_01( &$options ){
    
    $options[] = array( 
        'title' => esc_html__( 'Details', 'enki'), 
        'type'  => 'groupstart',
        'desc'  => ''
    );

        // Begin: Page title
        $options[] = array( 'title' => esc_html__( 'Page title', 'enki'), 'type' => 'groupstart' );

            $options[] = array(
                'label'   => esc_html__( 'Is show page title ?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_show_page_title',
                'default' => 1
            );           

        $options[] = array( 'type' => 'groupend' );     
        // End: Page title

        // Begin: Styling
        $options[] = array( 'title' => esc_html__( 'Styling', 'enki'), 'type' => 'groupstart' );

            $options[] = array(
                'label'   => esc_html__( 'Enable custom styling?', 'enki'),
                'type'    => 'checkbox',
                'id'      => 'is_customize_breadcrumb',
                'default' => 0,
                'folds'   => 1
            );

            $options[] = array(
                'type'    => 'image',
                'id'      => 'breadcrumb_bg_image',
                'desc'    => esc_html__( 'Background image.', 'enki'),
                'fold'    => 'is_customize_breadcrumb'
            );

            $options[] = array(
                'type'    => 'color',
                'id'      => 'breadcrumb_bg_color',
                'desc'    => esc_html__( 'Background color.', 'enki'),
                'fold'    => 'is_customize_breadcrumb'
            );

        $options[] = array( 'type' => 'groupend' );
        // End: Customize

    $options[] = array( 'type' => 'groupend' );


    return $options;
    
}
