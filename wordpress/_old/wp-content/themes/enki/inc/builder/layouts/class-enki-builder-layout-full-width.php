<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Layout_Full_Width' ) ) {

	class Enki_Builder_Layout_Full_Width {
		
		protected static $instance = null;		

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {			
			add_filter( 'kopa_page_builder_get_layouts', array( $this, 'set_layouts' ) );
		}

		function set_layouts( $layouts ) {		
			$layouts['full-width'] = $this->_get_layout();
			return $layouts;
		}

		private function _get_layout() {
			
			$layout = array(
				'title'     => esc_html__( 'Full Width', 'enki' ),
				'preview'   => '',
				'customize' => array(),
				'section'   => array(),
			);

			$layout['customize']['custom']['title']         = esc_html__( 'Custom', 'enki' );
			$layout['customize']['custom']['params']['css'] = array(
				'type'    => 'textarea',
				'title'   => esc_html__( 'Enter custom CSS code', 'enki' ),
				'default' => '',
				'rows'    => 10,
				'class'   => 'kpb-ui-textarea-guide-line',
			);

			for ( $i = 1; $i <= 16; $i++ ) {

				$id_row  = "row-{$i}";
				$id_area = "col-{$i}";

				$layout['section'][ $id_row ] = array(
					'title' => esc_html__( 'Row', 'enki' ) . ' ' . $i,
					'grid'  => array( 12 ),
					'area'  => array( $id_area )
				);
				
			}

			return $layout;
		}

	}

}

