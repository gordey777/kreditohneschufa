<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Data_Layout' ) ) {

	class Enki_Builder_Data_Layout extends Enki_Builder_Data {
		
		protected static $instance = null;
		private $slug, $data, $info, $data_customize;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function set_data_customize( $data_customize = array() ) { $this->data_customize = $data_customize; }

		function set_data( $data = array() ) { $this->data = $data; }
		
		function set_slug( $slug = '' ) { $this->slug = $slug; }

		function set_info( $info = array() ) { $this->info = $info; }
		
		function get_data_customize() { return $this->data_customize; }

		function get_data() { return $this->data; }

		function get_slug() { return $this->slug; }

		function get_info() { return $this->info; }		

		function get_col_classes_from_layout( $row_slug, $col_index ) {
			$class = '';

			if( isset( $this->info[ 'section' ][ $row_slug ][ 'grid' ][ $col_index ] ) ){
				$size = (int)$this->info[ 'section' ][ $row_slug ][ 'grid' ][ $col_index ];
				$class = "col-lg-{$size}";
			}

			return $class;
		}

	}

}
