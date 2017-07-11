<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Customize_Layout' ) ) {

	class Enki_Builder_Customize_Layout extends Enki_Builder_Customize {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}		

		static function get_defaults() {
			$defaults['custom'] = $this->get_tab_custom_default();
			return $defaults;
		}

	}

}
