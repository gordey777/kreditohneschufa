<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_post' );

function enki_get_options_post( $options ){
    
    $options[] = array(
        'title' => esc_html__( 'Post', 'enki' ),
        'type'  => 'title',        
        'id'    => 'post'        
    );

	// Begin: Metadata
    $options[] = array( 'title' => esc_html__( 'Metadata', 'enki'), 'type' => 'groupstart' );
        
        $options[] = array(
            'label'   => esc_html__( 'Is show featured content?', 'enki'),
            'type'    => 'checkbox',
            'id'      => 'is_show_post_featured',
            'default' => 1
        );

        $metadatas = array( 'date', 'comment', 'category', 'tag', 'author', 'share', 'like' );
        
        foreach ( $metadatas as $metadata ) {
            $options[] = array(
                'label'   => esc_html__( 'Is show', 'enki') . ' ' . $metadata . '?',
                'type'    => 'checkbox',
                'id'      => "is_show_post_{$metadata}",
                'default' => 1
            );
        }

        $options[] = array(
            'label'   => esc_html__( 'Is show adjacent posts?', 'enki'),
            'type'    => 'checkbox',
            'id'      => 'is_show_post_adjacent',
            'default' => 1
        );


    $options[] = array( 'type' => 'groupend' );
   
	return $options;
}