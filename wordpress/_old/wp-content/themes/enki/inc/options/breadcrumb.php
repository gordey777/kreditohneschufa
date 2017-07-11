<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_breadcrumb' );

function enki_get_options_breadcrumb( $options ){

    $dir = get_template_directory() . '/inc/options/breadcrumb/';

    $options[] = array(
        'title' => esc_html__( 'Breadcrumb', 'enki' ),
        'type'  => 'title',        
        'id'    => 'breadcrumb'        
    );

    $options[] = array(
        'title'   => esc_html__( 'Breadcrumb style', 'enki'),
        'type'    => 'radio',
        'id'      => 'breadcrumb_style',
        'desc'    => esc_html__( 'The system requires you to click "Save" to download respective customizations of that Breadcrumb style.', 'enki'),
        'options' => apply_filters( 'enki_opt_set_header_style', array( 
            ''         => esc_html__( 'Hide me !', 'enki'),
            'style-01' => esc_html__( 'The content display on the center of container', 'enki'),           
        ) ),
    );

    $activated_breadcrumb = esc_html( get_theme_mod( 'breadcrumb_style', '' ) );

    switch ( $activated_breadcrumb ) {
        case 'style-01': 
            require_once  $dir . 'style_01.php';
            enki_get_options_breadcrumb_details_01( $options );
            break;            
        default:            
            break;
    }
   
	return $options;
}