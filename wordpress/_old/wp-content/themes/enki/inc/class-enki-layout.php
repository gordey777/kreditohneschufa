<?php

if ( ! class_exists( 'Enki_Layout' ) ) {

	class Enki_Layout {

		public $activated_layout = array( 'layout_id' => '', 'sidebars' => array() );

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {

			if ( class_exists( 'Kopa_Framework' ) ) {
				add_filter( 'kopa_layout_manager_settings', array( $this, 'register_layouts' ) );
				add_filter( 'kopa_sidebar_default', array( $this, 'get_default_sidebars' ) );
				add_filter( 'kopa_sidebar_default_attributes', array( $this, 'get_default_sidebar_args' ) );
			} else {
				add_action( 'widgets_init', array( $this, 'set_default_sidebars' ) );
			}
		}

		function get_activated_layout() {
			$this->activated_layout = array( 'layout_id' => '', 'sidebars' => array() );
			if ( function_exists( 'kopa_get_template_setting' ) ) {
		        $this->activated_layout = kopa_get_template_setting();
		    }

		    if ( empty( $this->activated_layout['layout_id'] ) ) {
		    	$this->activated_layout['layout_id'] = 'default';
		    	$this->activated_layout['sidebars'] = $this->get_sidebars();
		    }
		}

		function get_positions() {
		    $positions = apply_filters('enki_layout_get_positions',array(
				'pos_right'    => esc_html__( 'Right', 'enki' ),
				'pos_footer_1' => esc_html__( 'Footer 1', 'enki' ),
				'pos_footer_2' => esc_html__( 'Footer 2', 'enki' ),
				'pos_footer_3' => esc_html__( 'Footer 3', 'enki' ),
				'pos_footer_4' => esc_html__( 'Footer 4', 'enki' ),
			));

		    return $positions;
		}

		function get_sidebars() {
		    $sidebars = apply_filters('enki_layout_get_sidebars',array(
				'pos_right'    => 'sb_right',
				'pos_footer_1' => 'sb_footer_1',
				'pos_footer_2' => 'sb_footer_2',
				'pos_footer_3' => 'sb_footer_3',
				'pos_footer_4' => 'sb_footer_4',
				'pos_footer_5' => 'sb_footer_5',
			));

		    return $sidebars;
		}

		function register_layouts( $options ) {
			$this->get_layout_archive( $options );
			$this->get_layout_404( $options );
			$this->get_layout_front_page( $options );
			$this->get_layout_page( $options );
			$this->get_layout_post( $options );
			$this->get_layout_search( $options );

			return apply_filters( 'enki_layout_register_layouts', $options );
		}

		function get_layout_page( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/page/';

			// Style 01.
		    $layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		            'pos_right',
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
	        );

		    // Assign layout to object.
			$options['page-layout']['positions'] = $this->get_positions();
			$options['page-layout']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['page-layout']['default'] = array(
        'layout_id' => 'default',
        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
		      )
		    );
		}

		function get_layout_front_page( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/front-page/';

			// Style 01.
		    $layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		            'pos_right',
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
	        );

		    // Assign layout to object.
			$options['frontpage-layout']['positions'] = $this->get_positions();
			$options['frontpage-layout']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['frontpage-layout']['default'] = array(
		        'layout_id' => 'default',
		        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
		        ),
		    );
		}

		function get_layout_archive( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/archive/';

			// Style 01.
			$layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		        	'pos_right',
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
		    );

		    // Style 02.
			$layout_02            = $layout_default;
			$layout_02['title']   = esc_html__( 'Style 02', 'enki' );
			$layout_02['preview'] = $dir . 'style-02.png';

		    // Style 02.
			$layout_03            = $layout_default;
			$layout_03['title']   = esc_html__( 'Style 03', 'enki' );
			$layout_03['preview'] = $dir . 'style-03.png';

			// Assign layout to object.
			$options['blog-layout']['positions'] = $this->get_positions();
			$options['blog-layout']['layouts']   = array(
				'default'  => $layout_default,
				'style-02' => $layout_02,
				'style-03' => $layout_03,
			);

			// Set default sidebars.
			$options['blog-layout']['default'] = array(
		        'layout_id' => 'default',
		        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
					'style-02' => $this->get_sidebars(),
					'style-03' => $this->get_sidebars(),
		        ),
		    );
		}

		function get_layout_404( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/404/';

			// Style 01.
		    $layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
	        );

		    // Assign layout to object.
			$options['error404-layout']['positions'] = $this->get_positions();
			$options['error404-layout']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['error404-layout']['default'] = array(
		        'layout_id' => 'default',
		        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
		        ),
		    );
		}

		function get_layout_post( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/page/';

			// Style 01.
		    $layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		            'pos_right',
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
	        );

		    // Assign layout to object.
			$options['post-layout']['positions'] = $this->get_positions();
			$options['post-layout']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['post-layout']['default'] = array(
		        'layout_id' => 'default',
		        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
		        ),
		    );
		}

		function get_layout_search( &$options ) {
			$dir = get_template_directory_uri() . '/images/layouts/search/';

			// Style 01.
		    $layout_default = array(
		        'title'     => esc_html__( 'Default', 'enki' ),
		        'preview'   => $dir . 'default.png',
		        'positions' => array(
		            'pos_right',
		            'pos_footer_1',
		            'pos_footer_2',
		            'pos_footer_3',
		            'pos_footer_4',
		        ),
	        );

		    // Assign layout to object.
			$options['search-layout']['positions'] = $this->get_positions();
			$options['search-layout']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['search-layout']['default'] = array(
		        'layout_id' => 'default',
		        'sidebars'  => array(
					'default'  => $this->get_sidebars(),
		        ),
		    );
		}

		function get_default_sidebars( $options = array() ) {
			$options['sb_right']      = array( 'name' => esc_html__( 'Right', 'enki' ), 'description' => '' );
			$options['sb_footer_1']   = array( 'name' => esc_html__( 'Footer 1', 'enki' ), 'description' => '' );
			$options['sb_footer_2']   = array( 'name' => esc_html__( 'Footer 2', 'enki' ), 'description' => '' );
			$options['sb_footer_3']   = array( 'name' => esc_html__( 'Footer 3', 'enki' ), 'description' => '' );
			$options['sb_footer_4']   = array( 'name' => esc_html__( 'Footer 4', 'enki' ), 'description' => '' );
			$options['sb_right_shop'] = array( 'name' => esc_html__( 'Right Shop', 'enki' ), 'description' => '' );
			return $options;
		}

		function set_default_sidebars() {
	    $args     = $this->get_default_sidebar_args();
	    $sidebars = $this->get_default_sidebars();

	    if ( ! empty( $sidebars ) ) {
        foreach ( $sidebars as $slug => $sidebar ) {
					$tmp                = $args;
					$tmp['id']          = $slug;
					$tmp['name']        = esc_html( $sidebar['name'] );
					$tmp['description'] = esc_html( $sidebar['description'] );

          register_sidebar( $tmp );
        }
	    }
		}

		function get_default_sidebar_args( $args = array() ) {
	    $args['before_widget'] = '<div id="%1$s" class="widget %2$s">';
	    $args['after_widget']  = '</div>';
	    $args['before_title']  = '<h3 class="widget-title style-05"><span>';
	    $args['after_title']   = '</span></h3>';

	    return $args;
		}

		function modify_sidebar_args_for_footer( $args ) {
			$args[0]['before_title']  = '<h3 class="widget-title style-02"><span>';
		    return $args;
		}

		function set_sidebar_by_position( $sidebar, $position ) {
			if ( isset( $this->activated_layout['sidebars'][ $position ] ) ) {
				$sidebar = $this->activated_layout['sidebars'][ $position ];
			}

			return $sidebar;
		}

		function get_main_column_classes( $sb_right ) {

			$classes  = array( 'col-xs-12' );

			if ( is_active_sidebar( $sb_right ) ) {				
				array_push( $classes, 'col-md-9', 'col-sm-7' );			
			} else {
				if ( is_archive() ) {
			    	array_push( $classes, 'col-md-8', 'col-md-push-2' );
				}
			}

			return $classes;
		}
	}

}
