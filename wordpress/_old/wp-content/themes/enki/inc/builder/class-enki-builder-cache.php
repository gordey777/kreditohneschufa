<?php

if ( ! class_exists( 'Enki_Builder_Cache' ) ) {

	class Enki_Builder_Cache {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_action( 'kopa_settings_save_theme-options', array( $this, 'clear_global' ) );
			add_action( 'kopa_page_builder_after_save_layout', array( $this, 'clear_cache' ), 10, 2 );
			add_action( 'kopa_page_builder_after_save_layout_customize', array( $this, 'clear_cache' ), 10, 2 );
			add_action( 'kopa_page_builder_after_save_row_customize', array( $this, 'clear_cache' ), 10, 2 );
			add_action( 'kopa_page_builder_after_save_col_customize', array( $this, 'clear_cache' ), 10, 2 );
			add_action( 'kopa_page_builder_after_save_widget', array( $this, 'clear_cache' ), 10, 2 );			
		}

		function clear_global() {

			$new_timeout = isset( $_POST['pagebuilder_cache_timeout'] ) ? esc_attr( $_POST['pagebuilder_cache_timeout'] ) : '';
			$old_timeout = esc_html( get_theme_mod( 'pagebuilder_cache_timeout', 'MINUTE_IN_SECONDS' ) );

			if( $old_timeout !== $new_timeout ){				
				global $wpdb;

				$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_enki-buider-cache-%'" );
				$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_enki-buider-cache-%'" );

				wp_reset_query();

			}
		}

		function clear_cache(  $post_id = 0, $layout_slug = '' ) {
			// Clear cache HTML.
			$cache_key = $this->_get_id( $post_id, $layout_slug );
			delete_transient( $cache_key );

			// Clear cache CSS.
			$obj_builder_assets = Enki_Builder_Assets::get_instance();
			$obj_builder_assets->clear_cache( $post_id, $layout_slug );
		}

		function get_status( $post_id = 0, $layout_slug = '' ) {
			$timeout = esc_html( get_theme_mod( 'pagebuilder_cache_timeout', 'MINUTE_IN_SECONDS' ) );
			
			if( empty( $timeout ) ) {
				return false;
			}else{
				return true;
			}			
		}

		function get_cache( $post_id = 0, $layout_slug = '' ) {
			$cache_key  =  $this->_get_id( $post_id, $layout_slug );
			$cache_data = get_transient( $cache_key );
			
			return $cache_data;
		}

		function set_cache( $post_id = 0, $layout_slug = '', $cache_data = '' ) {
			
			if( $cache_data ) {
			
				$html_minifier = KPB_Minifier_HTML::get_instance();
				$cache_data    = $html_minifier->minify( $cache_data );

				$cache_key  = $this->_get_id( $post_id, $layout_slug );
				$cache_time = $this->_get_time( $post_id, $layout_slug );

				set_transient( $cache_key, $cache_data, $cache_time );

			}

			return $cache_data;
		}

		private function _get_time( $post_id = 0, $layout_slug = '' ) {
			$timeout = esc_html( get_theme_mod( 'pagebuilder_cache_timeout', 'MINUTE_IN_SECONDS' ) );
			$timeout = empty( $timeout ) ? 0 : constant( $timeout );
			
			return $timeout;			
		}

		private function _get_id( $post_id = 0, $layout_slug = '' ) {
			return sprintf( 'enki-buider-cache--%d--%s', $post_id, $layout_slug );
		}

	}

}
