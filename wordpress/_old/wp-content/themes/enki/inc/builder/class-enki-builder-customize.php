<?php

if ( ! class_exists( 'Enki_Builder_Customize' ) ) {

	class Enki_Builder_Customize {

		protected function get_tab_background() {

			$tab['title'] = esc_html__( 'Background', 'enki' );				

			$tab['params']['background-image'] = array(
				'type'    => 'attachment_image',
				'title'   => esc_html__( 'Background image', 'enki' ),
				'default' => ''
			);

			$tab['params']['background-color'] = array(
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'enki' ),
				'default' => ''
			);

			$tab['params']['background-repeat'] = array(
				'type'    => 'select',
				'title'   => esc_html__( 'Background repeat', 'enki' ),
				'default' => 'repeat',
				'options' => array(
					'repeat'    => esc_html__( 'Repeat', 'enki' ),
					'repeat-x'  => esc_html__( 'Repeat X', 'enki' ),
					'repeat-y'  => esc_html__( 'Repeat Y', 'enki' ),
					'no-repeat' => esc_html__( 'No repeat', 'enki' ),
					'initial'   => esc_html__( 'Initial', 'enki' ),
					'inherit'   => esc_html__( 'Inherit', 'enki' ),
				)
			);

			$tab['params']['background-position'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'Background position', 'enki' ),
				'default' => 'center center'
			);

			$tab['params']['background-attachment'] = array(
				'type'    => 'select',
				'title'   => esc_html__( 'Background attachment', 'enki' ),
				'default' => 'scroll',
				'options' => array(
					'scroll'  => esc_html__( 'Scroll', 'enki' ),
					'fixed'   => esc_html__( 'Fixed', 'enki' ),
					'local'   => esc_html__( 'Local', 'enki' ),
					'initial' => esc_html__( 'Initial', 'enki' ),
					'inherit' => esc_html__( 'Inherit', 'enki' )
				)
			);

			$tab['params']['background-size'] = array(
				'type'    => 'select',
				'title'   => esc_html__( 'Background size', 'enki' ),
				'default' => 'auto',
				'options' => array(
					'auto'    => esc_html__( 'Auto', 'enki' ),
					'cover'   => esc_html__( 'Cover', 'enki' ),
					'contain' => esc_html__( 'Contain', 'enki' ),
					'initial' => esc_html__( 'Initial', 'enki' ),
					'inherit' => esc_html__( 'Inherit', 'enki' )
				)
			);			

			return $tab;
		}

		protected function get_tab_background_default() {
			return array(				
				'background-image'       => '',
				'background-color'       => '',
				'background-repeat'      => 'repeat',
				'background-position'    => 'center center',
				'background-attachment'  => 'scroll',
				'background-size'        => 'auto'
			);
		}

		protected function get_tab_overlay() {
			$tab['title'] = esc_html__( 'Overlay', 'enki' );
			
			$tab['params']['status'] = array(
				'type'    => 'radio',
				'title'   => esc_html__( 'Is show overlay layer?', 'enki' ),
				'default' => 'false',
				'options' => array(
					'true'  => esc_html__( 'Yes', 'enki' ),
					'false' => esc_html__( 'No', 'enki' )
				)
			);

			$tab['params']['background-color'] = array(
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'enki' ),
				'default' => '#000000'
			);

			$tab['params']['opacity'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Opacity', 'enki' ),
				'default' => 70,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'preview' => 'percent'
			);

			return $tab;
		}

		protected function get_tab_overlay_default() {
			return array(
				'status'           => 'false',
				'background-color' => '#000000',
				'opacity'          => 70
			);
		}

		protected function get_tab_margin() {

			$tab['title']  = esc_html__( 'Margin', 'enki' );
			$tab['params'] = array();

			$tab['params']['top'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Top', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);
			$tab['params']['bottom'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Bottom', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);
			$tab['params']['left'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Left', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);
			$tab['params']['right'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Right', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);

			return $tab;
		}

		protected function get_tab_margin_default() {
			return array(
				'top'    => '',
				'bottom' => '',
				'left'   => '',
				'right'  => ''
			);
		}

		protected function get_tab_padding() {

			$tab['title']  = esc_html__( 'Padding', 'enki' );
			$tab['params'] = array();

			$tab['params']['top'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Top', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);

			$tab['params']['bottom'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Bottom', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);

			$tab['params']['left'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Left', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);

			$tab['params']['right'] = array(
				'type'    => 'number',
				'title'   => esc_html__( 'Right', 'enki' ),
				'default' => '',
				'affix'   => ' px'
			);	

			return $tab;		
		}

		protected function get_tab_padding_default() {
			return array(
				'top'    => '',
				'bottom' => '',
				'left'   => '',
				'right'  => ''
			);
		}

		protected function get_tab_custom() {

			$tab['title']         = esc_html__( 'Custom', 'enki' );
			$tab['params']        = array();

			$tab['params']['class'] = array(
				'type'    => 'text',
				'title'   => esc_html__( 'Enter custom HTML classes', 'enki' ),
				'default' => ''
			);

			$tab['params']['css'] = array(
				'type'    => 'textarea',
				'title'   => esc_html__( 'Enter custom CSS code', 'enki' ),
				'default' => '',
				'rows'    => 5,
				'class'   => 'kpb-ui-textarea-guide-line',
				'help'    => htmlspecialchars_decode(  esc_html__( 'Example: <code>ID a {color: red; }</code> <br/> ID: The ID of this element.', 'enki' ) )
			);

			return $tab;		
		}

		protected function get_tab_custom_default() {
			return array(
				'class'    => '',
				'css' => ''
			);
		}		

		protected function get_tab_width() {
			
			$tab['title']         = esc_html__( 'Width', 'enki' );
			$tab['params']        = array();

			$tab['params']['lg'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Large devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Desktops: (screen >= 1200px)', 'enki' )
			);

			$tab['params']['md'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Medium devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Desktops: (screen >= 992px) and (screen < 1200px)', 'enki' )
			);

			$tab['params']['sm'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Small devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Tablets (>= 768px)', 'enki' )
			);

			$tab['params']['xs'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Extra small devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Phones (< 768px)', 'enki' )
			);

			return $tab;			
		}

		protected function get_tab_width_default() {
			return array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => ''
			);
		}

		protected function get_tab_push_left() {
			
			$tab['title']  = esc_html__( 'Push left', 'enki' );
			$tab['params'] = array();

			$tab['params']['lg'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Large devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Desktops: (screen >= 1200px)', 'enki' )
			);

			$tab['params']['md'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Medium devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Desktops: (screen >= 992px) and (screen < 1200px)', 'enki' )
			);

			$tab['params']['sm'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Small devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Tablets (>=768px)', 'enki' )
			);

			$tab['params']['xs'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Extra small devices', 'enki' ),
				'default' => 0,
				'preview' => 'percent',
				'help'    => esc_html__( 'Phones (<768px)', 'enki' )
			);

			return $tab;			
		}

		protected function get_tab_push_left_default() {
			return array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => ''
			);
		}		

		protected function get_tab_appearance() {

			$tab['title']  = esc_html__( 'Appearance', 'enki' );
			$tab['params'] = array();
			$tab['params']['effect'] = array(
				'type'    => 'select',
				'title'   => esc_html__( 'Select an appearance effect', 'enki' ),
				'default' => '',
				'options' => $this->_get_list_of_effect(),
			);

			$tab['params']['duration'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Animation duration time', 'enki' ),
				'default' => 0.5,
				'min'     => 0,
				'max'     => 5,
				'step'    => 0.1,
				'affix'   => 's',
				'start'   => 0
			);

			$tab['params']['delay'] = array(
				'type'    => 'numeric_slider',
				'title'   => esc_html__( 'Animation duration time', 'enki' ),
				'default' => 0.5,
				'min'     => 0,
				'max'     => 5,
				'step'    => 0.1,
				'affix'   => 's',
				'start'   => 0
			);

			return $tab;
		}

		protected function get_tab_appearance_default() {
			return array(
				'effect'   => '',
				'duration' => '',
				'delay'    => ''
			);
		}			

		private function _get_list_of_effect() {
			return array(
				''                  => esc_html__( '-- Select a effect --', 'enki' ),				
				'flash'             => esc_html__( 'flash', 'enki' ),
				'pulse'             => esc_html__( 'pulse', 'enki' ),
				'rubberBand'        => esc_html__( 'rubber Band', 'enki' ),
				'shake'             => esc_html__( 'shake', 'enki' ),
				'swing'             => esc_html__( 'swing', 'enki' ),
				'tada'              => esc_html__( 'tada', 'enki' ),
				'wobble'            => esc_html__( 'wobble', 'enki' ),
				'bounce'            => esc_html__( 'bounce', 'enki' ),
				'bounceIn'          => esc_html__( 'bounce In', 'enki' ),
				'bounceInDown'      => esc_html__( 'bounce In Down', 'enki' ),
				'bounceInLeft'      => esc_html__( 'bounce In Left', 'enki' ),
				'bounceInRight'     => esc_html__( 'bounce In Right', 'enki' ),
				'bounceInUp'        => esc_html__( 'bounce In Up', 'enki' ),			
				'fadeIn'            => esc_html__( 'fade In', 'enki' ),
				'fadeInDown'        => esc_html__( 'fade In Down', 'enki' ),
				'fadeInDownBig'     => esc_html__( 'fade In Down Big', 'enki' ),
				'fadeInLeft'        => esc_html__( 'fade In Left', 'enki' ),
				'fadeInLeftBig'     => esc_html__( 'fade In Left Big', 'enki' ),
				'fadeInRight'       => esc_html__( 'fade In Right', 'enki' ),
				'fadeInRightBig'    => esc_html__( 'fade In Right Big', 'enki' ),
				'fadeInUp'          => esc_html__( 'fade In Up', 'enki' ),
				'fadeInUpBig'       => esc_html__( 'fade In Up Big', 'enki' ),
				'flip'              => esc_html__( 'flip', 'enki' ),
				'flipInX'           => esc_html__( 'flip In X', 'enki' ),
				'flipInY'           => esc_html__( 'flip In Y', 'enki' ),
				'lightSpeedIn'      => esc_html__( 'light Speed In', 'enki' ),		
				'rotateIn'          => esc_html__( 'rotate In', 'enki' ),
				'rotateInDownLeft'  => esc_html__( 'rotate In Down Left', 'enki' ),
				'rotateInDownRight' => esc_html__( 'rotate In Down Right', 'enki' ),
				'rotateInUpLeft'    => esc_html__( 'rotate In UpLeft', 'enki' ),
				'rotateInUpRight'   => esc_html__( 'rotate In Up Right', 'enki' ),
				'hinge'             => esc_html__( 'hinge', 'enki' ),
				'rollIn'            => esc_html__( 'roll In', 'enki' ),
				'zoomIn'            => esc_html__( 'zoom In', 'enki' ),
				'zoomInDown'        => esc_html__( 'zoom In Down', 'enki' ),
				'zoomInLeft'        => esc_html__( 'zoom In Left', 'enki' ),
				'zoomInRight'       => esc_html__( 'zoom In Right', 'enki' ),
				'zoomInUp'          => esc_html__( 'zoom In Up', 'enki' ),
			);
		}

	}

}

