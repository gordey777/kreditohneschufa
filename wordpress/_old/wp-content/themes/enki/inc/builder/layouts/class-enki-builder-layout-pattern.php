<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder_Layout_Pattern' ) ) {

	class Enki_Builder_Layout_Pattern {	

		public $layout_name, $layout_slug, $rows, $layout_preview;

		public function set_layouts( $layouts ) {			
			if( $this->layout_slug ){
				$layouts[$this->layout_slug] = $this->get_layout();
			}
			return $layouts;
		}

		protected function get_layout() {

			$layout = array(
				'title'     => $this->layout_name,
				'preview'   => $this->layout_preview,
				'customize' => array(),
				'section'   => array(),
			);

			$layout['customize']['custom']['title']         = esc_html__( 'Custom', 'enki' );
			$layout['customize']['custom']['params']['css'] = array(
				'type'    => 'textarea',
				'title'   => esc_html__( 'Enter custom CSS code', 'enki' ),
				'rows'    => 10,
				'class'   => 'kpb-ui-textarea-guide-line'
			);
			
			foreach ( $this->rows as $row_slug => $row_info ) {
				$row_index = str_replace( 'row-', '', $row_slug );
				$layout['section'][ $row_slug ] = $this->build( $row_index, $row_info );
			}

			return $layout;
		}

		protected function get_cols( $row_index = 0, $grid = array() ) {
			$cols = array();

			if( 1 === count( $grid ) ){
				$cols[] = "col-{$row_index}";
			}else{
				for ( $i = 1; $i <= count( $grid ); $i++ ) {
					$cols[] = "col-{$row_index}-{$i}";				
				}
			}

			return $cols;
		}

		protected function build( $row_index = 0, $row_info = array() ) {
			return array(
				'title' => esc_html__( 'Row', 'enki' ) . ' ' . $row_index,
				'grid'  => $row_info['grid'],				
				'area'  => $this->get_cols( $row_index, $row_info['grid'] )
			);
		}

	}

}

