<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Customize_Row' ) ) {

	class Enki_Builder_Customize_Row extends Enki_Builder_Customize {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_filter( 'kopa_page_builder_get_row_fields', array( $this, 'set_fields' ) );
		}

		function set_fields( $fields ) {
			$fields['container'] = $this->_get_tab_container();
			$fields['bg']        = $this->get_tab_background();
			$fields['overlay']   = $this->get_tab_overlay();
			$fields['margin']    = $this->get_tab_margin();			
			$fields['padding']   = $this->get_tab_padding();			
			$fields['custom']    = $this->get_tab_custom();

			return $fields;
		}

		function get_defaults() {
			$defaults['container'] = $this->_get_tab_container_default();
			$defaults['bg']        = $this->get_tab_background_default();
			$defaults['overlay']   = $this->get_tab_overlay_default();
			$defaults['margin']    = $this->get_tab_margin_default();
			$defaults['padding']   = $this->get_tab_padding_default();
			$defaults['custom']    = $this->get_tab_custom_default();

			return $defaults;			
		}	
		
		private function _get_tab_container() {

			$tab['title']  = esc_html__( 'Container', 'enki' );
			$tab['params'] = array();

			$tab['params']['is_boxed'] = array(
				'type'    => 'radio',
				'title'   => esc_html__( 'Boxed Mode', 'enki' ),				
				'default' => 'false',
				'options' => array(
					'true'  => esc_html__( 'On', 'enki' ),
					'false' => esc_html__( 'Off', 'enki' )
				)
			);

			return $tab;
		}

		private function _get_tab_container_default() {
			return array(
				'is_boxed' => 'false'
			);
		}

	}

}

