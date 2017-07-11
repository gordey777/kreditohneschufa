<?php

if ( ! class_exists( 'Enki_Builder_Layout' ) ) {

	class Enki_Builder_Layout {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			
			Enki_Builder_Layout_Corporate::get_instance();
			Enki_Builder_Layout_Creative::get_instance();
			Enki_Builder_Layout_Freelancer::get_instance();
			Enki_Builder_Layout_Business::get_instance();

			Enki_Builder_Layout_Full_Width::get_instance();
			Enki_Builder_Layout_Master::get_instance();
			Enki_Builder_Layout_Secondary::get_instance();
			
		}			

	}

}

