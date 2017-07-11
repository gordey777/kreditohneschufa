<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_header' );

function enki_get_options_header( $options ){
    $dir = get_template_directory() . '/inc/options/header/';

    $options[] = array(
        'title' => esc_html__( 'Header', 'enki' ),
        'type'  => 'title',        
        'id'    => 'header'        
    );

    $options[] = array(
        'title'   => esc_html__( 'Header style', 'enki'),
        'type'    => 'radio_image',
        'id'      => 'header_style',
        'default' => 'style-03',
        'desc'    => esc_html__( 'Each Header has its own customizations, so after picking one Header from the list, the system requires you to click "Save" to download respective customizations of that Header style.', 'enki'),
        'options' => apply_filters( 'enki_opt_set_header_style', array(             
            'style-03' => get_template_directory_uri() . '/images/options/header/style-03.png',
            'style-04' => get_template_directory_uri() . '/images/options/header/style-04.png',
            'style-06' => get_template_directory_uri() . '/images/options/header/style-06.png',
            'style-07' => get_template_directory_uri() . '/images/options/header/style-07.png',
            'style-08' => get_template_directory_uri() . '/images/options/header/style-08.png',
            'style-09' => get_template_directory_uri() . '/images/options/header/style-09.png',
            ''         => get_template_directory_uri() . '/images/options/header/transparent.png'
        ) ),
    );

    $activated_header = esc_html( get_theme_mod( 'header_style', 'style-03' ) );

    switch ( $activated_header ) {
        case 'style-03':        
            require_once  $dir . 'style_03.php';
            enki_get_options_header_details_03( $options );
            break;
        case 'style-04': 
            require_once  $dir . 'style_04.php';
            enki_get_options_header_details_04( $options );         
            break;        
        case 'style-06': 
            require_once  $dir . 'style_06.php';
            enki_get_options_header_details_06( $options );
            break; 
        case 'style-07': 
            require_once  $dir . 'style_07.php';
            enki_get_options_header_details_07( $options );
            break;   
        case 'style-08': 
            require_once  $dir . 'style_08.php';
            enki_get_options_header_details_08( $options );
            break;
        case 'style-09': 
            require_once  $dir . 'style_09.php';
            enki_get_options_header_details_09( $options );
            break;            
        default:            
            break;
    }
  
   
	return $options;
}