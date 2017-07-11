<?php

if ( ! class_exists( 'Enki_Builder_Widgets' ) ) {

	class Enki_Builder_Widgets {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_filter( 'kopa_page_builder_get_layout_list_of_widgets', array( $this, 'set_layout_list_of_widgets' ) );
		}

		function set_layout_list_of_widgets() {
			return 'side';
		}
	}

}

