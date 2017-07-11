<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Layout_Secondary' ) ) {

	class Enki_Builder_Layout_Secondary {
		
		protected static $instance = null;
		private $list;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			$this->list = $this->_init_list();
			add_filter( 'kopa_page_builder_get_layouts', array( $this, 'set_layouts' ) );
		}

		function set_layouts( $layouts ) {
			foreach ( $this->list as $layout_slug => $layout ) {				
				$layouts[ $layout_slug ] = $this->_build( $layout );
			}

			return $layouts;
		}

		function is_secondary( $layout_slug ) {
			if( isset( $this->list[ $layout_slug ] ) ) {
				return true;
			}else{
				return false;
			}
		}

		private function _init_list() {

			return array(
				'nested_12'          => array( 'title' => esc_html__( '1 column', 'enki' ), 'grid' => array( 12 ) ),
				'nested_6_6'         => array( 'title' => esc_html__( '2 columns', 'enki' ), 'grid' => array( 6, 6 ) ),
				'nested_4_4_4'       => array( 'title' => esc_html__( '3 columns', 'enki' ), 'grid' => array( 4, 4, 4 ) ),
				'nested_3_3_3_3'     => array( 'title' => esc_html__( '4 columns', 'enki' ), 'grid' => array( 3, 3, 3, 3 ) ),
				'nested_2_2_2_2_2_2' => array( 'title' => esc_html__( '6 columns', 'enki' ), 'grid' => array( 2, 2, 2, 2, 2, 2 ) ),
				'nested_3_9'         => array( 'title' => esc_html__( '1/4 + 3/4', 'enki' ), 'grid' => array( 3, 9 ) ),
				'nested_9_3'         => array( 'title' => esc_html__( '3/4 + 1/4', 'enki' ), 'grid' => array( 9, 3 ) ),
				'nested_4_8'         => array( 'title' => esc_html__( '1/3 + 2/3', 'enki' ), 'grid' => array( 4, 8 ) ),
				'nested_8_4'         => array( 'title' => esc_html__( '2/3 + 1/3', 'enki' ), 'grid' => array( 8, 4 ) ),
				'nested_5_7'         => array( 'title' => esc_html__( '5/12 + 7/12', 'enki' ), 'grid' => array( 5, 7 ) ),
				'nested_7_5'         => array( 'title' => esc_html__( '7/12 + 5/12', 'enki' ), 'grid' => array( 7, 5 ) ),
			);			
		}

		private function _get_cols( $grid ) {
			$cols = array();

			for ( $i = 1; $i <= count( $grid ); $i++ ) {
				$cols[] = "col-{$i}";				
			}

			return $cols;
		}

		private function _build( $layout_info = array() ) {
			
			$layout = array(
				'title'     => $layout_info['title'],
				'preview'   => false,
				'customize' => array(),
				'section'   => array()
			);

			$layout['customize']['custom']['title']         = esc_html__( 'Custom', 'enki' );
			$layout['customize']['custom']['params']['css'] = array(
				'type'    => 'textarea',
				'title'   => esc_html__( 'Enter custom CSS code', 'enki' ),
				'rows'    => 10
			);

			$layout['section']['row-1'] = array(
				'title'        => esc_html__( 'Wrapper', 'enki' ),				
				'grid'         => $layout_info['grid'],				
				'customize'    => array(),
				'area'         => $this->_get_cols( $layout_info['grid'] )
			);

			return $layout;
		}

	}

}

