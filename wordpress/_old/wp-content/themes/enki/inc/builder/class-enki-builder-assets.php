<?php

if ( ! class_exists( 'Enki_Builder_Assets' ) ) {

	class Enki_Builder_Assets {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ), 20 );
			add_action( 'wp_ajax_enki_save_builder_styling', array( $this, 'save_builder_styling' ) );
			add_action( 'wp_ajax_nopriv_enki_save_builder_styling', array( $this, 'save_builder_styling' ) );			
		}

		function enqueue_script() {
			if ( is_page() ) {

				global $post;

				$layout_slug           = Kopa_Page_Builder::get_current_layout( $post->ID );
				$layout_data_customize = Kopa_Page_Builder::get_layout_customize_data( $post->ID, $layout_slug );

				if( isset( $layout_data_customize['custom']['css'] ) && !empty( $layout_data_customize['custom']['css'] ) ) {
					wp_add_inline_style( 'enki-style', trim( $layout_data_customize['custom']['css'] ) );
				}

				$cache = $this->get_cache( $post->ID );
				if( $cache ) {
					wp_add_inline_style( 'enki-style', $cache );
				}

		  }
		}

		function save_builder_styling() {
			check_ajax_referer( 'enki_save_builder_styling', 'security' );

			if( class_exists( 'Kopa_Page_Builder' ) ) {
				
				$data    = $_POST;			
				$post_id = isset( $data['post_id'] ) && !empty( $data['post_id'] ) ? absint( $data['post_id'] ) : false;
				$css     = isset( $data['css'] ) && !empty( $data['css'] ) ? wp_kses_post( $data['css'] ) : false;

				if( $post_id &&  $css ) {
					
					$layout_slug = Kopa_Page_Builder::get_current_layout( $post_id );
					
					if( $layout_slug ) {
						
						$cache_key = $this->_get_id( $post_id, $layout_slug );
						$cache     = get_transient( $cache_key );
						
						if( !$cache ) {
							$cache_time = $this->_get_time( $post_id, $layout_slug );
							set_transient( $cache_key, $css, $cache_time );
						}

					}

				}

			}

			exit();
		}

		function get_cache( $post_id = 0 ) {
			$layout_slug = Kopa_Page_Builder::get_current_layout( $post_id );

			if( $layout_slug ) {				
				return get_transient( $this->_get_id( $post_id, $layout_slug ) );
			}else{
				return false;
			}
		}

		function clear_cache( $post_id = 0, $layout_slug = '' ) {
			$cache_key  =  $this->_get_id( $post_id, $layout_slug );
			delete_transient( $cache_key );
		}		

		private function _get_time( $post_id = 0, $layout_slug = '' ) {
			$timeout = esc_html( get_theme_mod( 'pagebuilder_cache_timeout', 'MINUTE_IN_SECONDS' ) );
			$timeout = empty( $timeout ) ? 'WEEK_IN_SECONDS' : $timeout;
			$timeout = constant( $timeout );
			
			return $timeout;			
		}

		private function _get_id( $post_id = 0, $layout_slug = '' ) {
			return sprintf( 'enki-buider-cache-styling--%d--%s', $post_id, $layout_slug );
		}
		
	}

}

