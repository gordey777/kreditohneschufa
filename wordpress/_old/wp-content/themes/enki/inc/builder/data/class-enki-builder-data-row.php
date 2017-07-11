<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Data_Row' ) ) {

	class Enki_Builder_Data_Row extends Enki_Builder_Data {
		
		protected static $instance = null;
		private $id, $slug, $data, $index;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		function get_id( $post_id = 0) {
			return sprintf( 'enki__post-%s__%s', $post_id, $this->slug );
		}

		function set_data( $data = array() ) {
			$this->data       = $data;
			$this->margin     = $data[ 'margin' ];
			$this->padding    = $data[ 'padding' ];
			$this->background = $data[ 'bg' ];
			$this->overlay    = $data[ 'overlay' ];			
		}
		
		function set_slug( $slug = '' ) { $this->slug = $slug; }

		function set_index( $index = 0 ) { $this->index = $index; }

		function get_data() { return $this->data; }

		function get_slug() { return $this->slug; }
		
		function get_index() { return $this->index; }

		function get_classes() {

			$classes = array( 'enki-section', 'kopa-area' );

			if( 'true' === $this->data[ 'overlay' ][ 'status' ] ) {	
				array_push( $classes, 'enki-layer-overlay' );
			}

			if( $this->data['custom']['class'] ) {
				array_push( $classes, $this->data['custom']['class'] );
			}

			return implode( ' ', $classes );
		}

		function get_container_classes() {
			$classes = array( 'enki-container' );

			if( 'true' === $this->data[ 'container' ][ 'is_boxed' ] ) {
				array_push( $classes, 'container' );
			}else{
				array_push( $classes, 'enki-fullwidth' );
			}

			return implode( ' ', $classes );
		}

		function print_css( $post_id = 0 ) {

			$css = '';
			$css .= $this->get_css_margin();
			$css .= $this->get_css_padding();
			$css .= $this->get_background();
			$css .= $this->get_overlay();
			$css .= $this->data[ 'custom' ] [ 'css' ];

			if( $css ){
				$css = str_replace( 'ID', '#' . $this->get_id( $post_id ), $css );
				?>
				<div class="hidden enki-embed-styling"><?php echo esc_html( trim( $css ) ); ?></div>
				<?php				
			}
		}

	}

}
