<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Data_Col' ) ) {

	class Enki_Builder_Data_Col extends Enki_Builder_Data {
		
		protected static $instance = null;
		private $id, $slug, $data, $index;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}		

		function get_id( $post_id = 0 ) {
			return sprintf( 'enki__post-%s__%s', $post_id, $this->slug );
		}

		function set_data( $data = array() ) { 
			$this->data = $data; 
			$this->margin     = $data[ 'margin' ];
			$this->padding    = $data[ 'padding' ];
			$this->background = $data[ 'bg' ];					
		}

		function set_slug( $slug = '' ) { $this->slug = $slug; }

		function set_index( $index = 0 ) { $this->index = $index; }

		function get_data() { return $this->data; }

		function get_slug() { return $this->slug; }

		function get_index() { return $this->index; }

		function get_classes( $classes = array() ) {
			
			array_push( $classes, 'enki-col' );
			
			// WIDTH.
			$size_lg = (int) esc_attr( $this->data[ 'width' ][ 'lg' ] );
			if( $size_lg ) {
				array_push( $classes, sprintf( 'col-lg-%d', $size_lg ) );
			}else{
				$obj_data_layout = Enki_Builder_Data_Layout::get_instance();
				$obj_data_row    = Enki_Builder_Data_Row::get_instance();
				$row_slug        = $obj_data_row->get_slug();
				$col_index       = $this->get_index();

				array_push( $classes, $obj_data_layout->get_col_classes_from_layout( $row_slug, $col_index ) );
			}			

			$size_md = (int) esc_attr( $this->data[ 'width' ][ 'md' ] );
			if( $size_md ) {
				array_push( $classes, sprintf( 'col-md-%d', $size_md ) );
			}

			$size_sm = (int) esc_attr( $this->data[ 'width' ][ 'sm' ] );
			if( $size_sm ) {
				array_push( $classes, sprintf( 'col-sm-%d', $size_sm ) );
			}

			$size_xs = (int) esc_attr( $this->data[ 'width' ] ['xs' ] );
			if( $size_xs ) {
				array_push( $classes, sprintf( 'col-xs-%d', $size_xs ) );
			}


			// PUSH.
			$size_lg = (int) esc_attr( $this->data[ 'push_left' ][ 'lg' ] );
			if( $size_lg ) {
				array_push( $classes, sprintf( 'col-lg-push-%d', $size_lg ) );
			}	

			$size_md = (int) esc_attr( $this->data[ 'push_left' ][ 'md' ] );
			if( $size_md ) {
				array_push( $classes, sprintf( 'col-md-push-%d', $size_md ) );
			}

			$size_sm = (int) esc_attr( $this->data[ 'push_left' ][ 'sm' ] );
			if( $size_sm ) {
				array_push( $classes, sprintf( 'col-sm-push-%d', $size_sm ) );
			}

			$size_xs = (int) esc_attr( $this->data[ 'push_left' ] ['xs' ] );
			if( $size_xs ) {
				array_push( $classes, sprintf( 'col-xs-push-%d', $size_xs ) );
			}			


			// CUSTOM.
			if( $this->data['custom']['class'] ) {
				array_push( $classes, $this->data[ 'custom' ][ 'class' ] );
			}

			return implode( ' ', $classes );
		}

		function print_css( $post_id = 0 ) {

			$css = '';
			$css .= $this->get_css_margin();
			$css .= $this->get_css_padding();
			$css .= $this->get_background();			
			$css .= $this->data[ 'custom' ] [ 'css' ];

			if( $css ){
				$css = str_replace( 'ID', '#' . $this->get_id( $post_id ) . ' .enki-col-wrap', $css );
				?>
				<div class="hidden enki-embed-styling"><?php echo wp_kses_post( trim( $css ) ); ?></div>
				<?php				
			}			
		}

	}

}
