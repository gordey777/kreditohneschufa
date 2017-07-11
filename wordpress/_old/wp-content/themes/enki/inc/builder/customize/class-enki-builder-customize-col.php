<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Customize_Col' ) ) {

	class Enki_Builder_Customize_Col extends Enki_Builder_Customize {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_filter( 'kopa_page_builder_get_col_fields', array( $this, 'set_fields' ) );
		}

		function set_fields( $fields ) {
			$fields['bg']        = $this->get_tab_background();
			$fields['margin']    = $this->get_tab_margin();			
			$fields['padding']   = $this->get_tab_padding();	
			$fields['width']     = $this->get_tab_width();
			$fields['push_left'] = $this->get_tab_push_left();
			$fields['custom']    = $this->get_tab_custom();

			return $fields;			
		}

		function get_defaults() {
			$defaults['bg']        = $this->get_tab_background_default();
			$defaults['margin']    = $this->get_tab_margin_default();			
			$defaults['padding']   = $this->get_tab_padding_default();	
			$defaults['width']     = $this->get_tab_width_default();
			$defaults['push_left'] = $this->get_tab_push_left_default();
			$defaults['custom']    = $this->get_tab_custom_default();

			return $defaults;			
		}		

	}

}
