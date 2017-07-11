<?php

if ( ! class_exists( 'Enki_Config' ) ) {

	class Enki_Config {

		protected static $instance = null;
		public $setting            = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			
			if ( class_exists( 'Kopa_Page_Builder' ) ) {
				Enki_Builder::get_instance();
			}

			if ( class_exists( 'WooCommerce' ) ) {
				Enki_Woo_Commerce::get_instance();
			}

			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );

			load_theme_textdomain( 'enki', get_template_directory() . '/languages' );

			$enki_layout = Enki_Layout::get_instance();

			if ( is_admin() ) {
				// Recommended plugins with TGMA
				require_once get_template_directory() . '/api/class-tgm-plugin-activation.php';
				add_action( 'tgmpa_register', array( $this, 'add_recommended_plugins' ) );

				// Init theme-options.
				Enki_Options::get_instance();

			} else {

				$sb_right    = apply_filters( 'enki_get_sidebar_by_position', 'sb_right', 'pos_right' );
				$sb_footer_1 = apply_filters( 'enki_get_sidebar_by_position', 'sb_footer_1', 'pos_footer_1' );
				$sb_footer_2 = apply_filters( 'enki_get_sidebar_by_position', 'sb_footer_2', 'pos_footer_2' );
				$sb_footer_3 = apply_filters( 'enki_get_sidebar_by_position', 'sb_footer_3', 'pos_footer_3' );
				$sb_footer_4 = apply_filters( 'enki_get_sidebar_by_position', 'sb_footer_4', 'pos_footer_4' );

				$this->setting = array(
					'blog' => array(
						'is_show_date'     => (int) get_theme_mod( 'is_show_blog_date', 1 ),
						'is_show_comment'  => (int) get_theme_mod( 'is_show_blog_comment', 1 ),
						'is_show_category' => (int) get_theme_mod( 'is_show_blog_category', 1 ),
						'is_show_author'   => (int) get_theme_mod( 'is_show_blog_author', 1 ),
						'is_show_share'    => (int) get_theme_mod( 'is_show_blog_share', 1 ),
						'is_show_like'     => (int) get_theme_mod( 'is_show_blog_like', 1 ),
					),
					'post' => array(
						'is_show_date'     => (int) get_theme_mod( 'is_show_post_date', 1 ),
						'is_show_comment'  => (int) get_theme_mod( 'is_show_post_comment', 1 ),
						'is_show_category' => (int) get_theme_mod( 'is_show_post_category', 1 ),
						'is_show_tag'      => (int) get_theme_mod( 'is_show_post_tag', 1 ),
						'is_show_author'   => (int) get_theme_mod( 'is_show_post_author', 1 ),
						'is_show_share'    => (int) get_theme_mod( 'is_show_post_share', 1 ),
						'is_show_like'     => (int) get_theme_mod( 'is_show_post_like', 1 ),
						'is_show_adjacent' => (int) get_theme_mod( 'is_show_post_adjacent', 1 ),
						'is_show_featured' => (int) get_theme_mod( 'is_show_post_featured', 1 ),
					),
					'sidebar' => array(
						'before_footer' => array(
							'is_active' => ( is_active_sidebar( $sb_footer_1 ) || is_active_sidebar( $sb_footer_2 ) || is_active_sidebar( $sb_footer_3 ) || is_active_sidebar( $sb_footer_4 ) ),
						),
					),
					'thumbnail' => array(
						'blog_default'  => 'enki-medium-01',
						'blog_style_02' => 'enki-large-01',
						'blog_style_03' => 'enki-medium-02',
					),
					'system' => array(
						'optimize_resource_level' => esc_html( get_theme_mod( 'optimize_resource_level', 'lvl_0' ) )
					)
				);

				// Image size.
				if ( ! is_active_sidebar( $sb_right ) ) {
					$this->setting['thumbnail'] = array(
						'blog_default'  => 'enki-medium-01-extra',
						'blog_style_02' => 'enki-large-01-extra',
						'blog_style_03' => 'enki-medium-02-extra',
					);
				}
			}

		}

		function after_setup_theme() {
			global $content_width;

			$enki_layout     = Enki_Layout::get_instance();
			$enki_resource   = Enki_Resource::get_instance();
			$enki_breadcrumb = Enki_Breadcrumb::get_instance();
			$enki_hook       = Enki_Hook::get_instance();
			$enki_post       = Enki_Post::get_instance();
			$enki_widget     = Enki_Widget::get_instance();
			$enki_image      = Enki_Image::get_instance();

			if ( ! $content_width ) {
				$content_width = 770;
			}

			add_editor_style( 'editor-style.css' );

			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'loop-pagination' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
			add_theme_support( 'post-formats', array( 'gallery', 'audio', 'video', 'quote' ) );
			add_theme_support( 'woocommerce' );

			register_nav_menus(array(
				'primary-nav'   => esc_html__( 'Primary Menu', 'enki' ),
				'secondary-nav' => esc_html__( 'Secondary Menu', 'enki' ),
				'mobile-nav'    => esc_html__( 'Mobile Menu', 'enki' ),
			));

			if ( is_admin() ) {

				add_action( 'admin_init', array( 'Enki_Page', 'register_metabox' ) );
				add_action( 'admin_enqueue_scripts', array( $enki_resource, 'load_admin_css' ) );

			} else {

				add_filter( 'widget_title', array( $enki_hook, 'apply_html_tag' ) );
				add_filter( 'excerpt_more', '__return_null' );
				add_filter( 'body_class', array( $enki_hook, 'body_class' ) );
				add_filter( 'post_class', array( $enki_hook, 'post_class' ) );
				add_filter( 'enki_get_sidebar_by_position', array( $enki_layout, 'set_sidebar_by_position' ), 10, 2 );

				add_action( 'template_redirect', array( $enki_layout, 'get_activated_layout' ) );

				if( 'lvl_2' === $this->setting['system']['optimize_resource_level'] ){
					add_action( 'wp_enqueue_scripts', array( $enki_resource, 'load_assets_lvl2' ) );
				}else{
					add_action( 'wp_enqueue_scripts', array( $enki_resource, 'load_assets' ) );
				}
				
				add_action( 'enki_widget_the_excerpt', array( $enki_widget, 'the_excerpt' ), 10, 2 );
				add_filter( 'enki_widget_get_query', array( $enki_widget, 'apply_argument_post__in' ), 10, 3 );
				add_filter( 'enki_get_extended_content_before_main', array( $enki_hook, 'set_extended_content_before_main' ) );
				
			}

			if ( class_exists( 'Kopa_Framework' ) ) {
				add_filter( 'kopa_admin_metabox_advanced_field', '__return_true' );
				add_filter( 'kopa_is_load_compiled_assets', '__return_true' );
				
				if ( is_admin() ) {
					add_action( 'kopa_settings_save_theme-options', array( $enki_resource, 'clear_cache' ) );
				} else {
					add_action( 'wp_enqueue_scripts', array( $enki_breadcrumb, 'customize' ), 15 );
					add_action( 'wp_enqueue_scripts', array( $enki_resource, 'customize' ), 20 );
				}
			}

			if( function_exists( 'fly_get_attachment_image_src' ) ) {
				add_filter( 'wp_get_attachment_image_src', array( $enki_image, 'get_attachment_image_src' ), 10, 3);
			}else{
				$enki_image->register_image_sizes();
			}

		}

		function add_recommended_plugins() {

			if ( function_exists( 'tgmpa' ) ) {
				$plugins = array(
					array(
							'name'     => 'Kopa Framework',
							'slug'     => 'kopatheme',
							'required' => true,
							'version'  => '1.2.7'							
					),
					array(
							'name'     => 'Kopa Page Builder',
							'slug'     => 'kopa-page-builder',
							'required' => true,
							'version'  => '2.0.4'
					),					
					array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'required' => false,
							'version'  => '2.6.4'
			    ),
					array(
							'name'     => 'Fly Dynamic Image Resizer',
							'slug'     => 'fly-dynamic-image-resizer',
							'required' => false,
							'version'  => '1.0.2'
			    )		
				);

				tgmpa( $plugins, array( 'has_notices' => true, 'is_automatic' => false ) );
			}
		}

	}

}
