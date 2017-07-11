<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Customize_Widget' ) ) {

	class Enki_Builder_Customize_Widget extends Enki_Builder_Customize {
		
		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_filter( 'kopa_page_builder_get_widget_fields', array( $this, 'set_fields' ) );			
		}

		function set_fields( $fields ) {
			
			$fields['title']      = $this->_get_tab_title();
			$fields['bg']         = $this->get_tab_background();
			$fields['margin']     = $this->get_tab_margin();
			$fields['padding']    = $this->get_tab_padding();
			$fields['appearance'] = $this->get_tab_appearance();
			$fields['custom']     = $this->get_tab_custom();
		
			return $fields;			
		}

		function get_defaults() {

			$defaults['title']      = $this->_get_tab_title_default();
			$defaults['bg']         = $this->get_tab_background_default();
			$defaults['margin']     = $this->get_tab_margin_default();
			$defaults['padding']    = $this->get_tab_padding_default();
			$defaults['appearance'] = $this->get_tab_appearance_default();
			$defaults['custom']     = $this->get_tab_custom_default();

			return $defaults;			
		}	

		private function _get_tab_title() {
					
			$tab['title']  = esc_html__( 'Title', 'enki' );
			$tab['params'] = array();
			$tab['params']['style'] = array(
				'type'    => 'select',
				'title'   => esc_html__( 'Style', 'enki' ),
				'default' => 'style-1st',
				'options' => array(
					''   => esc_html__( '-- Default --', 'enki' ),
					'style-1st' => esc_html__( 'Title with order number, prefix & description', 'enki' ),
					'style-2nd' => esc_html__( 'Title with order number, prefix & description (larger)', 'enki' ),
					'style-3rd' => esc_html__( 'Title with order number, prefix & description (text align left)', 'enki' ),
					'style-4th' => esc_html__( 'Large title', 'enki' ),
					'style-5th' => esc_html__( 'Large title (with a serif font)', 'enki' ),
					'style-6th' => esc_html__( 'Title with description & read more', 'enki' ),
					'style-7th' => esc_html__( 'Title with description (large) & read more', 'enki' ),
				)
			);

			$tab['params']['index'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'Order number', 'enki' ),
				'default' => ''
			);

			$tab['params']['prefix'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'Prefix text', 'enki' ),
				'default' => ''
			);

			$tab['params']['description'] = array(
				'type'    => 'textarea',
				'title'   => esc_html__( 'Description', 'enki' ),
				'default' => ''
			);

			$tab['params']['readmore_text'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'Label for "read more button"', 'enki' ),
				'default' => ''
			);

			$tab['params']['readmore_url'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'URL for "read more button"', 'enki' ),
				'default' => ''
			);

			return $tab;			
		}
		
		private function _get_tab_title_default()	{
			return array(
				'style'         => 'default',
				'index'         => '',
				'prefix'        => '',
				'description'   => '',
				'readmore_text' => '',
				'readmore_url'  => ''
			);
		}

	}

}
