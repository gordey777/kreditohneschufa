<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Data_Widget' ) ) {

	class Enki_Builder_Data_Widget extends Enki_Builder_Data {
		
		protected static $instance = null;
		private $id, $data, $index;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}		

		function set_id( $id = '' ) { $this->id = $id; }

		function set_data( $data = array() ) { 
			$this->data       = $data; 
			$this->margin     = $data['customize'][ 'margin' ];
			$this->padding    = $data['customize'][ 'padding' ];
			$this->background = $data['customize'][ 'bg' ];			
		}

		function set_index( $index = 0 ) { $this->index = $index; }
		
		function get_id() { return $this->id; }

		function get_data() { return $this->data; }

		function get_index() { return $this->index; }

		function get_html( $is_echo = true ) {
			$class_name = $this->_get_php_class();

			if( class_exists( $class_name ) ) {

				$args = $this->_get_widget_args();
				$data = $this->_get_widget_data();

				$obj         = new $class_name;
				$obj->id     = $this->get_id();
				$obj->number = null;

				if( $is_echo ){
					
					$obj->widget( $args, $data );				

				}

			}
		}

		function print_css( $post_id = 0 ) {
			$css = '';
			$css .= $this->get_css_margin();
			$css .= $this->get_css_padding();
			$css .= $this->get_background();			
			$css .= $this->data['customize'][ 'custom' ][ 'css' ];

			if( $css ){
				$css = str_replace( 'ID', '#' . $this->get_id(), $css );
				?>
				<div class="hidden enki-embed-styling"><?php echo esc_html( trim( $css ) ); ?></div>
				<?php				
			}
		}

		private function _get_widget_args() {
			return array(
				'before_widget' => $this->_get_before_widget(),
				'after_widget'  => $this->_get_after_widget(),
				'before_title'  => $this->_get_before_title(),
				'after_title'   => $this->_get_after_title()
			);
		}

		private function _get_widget_data() {
			return $this->data[ 'widget' ];
		}

		private function _get_php_class() {
			return esc_attr( $this->data[ 'class_name' ] );
		}		

		private function _get_before_widget() {

			$class    = $this->_get_widget_class();
			$effect   = $this->_get_appearance_effect();
			$duration = $this->_get_appearance_duration();
			$delay    = $this->_get_appearance_effect();

			if( $effect ) {
				$html = '<div id="%1$s" class="widget %2$s" data-wow-duration="%3$s" data-wow-delay="%4$s">';
				$html = sprintf( $html, $this->get_id(), $class, $duration, $delay );
			}else{
				$html = '<div id="%1$s" class="widget %2$s">';
				$html = sprintf( $html, $this->get_id(), $class );				
			}
			
			return $html;			
		}

		private function _get_after_widget() {
			return '</div>';
		}

		private function _get_before_title() {
			$style = $this->_get_title_style();			
			
			switch( $style ) {				
				case 'style-1st':
				case 'style-2nd':			
					$html = $this->_get_before_title_1st();			
					break;

				case 'style-3rd':
					$html = $this->_get_before_title_3rd();			
					break;

				case 'style-4th':
					$html = $this->_get_before_title_4th();
					break;

				case 'style-5th':
					$html = $this->_get_before_title_5th();
					break;

				case 'style-6th':
				case 'style-7th':
					$html = $this->_get_before_title_6th();				
        	break;

        default:
        	$html = $this->_get_before_title_default();	
					break;
			}

			return $html;			
		}

		private function _get_after_title() {
			$style = $this->_get_title_style();			

			switch( $style ) {				
				case 'style-1st':
					$html = $this->_get_after_title_1st();
					break;

				case 'style-2nd':					
				$html = $this->_get_after_title_2nd();
					break;

				case 'style-3rd':
					$html = $this->_get_after_title_3rd();
					break;

				case 'style-4th':
					$html = $this->_get_after_title_4th();
					break;

				case 'style-5th':
					$html = $this->_get_after_title_5th();
					break;

				case 'style-6th':
					$html = $this->_get_after_title_6th();
					break;

        case 'style-7th':
        	$html = $this->_get_after_title_7th();
        	break;

        default:
        	$html = $this->_get_after_title_default();	
        	break;
			}

			return $html;			
		}

		private function _get_before_title_default() {
			return '<h3 class="widget-title style-05"><span>';
		}

		private function _get_before_title_1st() {

			$index  = $this->_get_title_index();
			$prefix = $this->_get_title_prefix();

			$html = '<header class="widget-header style-01">';

			if ( $index || $prefix ) {
				$html .= '<h4 class="widget-sub-title">';
				if ( $index ) {
					$html .= '<span>' . $index . '</span>';
				}
				$html .= $prefix;
				$html .= '</h4>';
			}

			$html .= '<h3 class="widget-title">';

			return $html;
		}

		private function _get_before_title_3rd() {

			$index  = $this->_get_title_index();
			$prefix = $this->_get_title_prefix();

			$html = '<header class="widget-header style-03">';

			if ( $index || $prefix ) {
				$html .= '<h4 class="widget-sub-title">';
				if ( $index ) {
					$html .= '<span>' . $index . '</span>';
				}
				$html .= $prefix;
				$html .= '</h4>';
			}

			$html .= '<h3 class="widget-title">';

			return $html;
		}

		private function _get_before_title_4th() {
			return '<h3 class="widget-title style-03">';
		}

		private function _get_before_title_5th() {
			return '<h3 class="widget-title style-06">';
		}

		private function _get_before_title_6th() {			
			return '<header class="widget widget-header style-01"><h3 class="widget-title style-04">';
		}

		private function _get_after_title_default() {
			return '</span></h3>';
		}

		private function _get_after_title_1st() {
			$description = $this->_get_title_description();			

			$html = '</h3><span class="icon-title"></span>';
			if( $description ) {
				$html .= '<p>' . $description . '</p>';
			}
			$html .= '</header>';
			
			return $html;	
		}

		private function _get_after_title_2nd() {
			$description = $this->_get_title_description();

			$html = '</h3><span class="icon-title"></span>';
			if( $description ) {
				$html .= '<p class="style-01">' . $description . '</p>';
			}
			$html .= '</header>';
			
			return $html;	
		}

		private function _get_after_title_3rd() {
			$description = $this->_get_title_description();

			$html = '</h3><span class="icon-title"></span>';
			if( $description ) {
				$html .= '<p>' . $description . '</p>';
			}
			$html .= '</header>';
			
			return $html;	
		}

		private function _get_after_title_4th() {
			return '</h3>';
		}

		private function _get_after_title_5th() {
			return '</h3>';
		}		

		private function _get_after_title_6th() {
			$description   = $this->_get_title_description();
			$readmore_text = $this->_get_title_readmore_text();
			$readmore_url  = $this->_get_title_readmore_url();

			$html  = '</h3>';
			$html  .= '<p>' . $description . '</p>';
			if ( $readmore_text ) {
				$html .= sprintf( '<a href="%s" class="more-link style-03">', $readmore_url );
				$html .= $readmore_text;				
				$html .= '<i class="enki-icon-arrow icon-arrows-slim-right"></i>';
				$html .= '</a>';
			}
			$html .= '</header>';			

			return $html;
		}		

		private function _get_after_title_7th() {
			$description   = $this->_get_title_description();
			$readmore_text = $this->_get_title_readmore_text();
			$readmore_url  = $this->_get_title_readmore_url();

			$html  = '</h3>';
			$html  .= '<p class="style-02">' . $description . '</p>';
			if ( $readmore_text ) {
				$html .= sprintf( '<a href="%s" class="more-link style-03">', $readmore_url );
				$html .= $readmore_text;
				$html .= '<i class="enki-icon-arrow icon-arrows-slim-right"></i>';
				$html .= '</a>';
			}
			$html .= '</header>';			

			return $html;			
		}						

		private function _get_title_style() {
			return esc_attr( $this->data[ 'customize' ][ 'title' ][ 'style' ] );
		}

		private function _get_title_index() {
			return esc_attr( $this->data[ 'customize' ][ 'title' ][ 'index' ] );
		}

		private function _get_title_prefix() {
			return esc_attr( $this->data[ 'customize' ][ 'title' ][ 'prefix' ] );
		}

		private function _get_title_description() {
			return wp_kses_post( $this->data[ 'customize' ][ 'title' ][ 'description' ] );
		}

		private function _get_title_readmore_text() {
			return esc_attr( $this->data[ 'customize' ][ 'title' ][ 'readmore_text' ] );
		}

		private function _get_title_readmore_url() {
			return esc_attr( $this->data[ 'customize' ][ 'title' ][ 'readmore_url' ] );
		}

		private function _get_appearance_effect() {
			return esc_attr( $this->data[ 'customize' ][ 'appearance' ][ 'effect' ] );
		}
    
		private function _get_appearance_duration() {
			return esc_attr( $this->data[ 'customize' ][ 'appearance' ][ 'duration' ] );
		}

		private function _get_appearance_delay() {
			return esc_attr( $this->data[ 'customize' ][ 'appearance' ][ 'delay' ] );
		}

		private function _get_widget_class() {
			$classes = array( 'enki-widget' );
		
			$effect  = $this->_get_appearance_effect();
			if( $effect ) {
				array_push( $classes, $effect, 'enki-effect', 'wow' );
			}

			$custom_class = $this->data[ 'customize' ][ 'custom' ][ 'class' ];
			if( $custom_class ) {
				array_push( $classes, $custom_class );
			}

			$class_name = $this->_get_php_class();
			if( class_exists( $class_name ) ) {
				$obj = new $class_name;
				array_push( $classes, esc_attr( $obj->widget_options[ 'classname' ] ) );
				unset( $obj );
			}		

			return implode( ' ', $classes );
		}

	}

}
