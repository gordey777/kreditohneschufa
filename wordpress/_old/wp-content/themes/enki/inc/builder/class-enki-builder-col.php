<?php

if ( ! class_exists( 'Enki_Builder_Col' ) ) {

	class Enki_Builder_Col {
		
		protected static $instance = null;
		
		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			Enki_Builder_Customize_Col::get_instance();
			add_filter( 'kopa_page_builder_get_cols', array( $this, 'set_cols' ) );
		}

		function set_cols( $cols ) {

			for ( $i = 1; $i <= 16; $i++ ) {
				$cols[ "col-{$i}" ]  = esc_html__( 'Col', 'enki' ) . ' ' . $i;
				for( $j = 1; $j <= 6; $j++ ) {
					$cols[ "col-{$i}-{$j}" ] = sprintf( '%s %d.%d', esc_html__( 'Col', 'enki' ), $i, $j );
				}
			}			

			return $cols;			
		}

	}

}

