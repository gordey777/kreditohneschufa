<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_footer' );

function enki_get_options_footer( $options ){
    $dir = get_template_directory() . '/inc/options/footer/';

    $options[] = array(
        'title' => esc_html__( 'Footer', 'enki' ),
        'type'  => 'title',        
        'id'    => 'footer'        
    );

    $options[] = array(
        'title'   => esc_html__( 'Footer style', 'enki'),
        'type'    => 'radio_image',
        'id'      => 'footer_style',
        'default' => 'style-01',
        'desc'    => esc_html__( 'Each Footer has its own customizations, so after picking one Footer from the list, the system requires you to click "Save" to download respective customizations of that Footer style.', 'enki'),
        'options' => apply_filters( 'enki_opt_set_footer_style', array(             
            'style-01' => get_template_directory_uri() . '/images/options/footer/style-01.png',
            'style-02' => get_template_directory_uri() . '/images/options/footer/style-02.png',
            'style-03' => get_template_directory_uri() . '/images/options/footer/style-03.png',
            'style-04' => get_template_directory_uri() . '/images/options/footer/style-04.png',
            'style-05' => get_template_directory_uri() . '/images/options/footer/style-05.png',
            ''         => get_template_directory_uri() . '/images/options/footer/transparent.png'
        ) ),
    );

    $activated_footer = esc_html( get_theme_mod( 'footer_style', 'style-01' ) );

    switch ( $activated_footer ) {       
        case 'style-01': 
            require_once  $dir . 'style_01.php';
            enki_get_options_footer_details_01( $options );
            break;   
        case 'style-02': 
            require_once  $dir . 'style_02.php';
            enki_get_options_footer_details_02( $options );
            break;
        case 'style-03':
            require_once  $dir . 'style_03.php';
            enki_get_options_footer_details_03( $options );
            break;
        case 'style-04':
            require_once  $dir . 'style_04.php';
            enki_get_options_footer_details_04( $options );
            break;  
        case 'style-05':
            require_once  $dir . 'style_05.php';
            enki_get_options_footer_details_05( $options );
            break;         
        default:            
            break;
    }

    return $options;
}
