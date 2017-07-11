<?php

if ( ! class_exists( 'Enki_Builder_Row' ) ) {

	class Enki_Builder_Row {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			Enki_Builder_Customize_Row::get_instance();
		}

	}

}

