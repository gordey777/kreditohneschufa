<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Layout_Corporate' ) ) {

	class Enki_Builder_Layout_Corporate extends Enki_Builder_Layout_Pattern {
		
		protected static $instance = null;		

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			$this->layout_slug    = 'home_coporate';			
			$this->layout_name    = esc_html__( 'Home Coporate', 'enki' );
			$this->rows           = $this->_init_rows();

			add_filter( 'kopa_page_builder_get_layouts', array( $this, 'set_layouts' ) );
		}		

		private function _init_rows() {
			return array(
				'row-1'  => array( 'title' => esc_html__( 'Row 1', 'enki' ), 'grid' => array( 12 ) ),
				'row-2'  => array( 'title' => esc_html__( 'Row 2', 'enki' ), 'grid' => array( 12 ) ),
				'row-3'  => array( 'title' => esc_html__( 'Row 3', 'enki' ), 'grid' => array( 4, 8 ) ),
				'row-4'  => array( 'title' => esc_html__( 'Row 4', 'enki' ), 'grid' => array( 6, 6 ) ),
				'row-5'  => array( 'title' => esc_html__( 'Row 5', 'enki' ), 'grid' => array( 12 ) ),
				'row-6'  => array( 'title' => esc_html__( 'Row 6', 'enki' ), 'grid' => array( 12 ) ),
				'row-7'  => array( 'title' => esc_html__( 'Row 7', 'enki' ), 'grid' => array( 12 ) ),
				'row-8'  => array( 'title' => esc_html__( 'Row 8', 'enki' ), 'grid' => array( 12 ) ),
				'row-9'  => array( 'title' => esc_html__( 'Row 9', 'enki' ), 'grid' => array( 6, 6 ) ),
				'row-10' => array( 'title' => esc_html__( 'Row 10', 'enki' ), 'grid' => array( 12 ) ),
				'row-11' => array( 'title' => esc_html__( 'Row 11', 'enki' ), 'grid' => array( 12 ) ),
				'row-12' => array( 'title' => esc_html__( 'Row 12', 'enki' ), 'grid' => array( 12 ) ),
				'row-13' => array( 'title' => esc_html__( 'Row 13', 'enki' ), 'grid' => array( 12 ) ),
				'row-14' => array( 'title' => esc_html__( 'Row 14', 'enki' ), 'grid' => array( 12 ) )
			);
		}		

	}

}

