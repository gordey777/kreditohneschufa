<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_font' );

function enki_get_options_font( $options ){    
    $enki_utility = Enki_Utility::get_instance();    

    $options[] = array(
        'title' => esc_html__( 'Font', 'enki' ),
        'type'  => 'title',        
        'id'    => 'font'        
    );


    // Upload your fonts.
    $options[] = array( 'title' =>  esc_html__( 'Upload your fonts', 'enki' ), 'type'  => 'groupstart' );
        $options[] = array(
            'id'      => 'custom_fonts',
            'type'    => 'custom_font_manager',
            'default' => array()            
        );

        $all_custom_fonts    = (array) get_theme_mod( 'custom_fonts' );
        $custom_font_options = array();

        foreach ( $all_custom_fonts as $custom_font ) {
            $custom_font_name = '';
            if ( isset( $custom_font['name'] ) ) {
                $custom_font_name = $custom_font['name'];
            }

            if ( $custom_font_name ) {
                $custom_font_options[ $custom_font_name ] = $custom_font_name;
            }
        }
     
        $standard_groups = array(
            'system_fonts' => esc_html__( 'System Fonts', 'enki'),
            'google_fonts' => esc_html__( 'Google Fonts', 'enki'),
        );

        $custom_groups = array();
        if ( $custom_font_options ) {
            $custom_groups = wp_parse_args( $standard_groups, array(
                'custom_fonts' => esc_html__( 'Custom Fonts', 'enki'),
            ) );
        }

        // fonts
        $standard_fonts = array(
            "none" => esc_html__( "-- Select a font --", 'enki' ),
            'system_fonts' => kopa_system_font_options(),
            'google_fonts' => kopa_google_font_options(),
        );

        $custom_fonts = array();
        if ( $custom_font_options ) {
            $custom_fonts = wp_parse_args( $standard_fonts, array(
                'custom_fonts' => $custom_font_options
            ) );

            unset( $custom_fonts['none'] );

            $custom_fonts =  wp_parse_args( $custom_fonts, array(
                'none' => "&mdash; Select a font &mdash;"
            ) );
        }

    $options[] = array( 'type' => 'groupend' );

    // Apply custom fonts.
    $options[] = array( 'title' =>  esc_html__( 'Elements', 'enki' ), 'type'  => 'groupstart' );

    $fonts = $enki_utility->get_site_elements();

    foreach($fonts as $key => $font){

        $options[] = array( 'title' => $font['title'], 'type'  => 'groupstart' );
            
            $options[] = array(
                'label'   => esc_html__( 'Enable custom font?', 'enki'),
                'id'      => "is_enable_custom_font_{$key}",
                'type'    => 'checkbox',
                'default' => 0,
                'folds'   => 1
            );


            $options[] = array(
                "id"        => "{$key}_font",
                "type"      => "select_font",
                "preview"   => "Grumpy wizards make toxic brew for the evil Queen and Jack.",
                'groups'    => ( $custom_groups ? $custom_groups : $standard_groups),
                "options"   => ( $custom_fonts ? $custom_fonts : $standard_fonts ),
                'default' => array(
                    'family' => $font['default']['family'],
                    'style'  => $font['default']['style'],
                    'size'   => $font['default']['size'],
                    'color'  => $font['default']['color'],
                ),
                'fold'    => "is_enable_custom_font_{$key}"
            );

        $options[] = array( 'type' => 'groupend' );
    }    

    $options[] = array( 'type' => 'groupend' );
   
	return $options;
}