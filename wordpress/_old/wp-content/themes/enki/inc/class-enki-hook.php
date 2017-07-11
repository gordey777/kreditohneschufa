<?php

if ( ! class_exists( 'Enki_Hook' ) ) {

	class Enki_Hook {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function body_class( $classes ) {
			return $classes;
		}

		function post_class( $classes ) {
			global $post;

			if ( ! has_post_thumbnail( $post->ID ) ) {
				array_push( $classes, 'enki-missing-thumbnail' );
			}

			return $classes;
		}

		function apply_html_tag( $title ) {
			$title = do_shortcode( $title );
			return $title;
		}

		function set_extended_content_before_main( $page_id ) {
			if ( is_home() || is_category() || is_tag() ) {
				$page_id = (int) get_theme_mod( 'blog_extended_content_id', 0 );
			}

			return $page_id;
		}
	}

}


