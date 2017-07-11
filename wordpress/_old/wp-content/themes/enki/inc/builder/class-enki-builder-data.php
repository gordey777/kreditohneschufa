<?php

if ( ! class_exists( 'Enki_Builder_Data' ) ) {

	class Enki_Builder_Data {

		protected $margin, $padding, $background, $overlay;

		protected function get_css_margin() {			
			return $this->_get_css_spacing( 'margin', $this->margin );
		}

		protected function get_css_padding() {			
			return $this->_get_css_spacing( 'padding', $this->padding );
		}		

		protected function get_background() {
			$css        = '';

			$bg_color = trim( $this->background[ 'background-color' ] );
			if( $bg_color ){
				$css .= sprintf( 'background-color: %s;', $bg_color );
			}

			$bg_image = (int) $this->background[ 'background-image' ];
			if( $bg_image ){
				$image_info = wp_get_attachment_image_src( $bg_image, 'full' );
				if( isset( $image_info[0] ) ) {
								
					$css .= sprintf( 'background-image: url( %s );', esc_url( $image_info[0] ) );

					$attributes = array(  'background-repeat', 'background-position', 'background-attachment', 'background-size' );

					foreach( $attributes as $attr ) {				
						if( '' !== trim( $this->background[ $attr ] ) ) {						
							$css .= sprintf( '%s: %s;', $attr, $this->background[ $attr ] );
						}
					}

				}

			}			

			$css = $css ? sprintf( 'ID { %s }', $css ) : '';

			return $css;
		}

		protected function get_overlay() {
			$css = '';

			if( 'true' === $this->overlay[ 'status' ] ) {

				if( $this->overlay[ 'background-color' ] ) {
					
					$enki_utility = Enki_Utility::get_instance();
					$opacity      = floatval( $this->overlay[ 'opacity' ] ) / 100;
					$bg_color     = $enki_utility->convert_hex_to_rgba( $this->overlay[ 'background-color' ], $opacity );

					$css .= sprintf( 'ID.enki-layer-overlay::before{ background-color: %s; }', $bg_color );
				}				

			}

			return $css;
		}

		private function _get_css_spacing( $type = 'margin', $data = array() ) {
			$css = '';

			foreach( array( 'top', 'bottom', 'left', 'right' ) as $position ) {
				
				if( '' !== trim( $data[ $position ] ) ) {
					$val = floatval( $data[ $position ] );
					$css .= sprintf( '%s-%s: %spx;', $type, $position, $val );
				}

			}
			
			$css = $css ? sprintf( 'ID { %s }', $css ) : '';

			return $css;
		}		

	}

}