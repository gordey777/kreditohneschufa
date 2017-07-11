<?php
add_filter( 'kopa_theme_options_settings', 'enki_get_options_blog' );

function enki_get_options_blog( $options ){
    $options[] = array(
        'title' => esc_html__( 'Blog / Archive', 'enki' ),
        'type'  => 'title',        
        'id'    => 'blog'        
    );

    // Begin: Before main content hook
    $options[] = array( 'title' => esc_html__( 'Before main content', 'enki'), 'type' => 'groupstart' );
        
			$options[] = array(
				'type'      => 'chosen_singular',
				'post_type' => 'page',
				'id'        => 'blog_extended_content_id',
				'data'      => array(
					'placeholder' => esc_html__( 'Select a page', 'enki' ),
				),
				'desc'      => esc_html__( 'Append content from static page ( which was built by PageBuilder )', 'enki' ),					
			);          
    $options[] = array( 'type' => 'groupend' );

    // Begin: Metadata
    $options[] = array( 'title' => esc_html__( 'Metadata', 'enki'), 'type' => 'groupstart' );
        
        $metadatas = array( 'date', 'comment', 'category', 'author' ,'share', 'like' );
        
        foreach ( $metadatas as $metadata ) {

            $options[] = array(
                'label'   => esc_html__( 'Is show', 'enki') . ' ' . $metadata . '?',
                'type'    => 'checkbox',
                'id'      => "is_show_blog_{$metadata}",
                'default' => 1
            );

        }

    $options[] = array( 'type' => 'groupend' );

   
	return $options;
}