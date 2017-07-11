<?php

if ( ! class_exists( 'Enki_Page' ) ) {

	class Enki_Page {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function get_title() {
			$title = '';

		  	if ( is_home() ) {
		    	if ( get_option( 'page_for_posts', true ) ) {
			      	$title = get_the_title( get_option( 'page_for_posts', true ) );
			    } else {
			      	$title = esc_html__( 'Latest Posts', 'enki' );
			    }
		  	} elseif ( is_archive() ) {
		    	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			    if ( $term ) {
			      	$title = $term->name;
			    } elseif ( is_post_type_archive() ) {
			      	if ( isset( get_queried_object()->labels->name ) ) {
			      		$title = get_queried_object()->labels->name;
			      	} else {
			      		if ( isset( get_queried_object()->post_title ) ) {
			      			$title = get_queried_object()->post_title;
			      		}
			      	}
				} elseif ( is_day() ) {
			      	$title = sprintf( esc_html__( 'Daily Archives: %s', 'enki' ), get_the_date() );
			    } elseif ( is_month() ) {
			      	$title = sprintf( esc_html__( 'Monthly Archives: %s', 'enki' ), get_the_date( 'F Y' ) );
			    } elseif ( is_year() ) {
			      	$title = sprintf( esc_html__( 'Yearly Archives: %s', 'enki' ), get_the_date( 'Y' ) );
			    } elseif ( is_author() ) {
					$author = get_queried_object();
					$title  = sprintf( esc_html__( 'Author Archives: %s', 'enki' ), $author->display_name );
			    }
		  	} elseif ( is_search() ) {
		    	$title  = sprintf( esc_html__( 'Search Results for %s', 'enki' ), get_search_query() );
		  	} elseif ( is_404() ) {
		    	$title  = esc_html__( 'Not Found', 'enki' );
		  	} else {
		    	$title = get_the_title();
		  	}

		  	return apply_filters( 'enki_page_get_title', $title );
		}

		static function register_metabox() {

			// PAGE TITLE.
			$args = array(
			'id'          => 'enki-metabox-page-title',
			'title'       => esc_html__( 'Page Title', 'enki' ),
			'desc'        => '',
			'pages'       => array( 'page' ),
			'context'     => 'side',
			'priority'    => 'low',
			'fields'      => array(
				array(
					'title'   => esc_html__( 'Type', 'enki' ),
					'type'    => 'select',
					'id'      => 'enki_title_type',
					'default' => 'hide',
					'options' => array(
						'hide'      => esc_html__( 'Hidden', 'enki' ),
						'default'   => esc_html__( 'Default: Page title above the content, on the left.', 'enki' ),								
						'with-desc' => esc_html__( 'Page title with sub-title, centered.', 'enki' ),
					),
				),
			 	array(
					'title'    => esc_html__( 'Sub title', 'enki' ),
					'type'     => 'textarea',
					'id'       => 'enki_desc',
					'validate' => false,
					'rows'     => 4,
				) ) );

			if ( function_exists( 'kopa_register_metabox' ) ) {
				kopa_register_metabox( $args );
			}

		}

	}

}
