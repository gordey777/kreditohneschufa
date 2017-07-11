<?php

if ( ! class_exists( 'Enki_Autoloader' ) ) {

	class Enki_Autoloader {

		private $include_path = '';

		function __construct() {
			if ( function_exists( '__autoload' ) ) {
				spl_autoload_register( '__autoload' );
			}

			spl_autoload_register( array( $this, 'autoload' ) );

			$this->include_path = get_template_directory() . '/inc/';
		}

		function autoload( $class ) {
			$class = strtolower( $class );
			$file  = $this->__get_file_name_from_class( $class );
			$path  = $this->__filter( '', $class );

			if ( $path && ( ! $this->__load_file( $path . $file ) ) ) {
				$this->__load_file( $this->include_path . $file );
			}
		}

		private function __filter( $path, $class ) {

			if ( 0 === strpos( $class, 'enki_' ) ) {
				
				if ( 0 === strpos( $class, 'enki_builder_' ) ) {

					if ( 0 === strpos( $class, 'enki_builder_layout_' ) ) {
						return $this->include_path . '/builder/layouts/';
					}elseif ( 0 === strpos( $class, 'enki_builder_customize_' ) ) {
						return $this->include_path . '/builder/customize/';
					}elseif ( 0 === strpos( $class, 'enki_builder_data_' ) ) {
						return $this->include_path . '/builder/data/';
					}else{
						return $this->include_path . '/builder/';
					}					

				} else {
					return $this->include_path;
				}

			} else {
				return false;
			}

		}

		private function __get_file_name_from_class( $class ) {
			return 'class-' . str_replace( '_', '-', $class ) . '.php';
		}

		private function __load_file( $path ) {
			$is_ready = false;

			if ( $path && is_readable( $path ) ) {
				include_once strtolower( $path );
				$is_ready = true;
			}

			return $is_ready;
		}

	}

	new Enki_Autoloader();

}
