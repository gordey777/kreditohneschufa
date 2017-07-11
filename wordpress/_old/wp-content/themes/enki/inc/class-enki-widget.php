<?php

if ( ! class_exists( 'Enki_Widget' ) ) {

	class Enki_Widget {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function apply_argument_post__in( $query, $instance, $post_type ) {
			
			$ids = $instance['ids'];

			if( !is_array( $instance['ids'] ) ) {			
				$ids = trim( $ids );
				$ids = $ids ? explode( ',', $ids ) : array();
			}

			if ( count( $ids ) ) {
				$query = array(
					'post_type'           => $post_type,
					'orderby'             => 'post__in',
					'ignore_sticky_posts' => true,
					'post__in'            => $ids,
				);
			}

			return $query;
		}

		function the_excerpt( $post_id = 0, $num_words = 0 ) {

			if ( $num_words < 0 ) { return; }

			if ( $post_id && $num_words ) {
				$excerpt = get_the_excerpt();
				if ( $excerpt ) {
					printf( '<p>%s</p>', wp_trim_words( $excerpt, $num_words, '' ) );
				}
			} else {
				the_excerpt();
			}

		}
	}

}
