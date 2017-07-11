<?php

if ( ! class_exists( 'Enki_Builder_Widget' ) ) {

	class Enki_Builder_Widget {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			Enki_Builder_Customize_Widget::get_instance();
		}

	}

}

