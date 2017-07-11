<?php

if ( ! class_exists( 'Enki_Woo_Commerce' ) ) {

	class Enki_Woo_Commerce {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {

			// Catalog.
			add_filter( 'loop_shop_per_page', array( $this, 'set_loop_shop_per_page' ) );
			add_filter( 'loop_shop_columns', array( $this, 'set_loop_shop_columns' ) );
			add_filter( 'woocommerce_show_page_title', '__return_false' );

			// Single product.
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 51 );
			add_action( 'woocommerce_share', array( $this, 'print_sharing_buttons' ) );

			// Cart.
			add_filter( 'enki_get_sidebar_by_position', array( $this, 'remove_sidebar' ), 20, 2 );

			// Layout.
			add_filter( 'kopa_layout_manager_settings', array( $this, 'register_archive_layouts' ), 12 );
			add_filter( 'kopa_layout_manager_settings', array( $this, 'register_single_layouts' ), 12 );
			add_filter( 'kopa_custom_template_setting_id', array( $this, 'get_layout_setting_id' ) );

			// Options.
			add_filter( 'kopa_theme_options_settings', array( $this, 'init_cpanel' ), 12 );

			// Extended content.
			add_filter( 'enki_get_extended_content_before_footer', array( $this, 'set_extended_content_before_footer' ) );
			add_filter( 'enki_resource_is_load_optional', array( $this, 'enable_load_optional_resource' ) );

			if ( ! is_admin() ) {
				add_filter( 'theme_mod_breadcrumb_bg_image', array( $this, 'get_option_breadcrumb_bg_image' ) );
				add_filter( 'theme_mod_breadcrumb_bg_color', array( $this, 'get_option_breadcrumb_bg_color' ) );
			}

			// Comment form.
			add_filter( 'woocommerce_product_review_comment_form_args', array( $this, 'get_review_comment_form_args' ) );
		}

		function get_review_comment_form_args( $args ) {

			$commenter = wp_get_current_commenter();

			$args['fields']['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name *', 'enki' ) .'"  value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>';
			$args['fields']['email']  = '<p class="comment-form-email"><input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email *', 'enki' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>';

			return $args;			
		}

		function get_option_breadcrumb_bg_image( $val ) {
			if ( $this->is_shop() ) {
				$flag = (int) get_theme_mod( 'is_customize_breadcrumb_shop', 0 );
				if ( $flag ) {
					$val = absint( get_theme_mod( 'breadcrumb_bg_image_shop', 0 ) );
				}
			}
			return $val;
		}

		function get_option_breadcrumb_bg_color( $val ) {
			if ( $this->is_shop() ) {
				$flag = (int) get_theme_mod( 'is_customize_breadcrumb_shop', 0 );
				if ( $flag ) {
					$val = esc_html( get_theme_mod( 'breadcrumb_bg_color_shop', '' ) );
				}
			}
			return $val;
		}

		function set_loop_shop_per_page( $count ) {
			return (int) get_theme_mod( 'product_archive_limit', 12 );
		}

		function set_loop_shop_columns( $count ) {
			return 3;
		}

		function register_archive_layouts( $options ) {
			$enki_layout = Enki_Layout::get_instance();
			$dir = get_template_directory_uri() . '/images/layouts/product/archive/';

				$sidebars              = $enki_layout->get_sidebars();
				$sidebars['pos_right'] = 'sb_right_shop';

			// Caption
			$options[] = array(
			'title' => esc_html__( 'Product archive', 'enki' ),
			'type'  => 'title',
			'id'    => 'product-archive',
			);

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
			$options['product-archive']['id']        = 'product-archive';
			$options['product-archive']['type']      = 'layout_manager';
			$options['product-archive']['title']     = esc_html__( 'Product archive', 'enki' );
			$options['product-archive']['positions'] = $enki_layout->get_positions();
			$options['product-archive']['layouts']   = array(
			'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['product-archive']['default'] = array(
			'layout_id' => 'default',
			'sidebars'  => array(
				'default'  => $sidebars,
			),
			);

			return $options;
		}

		function register_single_layouts( $options ) {
			$enki_layout = Enki_Layout::get_instance();
			$dir = get_template_directory_uri() . '/images/layouts/product/single/';

			// Caption
			$options[] = array(
				'title' => esc_html__( 'Product single', 'enki' ),
				'type'  => 'title',
				'id'    => 'product-single',
			);

			// Style 01.
			$layout_default = array(
				'title'     => esc_html__( 'Default', 'enki' ),
				'preview'   => $dir . 'default.png',
				'positions' => array(
					'pos_footer_1',
					'pos_footer_2',
					'pos_footer_3',
					'pos_footer_4',
				)
			);

			// Assign layout to object.
			$options['product-single']['id']        = 'product-single';
			$options['product-single']['type']      = 'layout_manager';
			$options['product-single']['title']     = esc_html__( 'Product single', 'enki' );
			$options['product-single']['positions'] = $enki_layout->get_positions();
			$options['product-single']['layouts']   = array(
				'default'  => $layout_default,
			);

			// Set default sidebars.
			$options['product-single']['default'] = array(
				'layout_id' => 'default',
				'sidebars'  => array(
					'default'  => $enki_layout->get_sidebars(),
				)
			);

			return $options;
		}

		function get_layout_setting_id( $setting_id ) {
			if ( is_singular( 'product' ) ) {
				$setting_id = 'product-single';
			} elseif ( $this->is_archive() ) {
				$setting_id = 'product-archive';
			}

			return $setting_id;
		}

		function init_cpanel( $options ) {
			$options[] = array(
			'title' => esc_html__( 'Product', 'enki' ),
			'type'  => 'title',
			'id'    => 'product'
			);

			// Archive.
			$options[] = array(
			'title' => esc_html__( 'Archive', 'enki' ),
			'desc' => esc_html__( 'Custom information for archive page.', 'enki' ),
			'type'  => 'groupstart',
			);

			// Data.
			$options[] = array( 'title' => esc_html__( 'Data', 'enki' ), 'type' => 'groupstart' );
			$options[] = array(
				'type'    => 'number',
				'id'      => 'product_archive_limit',
				'desc'    => esc_html__( 'Product per page', 'enki' ),
				'default' => 12,
			);
			$options[] = array( 'type' => 'groupend' );

			$options[] = array( 'title' => esc_html__( 'Before footer', 'enki' ), 'type' => 'groupstart' );

			$options[] = array(
				'type'      => 'chosen_singular',
				'post_type' => 'page',
				'id'        => 'product_archive_extended_content_id',
				'data'      => array(
					'placeholder' => esc_html__( 'Select a page', 'enki' ),
				),
				'desc'     => esc_html__( 'Append content from static page ( which was built by PageBuilder )', 'enki' ),
			);

			$options[] = array( 'type' => 'groupend' );

			// Begin: Breadcrumb
			$options[] = array( 'title' => esc_html__( 'Breadcrumb', 'enki' ), 'type' => 'groupstart' );

			$options[] = array(
				'label'   => esc_html__( 'Is override the global configuration?', 'enki' ),
				'type'    => 'checkbox',
				'id'      => 'is_customize_breadcrumb_shop',
				'default' => 0,
				'folds'   => 1
			);

			$options[] = array(
				'type'    => 'image',
				'id'      => 'breadcrumb_bg_image_shop',
				'desc'    => esc_html__( 'Background image.', 'enki' ),
				'fold'    => 'is_customize_breadcrumb_shop'
			);

			$options[] = array(
				'type'    => 'color',
				'id'      => 'breadcrumb_bg_color_shop',
				'desc'    => esc_html__( 'Background color.', 'enki' ),
				'fold'    => 'is_customize_breadcrumb_shop'
			);

			$options[] = array( 'type' => 'groupend' );

			$options[] = array( 'type' => 'groupend' );

			// Single.
			return $options;
		}

		function set_extended_content_before_footer( $page_id ) {
			if ( $this->is_archive() ) {
				$page_id = (int) get_theme_mod( 'product_archive_extended_content_id', 0 );
			}
			return $page_id;
		}

		function is_archive() {
			return ( is_post_type_archive( 'product' ) || is_tax( 'product_tag' ) || is_tax( 'product_cat' ) );
		}

		function is_shop() {
			return ( $this->is_archive() || is_cart() || is_checkout() || is_account_page() || is_singular( 'product' ) );
		}

		function print_sharing_buttons() {
			$before = '<div class="kopa-social-links style-11">';
			$before .= '<span>'. esc_html__( 'Share:', 'enki' ) .'</span>';

			$args = array(
			'before' => $before,
			'after'  => '</div>',
			);
			do_action( 'enki_blog_share_buttons', 'default', $args );
		}

		function remove_sidebar( $sidebar, $position ) {
			if ( ( is_cart() || is_checkout() || is_account_page() ) && ( 'pos_right' == $position ) ) {
				$sidebar = null;
			}

			return $sidebar;
		}

		function enable_load_optional_resource( $is_load ) {
			if ( $this->is_archive() ) {
				$page_id = (int) get_theme_mod( 'product_archive_extended_content_id', 0 );
				if ( $page_id ) {
					$is_load = true;
				}
			}

			return $is_load;
		}
	}

}


