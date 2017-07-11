<?php

if ( ! class_exists( 'Enki_Resource' ) ) {

	class Enki_Resource {

		protected static $instance = null;
		public $cache_key = 'enki_resource_cache';

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function clear_cache() {
			delete_transient( $this->cache_key );
		}

		function load_admin_css() {
			$dir = get_template_directory_uri() . '/inc/assets/css';
			wp_enqueue_style( 'enki-style', $dir . '/admin.style.css', array(), null );
		}

		function load_assets() {
			$this->load_css();
			$this->load_js();
		}

		function load_assets_lvl2() {
			$dir = get_template_directory_uri() . '/assets/';

			// CSS.
			$this->get_google_fonts();
			wp_enqueue_style( 'enki-global', $dir . 'enki.min.css', array(), null );
			wp_enqueue_style( 'enki-style', get_stylesheet_uri(), array(), null );
			
			// JS.			
			wp_enqueue_script( 'enki-global', $dir . 'enki.global.min.js', array( 'jquery' ), null, true );			

			$page_has_been_builder = $this->is_load_optional();
			if ( $page_has_been_builder ) {
				$this->get_google_maps( $page_has_been_builder );
				wp_enqueue_script( 'enki-optional', $dir . 'enki.optional.min.js', array( 'jquery' ), null, true );
			}

			$this->get_required_scripts();
		}

		function load_css() {
			$dir         = get_template_directory_uri() . '/css/';
			$enki_config = Enki_Config::get_instance();			

			if( 'lvl_0' === $enki_config->setting['system']['optimize_resource_level'] ) {
				$ext = '.css';
			}else{
				$ext = '.min.css';				
			}

			wp_enqueue_style( 'bootstrap', $dir . 'bootstrap' . $ext, array(), null );
			wp_enqueue_style( 'font-awesome', $dir . 'font-awesome' . $ext, array(), null );
			wp_enqueue_style( 'font-themify', $dir . 'themify-icons' . $ext, array(), null );
			wp_enqueue_style( 'font-linea-arrows', $dir . 'linea-arrows' . $ext, array(), null );
			wp_enqueue_style( 'animate', $dir . 'animate' . $ext, array(), null );			
			wp_enqueue_style( 'jquery-m-custom-scrollbar', $dir . 'jquery-mcustomscrollbar' . $ext, array(), null );			
			wp_enqueue_style( 'jquery-owl-carousel', $dir . 'owl-carousel' . $ext, array(), null );
			wp_enqueue_style( 'jquery-owl-theme', $dir . 'owl-theme' . $ext, array(), null );
			wp_enqueue_style( 'jquery-owl-transitions', $dir . 'owl-transitions' . $ext, array(), null );
			wp_enqueue_style( 'jquery-pro-bars', $dir . 'pro-bars' . $ext, array(), null );
			wp_enqueue_style( 'jquery-superfish', $dir . 'superfish' . $ext, array(), null );
			wp_enqueue_style( 'jquery-megafish', $dir . 'megafish' . $ext, array(), null );			
			wp_enqueue_style( 'enki-style', get_stylesheet_uri(), array(), null );

			$this->get_google_fonts();
		}

		function load_js() {
			$dir         = get_template_directory_uri() .'/js/';			
			$enki_config = Enki_Config::get_instance();

			if( 'lvl_0' === $enki_config->setting['system']['optimize_resource_level'] ) {
				$ext = '.js';
			}else{
				$ext = '.min.js';				
			}

			// Global.						
			wp_enqueue_script( 'bootstrap', $dir . 'bootstrap' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-fitvids', $dir . 'jquery.fitvids' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-match-height', $dir . 'jquery.match-height' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-navgoco', $dir . 'jquery.navgoco' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-superfish', $dir . 'superfish' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-owl-carousel', $dir . 'owl.carousel' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-imagesloaded', $dir . 'imagesloaded' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-masonry', $dir . 'masonry' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-m-custom-scrollbar', $dir . 'jquery.m-custom-scrollbar' . $ext, array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-validate', $dir . 'jquery.validate' . $ext, array( 'jquery' ), null, true );
			
			// Optional.
			$page_has_been_builder = $this->is_load_optional();
			if ( $page_has_been_builder ) {
				$this->get_google_maps( $page_has_been_builder );
				
				wp_enqueue_script( 'jquery-countdown', $dir . 'countdown' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-counterup', $dir . 'jquery.counterup' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-waypoints', $dir . 'waypoints' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-mousewheel', $dir . 'jquery.mousewheel' . $ext, array( 'jquery' ), null, true );				
				wp_enqueue_script( 'jquery-pro-bars', $dir . 'pro-bars' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-appear', $dir . 'jquery.appear' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-easing', $dir . 'jquery.easing' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-wow', $dir . 'jquery.wow' . $ext, array( 'jquery' ), null, true );
				wp_enqueue_script( 'jquery-responsive-tabs', $dir . 'jquery.bootstrap-responsive-tabs' . $ext, array( 'jquery' ), null, true );
			}

			// Init.
			$this->get_required_scripts();
		}

		function get_required_scripts() {
			$dir         = get_template_directory_uri() .'/js/';
			$enki_config = Enki_Config::get_instance();

			if( 'lvl_0' !== $enki_config->setting['system']['optimize_resource_level'] ) {				
				$ext = '.min.js';				
			}else{
				$ext = '.js';
			}					

			wp_enqueue_script( 'jquery-form' );
			
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script( 'enki-custom', $dir . 'custom' . $ext, array( 'jquery' ), null, true );
			wp_localize_script( 'enki-custom', 'enki', $this->get_localize_script() );
		}

		function get_google_fonts() {
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'enki' ) ) {
				$font_url = add_query_arg( 'family', urlencode( 'Josefin Sans:400,100,300,600,700|Poppins:400,500,600,300,700|Droid Serif:400,400italic,700,700italic' ), '//fonts.googleapis.com/css' );
				wp_enqueue_style( 'enki-default-fonts', $font_url, array(), null );
			}
		}

		function get_google_maps( $page_id = 0 ) {
			
			if( $page_id && class_exists( 'Kopa_Page_Builder' ) ) {
				
				$is_exist_maps = Kopa_Page_Builder::is_exist_widget( $page_id, 'ET_Widget_Map_01' );
				
				if( $is_exist_maps ) {
					wp_enqueue_script( 'enki-google-map-api', '//maps.google.com/maps/api/js?key=AIzaSyDvRPzjeGKy7h9d0JfXcAxYtxQlSnD6oM8&libraries=places', array( 'jquery' ), null, true );
					wp_enqueue_script( 'enki-google-map', get_template_directory_uri() .'/js/gmaps.min.js', array( 'jquery' ), null, true );
				}

			}
		}

		function get_localize_script() {
			$is_page_cached = 0;

			if( is_page() && class_exists( 'Kopa_Page_Builder' ) ) {
				global $post;
				
				$obj_builder_assets = Enki_Builder_Assets::get_instance();
				$cache              = $obj_builder_assets->get_cache( $post->ID );
				if( !empty( $cache ) ) {
					$is_page_cached = 1;
				}				
			}

			return array(
				'ajax' => array(
					'url' => admin_url( 'admin-ajax.php' ),
					'nonces' => array(
						'save_builder_styling' => wp_create_nonce( 'enki_save_builder_styling' )
					),
					'post_id' => is_page() ? get_queried_object_id() : 0
				),
				'translate' => array(
					'send'     => esc_html__( 'Send', 'enki' ),
					'sending'  => esc_html__( 'Sending..', 'enki' ),
					'sent'     => esc_html__( 'Sent', 'enki' ),
					'validate' => array(
						'global' => array(
							'minlength' => esc_html__( 'At least {0} characters required.', 'enki' ),
						),
						'name' => array(						
							'required' => esc_html__( 'Please enter your name.', 'enki' ),
						),
						'subject' => array(
							'required' => esc_html__( 'Please enter subject.', 'enki' ),
						),
						'email' => array(
							'required' => esc_html__( 'Please enter your email.', 'enki' ),
							'email'    => esc_html__( 'Please enter your email.', 'enki' ),
						),
						'message' => array(
							'required' => esc_html__( 'Please enter your message.', 'enki' ),
						),
					),
				),
				'addon' => array(
					'is_use_builder' => class_exists( 'Kopa_Page_Builder' ) ? 1 : 0
				),
				'cache' => array(
					'is_page_cached' => $is_page_cached
				)
			);
		}

		function customize() {
			$enki_utility = Enki_Utility::get_instance();
			$css          = get_transient( $this->cache_key );

			if ( empty( $css ) ) {
				// Fonts.
				$fonts = $enki_utility->get_site_elements();
				if ( $fonts ) {

					$google_font_in_use = array();
					$custom_font_in_use = array();
					$google_fonts       = kopa_google_font_options();
					$custom_fonts       = (array) get_theme_mod( 'custom_fonts' );

					foreach ( $fonts as $key => $font ) {
						$is_enable = (int) get_theme_mod( "is_enable_custom_font_{$key}", 0 );
				    if ( $is_enable ) {

							$tmp     = get_theme_mod( "{$key}_font" );
							$tmp_css = array();

	            if ( ! empty( $tmp['style'] ) ) {
                switch ( $tmp['style'] ) {
                  case '300italic':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 300 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'italic' );
                    break;
                  case 'regular':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 400 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'normal' );
                    break;
                  case 'italic':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 400 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'italic' );
                    break;
                  case '600italic':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 600 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'italic' );
                    break;
                  case '700italic':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 700 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'italic' );
                    break;
                  case '800italic':
                    $tmp_css[] = sprintf( 'font-weight: %s;', 800 );
                    $tmp_css[] = sprintf( 'font-style: %s;', 'italic' );
                    break;
                  default:
                    $tmp_css[] = sprintf( 'font-weight: %s;', $tmp['style'] );
                    break;
                }
	            }

	            if ( ! empty( $tmp['size'] ) && (int) $tmp['size'] > 0 ) {
	                $tmp_css[] = sprintf( 'font-size: %spx;', $tmp['size'] );
	            }

	            if ( ! empty( $tmp['color'] ) ) {
	                $tmp_css[] = sprintf( 'color: %s;', $tmp['color'] );
	            }

	            if ( ! empty( $tmp['family'] ) &&  ( 'none' !== $tmp['family'] ) ) {
	                $tmp_css[] = sprintf( 'font-family: %s;', $tmp['family'] );

	                if ( isset( $google_fonts[ $tmp['family'] ] ) ) {
	                    if ( ! isset( $google_font_in_use[ $tmp['family'] ] ) ) {
	                        $google_font_in_use[ $tmp['family'] ] = array();
	                    }
	                    if ( ! empty( $tmp['style'] ) ) {
	                        $tmp['style'] = ('regular' == $tmp['style']) ? 400 : $tmp['style'];
	                        array_push( $google_font_in_use[ $tmp['family'] ], $tmp['style'] );
	                    }
	                } else {
	                    foreach ( $custom_fonts as $custom_font ) {
	                        if ( $tmp['family'] == $custom_font['name'] ) {

	                            if ( ! isset( $custom_font_in_use[ $tmp['family'] ] ) ) {
	                                $custom_font_in_use[ $tmp['family'] ] = $custom_font;
	                            }
	                        }
	                    }
	                }
	            }

	            if ( ! empty( $tmp_css ) ) {
	                $css .= sprintf( '%s { %s }', $font['element'], implode( ' ', $tmp_css ) );
	            }
						}
			    }

			    if ( ! empty( $google_font_in_use ) ) {
		        foreach ( $google_font_in_use as $font_family => $font_style ) {
	            $font_family = str_replace( ' ', '+', $font_family );

	            $url = sprintf( '//fonts.googleapis.com/css?family=%s', $font_family );
	            if ( ! empty( $font_style ) ) {
	                $url .= sprintf( ':%s', implode( ',', $font_style ) );
	            }
	            wp_enqueue_style( 'enki-' . strtolower( $font_family ) , $url, array(), null );
		        }
			    }
				}

				// Color.
				$is_enable_custom_color = (int) get_theme_mod( 'is_enable_custom_color', 0 );
				if ( $is_enable_custom_color ) {
					$css .= sprintf( $this->get_color_pattern(), esc_html( get_theme_mod( 'primary_color' ) ) );
				}

				// Custom CSS.
				$viewports = $enki_utility->get_viewports();
				if ( $viewports ) {
					foreach ( $viewports as $slug => $viewport ) {
						$tmp_css = wp_kses_post( get_theme_mod( sprintf( 'css_for_%s', $slug ), '' ) );

						if ( $tmp_css ) {
							$css .= sprintf( $viewport['media'], $tmp_css );
						}
					}
				}

				set_transient( $this->cache_key, $css, 60 * 60 * 24 * 365 * 10 );
			}

			if ( ! empty( $css ) ) {
		    wp_add_inline_style( 'enki-style', $css );
		  }
		}

		function get_color_pattern() {
			$css = '
        a:hover, a:focus, a.active, .text-hover, .owl-btn-03 .owl-controls .owl-buttons div:hover:before, .owl-btn-03 .owl-controls .owl-buttons div:hover:after, .kopa-social-links.style-08 ul li a:hover, .kopa-social-links.style-11 ul li a:hover, .white-text-style a:hover, .sf-mega a:hover, .slide-area a:hover, .white-text-style a:hover span, .sf-mega a:hover span, .slide-area a:hover span, .white-text-style .kopa-copyright a:hover, .sf-mega .kopa-copyright a:hover, .slide-area .kopa-copyright a:hover, .white-text-style .widget_categories > ul > li a:hover, .sf-mega .widget_categories > ul > li a:hover, .slide-area .widget_categories > ul > li a:hover,
        .white-text-style .widget_categories ul.menu > li a:hover,
        .sf-mega .widget_categories ul.menu > li a:hover,
        .slide-area .widget_categories ul.menu > li a:hover,
        .white-text-style .widget_categories .pd-20 > ul > li a:hover,
        .sf-mega .widget_categories .pd-20 > ul > li a:hover,
        .slide-area .widget_categories .pd-20 > ul > li a:hover,
        .white-text-style .widget_categories .pd-20 ul.menu > li a:hover,
        .sf-mega .widget_categories .pd-20 ul.menu > li a:hover,
        .slide-area .widget_categories .pd-20 ul.menu > li a:hover,
        .white-text-style .widget_recent_entries > ul > li a:hover,
        .sf-mega .widget_recent_entries > ul > li a:hover,
        .slide-area .widget_recent_entries > ul > li a:hover,
        .white-text-style .widget_recent_entries ul.menu > li a:hover,
        .sf-mega .widget_recent_entries ul.menu > li a:hover,
        .slide-area .widget_recent_entries ul.menu > li a:hover,
        .white-text-style .widget_archive > ul > li a:hover,
        .sf-mega .widget_archive > ul > li a:hover,
        .slide-area .widget_archive > ul > li a:hover,
        .white-text-style .widget_archive ul.menu > li a:hover,
        .sf-mega .widget_archive ul.menu > li a:hover,
        .slide-area .widget_archive ul.menu > li a:hover,
        .white-text-style .widget_meta > ul > li a:hover,
        .sf-mega .widget_meta > ul > li a:hover,
        .slide-area .widget_meta > ul > li a:hover,
        .white-text-style .widget_meta ul.menu > li a:hover,
        .sf-mega .widget_meta ul.menu > li a:hover,
        .slide-area .widget_meta ul.menu > li a:hover,
        .white-text-style .widget_nav_menu > ul > li a:hover,
        .sf-mega .widget_nav_menu > ul > li a:hover,
        .slide-area .widget_nav_menu > ul > li a:hover,
        .white-text-style .widget_nav_menu ul.menu > li a:hover,
        .sf-mega .widget_nav_menu ul.menu > li a:hover,
        .slide-area .widget_nav_menu ul.menu > li a:hover,
        .white-text-style .widget_pages > ul > li a:hover,
        .sf-mega .widget_pages > ul > li a:hover,
        .slide-area .widget_pages > ul > li a:hover,
        .white-text-style .widget_pages ul.menu > li a:hover,
        .sf-mega .widget_pages ul.menu > li a:hover,
        .slide-area .widget_pages ul.menu > li a:hover,
        .white-text-style .widget_recent_comments > ul > li a:hover,
        .sf-mega .widget_recent_comments > ul > li a:hover,
        .slide-area .widget_recent_comments > ul > li a:hover,
        .white-text-style .widget_recent_comments ul.menu > li a:hover,
        .sf-mega .widget_recent_comments ul.menu > li a:hover,
        .slide-area .widget_recent_comments ul.menu > li a:hover,
        .white-text-style .widget_rss > ul > li a:hover,
        .sf-mega .widget_rss > ul > li a:hover,
        .slide-area .widget_rss > ul > li a:hover,
        .white-text-style .widget_rss ul.menu > li a:hover,
        .sf-mega .widget_rss ul.menu > li a:hover,
        .slide-area .widget_rss ul.menu > li a:hover, .dark-text-style h1 a:hover, .dark-text-style h2 a:hover, .dark-text-style h3 a:hover, .dark-text-style h4 a:hover, .dark-text-style h5 a:hover, .dark-text-style h6 a:hover, .dark-text-style .h1 a:hover, .dark-text-style .h2 a:hover, .dark-text-style .h3 a:hover, .dark-text-style .h4 a:hover, .dark-text-style .h5 a:hover, .dark-text-style .h6 a:hover, .dark-text-style a:hover, .dark-text-style a:hover span, .more-link, .more-link.style-01 span, .more-link.style-02:hover, .more-link.style-04:hover, .more-link.style-05:hover, .entry-meta > span a:hover,
        .entry-meta > p a:hover, .entry-meta > a:hover span, .entry-meta.style-01 > span i,
        .entry-meta.style-01 > p i,
        .entry-meta.style-01 .entry-share i, .entry-meta.style-01 > span a:hover,
        .entry-meta.style-01 > p a:hover,
        .entry-meta.style-01 .entry-share a:hover, .entry-meta.style-02 > span,
        .entry-meta.style-02 > p,
        .entry-meta.style-02 .entry-share, .entry-meta.style-04 > span a:hover,
        .entry-meta.style-04 > p a:hover, .entry-meta.style-05 > span i,
        .entry-meta.style-05 > p i, .entry-meta.style-05 > span a:hover,
        .entry-meta.style-05 > p a:hover, .meta-item i[class*="ti-"], .entry-share > i, .kopa-rating li, .widget-title.style-08, .widget_categories > ul > li a:hover,
        .widget_categories ul.menu > li a:hover,
        .widget_categories .pd-20 > ul > li a:hover,
        .widget_categories .pd-20 ul.menu > li a:hover,
        .widget_recent_entries > ul > li a:hover,
        .widget_recent_entries ul.menu > li a:hover,
        .widget_archive > ul > li a:hover,
        .widget_archive ul.menu > li a:hover,
        .widget_meta > ul > li a:hover,
        .widget_meta ul.menu > li a:hover,
        .widget_nav_menu > ul > li a:hover,
        .widget_nav_menu ul.menu > li a:hover,
        .widget_pages > ul > li a:hover,
        .widget_pages ul.menu > li a:hover,
        .widget_recent_comments > ul > li a:hover,
        .widget_recent_comments ul.menu > li a:hover,
        .widget_rss > ul > li a:hover,
        .widget_rss ul.menu > li a:hover, .widget_rss > ul > li a, .post-date, .tagcloud a:hover, .widget_calendar thead th, .widget_calendar tbody a, .widget_search .search-form .search-submit:hover, .enki-accordion.style-01 .acc-title.active h5, .enki-accordion.style-02 .acc-title h5 i, .enki-blockquote.style-02:before, .enki-blockquote.style-02 h6, .enki-blockquote.style-03 h3, .enki-blockquote.style-04 h3, .enki-blockquote.style-07:before, .enki-blockquote.style-07:after, .enki-blockquote.style-08:before, .enki-blockquote.style-08 i, .enki-blockquote.style-09:after, .enki-blockquote.style-09 i, .enki-blockquote.style-10 h6, .enki-blockquote.style-11:before, .enki-blockquote.style-11 h6, .enki-list.style-01 li a:hover, .enki-list.style-02 li a:hover, .enki-list.style-02 li.has-children a:hover, .enki-list.style-03 a:hover, .enki-list.style-04 li a:hover, .enki-list.style-05 li:before, .enki-list.style-05 li a:hover, .enki-list.style-06 li:before, .enki-list.style-06 li a:hover, .enki-list.style-07 li:before, .enki-list.style-07 li a:hover, .enki-pricing-table.style-01 .enki-pricing-table-list .meta-price-month .meta-price h4, .enki-pricing-table.style-02 .enki-pricing-table-list.active ul li .pricing-button, .enki-pricing-table.style-03 .enki-pricing-table-list.active ul li .pricing-button, .enki-pricing-table.style-04 .enki-pricing-table-list.active .pricing-header .pricing-description, .enki-pricing-table.style-04 .enki-pricing-table-list .meta-price-month .meta-price h4, .enki-pricing-table.style-05 .enki-pricing-table-list.active .pricing-footer .pricing-button, .enki-pricing-table.style-05 .enki-pricing-table-list .pricing-footer .pricing-button, .enki-loadmore.style-01:hover .fa, .enki-loadmore.style-01:hover span, .enki-pagination.style-01 .pagination .nav-links a:hover, .enki-pagination.style-01 .pagination .nav-links .current, button.enki-btn.enki-color-hover:hover, a.enki-btn.enki-color-hover:hover, button.enki-btn.enki-color-hover i, a.enki-btn.enki-color-hover i, button.enki-btn.enki-color-hover-light, a.enki-btn.enki-color-hover-light, .enki-module-icon.style-01 .widget-content li a:hover, .enki-drop-cap.style-05, .main-menu > li:hover > a, .main-menu > li.current-menu-item > a, .main-menu > li.current-menu-parent > a, .main-menu > li ul.sub-menu li a:hover, .main-menu > li ul li a:hover, .main-menu > li ul.sub-menu li.current-menu-item > a, .main-menu > li ul li.current-menu-item > a, .main-menu.style-01 > li:hover .order-menu-number, .main-menu.style-02 > li:hover .order-menu-number, .main-menu.style-03 > li:hover .order-menu-number, .main-menu.style-04 > li:hover .order-menu-number, .main-menu.style-05 > li:hover .order-menu-number, .main-menu.style-06 > li:hover .order-menu-number, .main-menu.style-01 > li.current-menu-item .order-menu-number, .main-menu.style-02 > li.current-menu-item .order-menu-number, .main-menu.style-03 > li.current-menu-item .order-menu-number, .main-menu.style-04 > li.current-menu-item .order-menu-number, .main-menu.style-05 > li.current-menu-item .order-menu-number, .main-menu.style-06 > li.current-menu-item .order-menu-number, .main-menu.style-01 > li.current-menu-parent .order-menu-number, .main-menu.style-02 > li.current-menu-parent .order-menu-number, .main-menu.style-03 > li.current-menu-parent .order-menu-number, .main-menu.style-04 > li.current-menu-parent .order-menu-number, .main-menu.style-05 > li.current-menu-parent .order-menu-number, .main-menu.style-06 > li.current-menu-parent .order-menu-number, .main-menu.style-02 > li:hover > a, .main-menu.style-02 > li.current-menu-item > a, .main-menu.style-02 > li.current-menu-parent > a, .main-menu.style-03 > li:hover > a, .main-menu.style-03 > li.current-menu-item > a, .main-menu.style-03 > li.current-menu-parent > a, .main-menu.style-04 > li:hover > a, .main-menu.style-04 > li.current-menu-item > a, .main-menu.style-04 > li.current-menu-parent > a, .sf-mega .sf-mega-section ul li.current-menu-item > a, .sf-mega .sf-mega-section ul.sub-menu li.current-menu-item > a, .kopa-search-box .search-form .search-submit:hover, .kopa-search-box-1 .search-form .search-submit:hover, .slide-menu li a:hover, .mobile-menu li a:hover, .slide-menu li a:hover span:hover, .mobile-menu li a:hover span:hover, .slide-menu li a > span:hover, .mobile-menu li a > span:hover, .slide-menu li.current-menu-item > a, .mobile-menu li.current-menu-item > a, .slide-menu li ul li a:hover, .mobile-menu li ul li a:hover, .slide-menu li ul.sub-menu li a:hover, .mobile-menu li ul.sub-menu li a:hover, .slide-menu li ul li.current-menu-item > a, .mobile-menu li ul li.current-menu-item > a, .slide-menu li ul.sub-menu li.current-menu-item > a, .mobile-menu li ul.sub-menu li.current-menu-item > a, .search-hide .search-form .search-submit:hover, .search-hide .search-close:hover, .kopa-header-search .search-show > span:hover, .scroll-down-btn:hover, .kopa-page-header-10 .kopa-header-top a:hover, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-1 .enki-btn:hover, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-1 .enki-btn:hover i, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-2 .enki-btn, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-2 .enki-btn i, .enki-module-slider.style-04 .slider-pro .sp-slide .sp-txt-5, .enki-module-slider.style-06 .sp-previous-arrow:before, .enki-module-slider.style-06 .sp-next-arrow:before, .enki-module-slider.style-01 .entry-item .entry-content .sp-link-1 a:hover, .enki-module-slider.style-02 .entry-item .entry-content .sp-link-1 a:hover, .enki-module-service.style-02 .widget-content div[class*="col-"]:hover h5, .enki-module-service.style-02 .widget-content .fa, .enki-module-intro.style-11 .enki-btn-video, .enki-module-portfolio.style-03 .widget-header-wrapper .filters-options li:hover, .enki-module-portfolio.style-03 .widget-header-wrapper .filters-options li.active, .enki-module-portfolio.style-03 .widget-content .entry-item .entry-content .entry-title a:hover, .enki-module-portfolio.style-03 .widget-content .entry-item .entry-content p a:hover, .enki-module-portfolio.style-08 .entry-item .entry-thumb .enki-icon-play:before, .enki-module-portfolio.style-05 .entry-item .entry-content p a:hover, .enki-module-portfolio.style-07 .widget-content .entry-item .entry-content .entry-title a:hover, .enki-single-portfolio.style-3 .widget-content .entry-item .entry-content .entry-title a:hover, .enki-single-portfolio.style-3 .widget-content .entry-item .entry-content p a:hover, .enki-module-testimonial .entry-item .entry-content span i, .enki-module-testimonial .owl-theme .owl-controls .owl-buttons div.owl-prev:hover, .enki-module-testimonial .owl-theme .owl-controls .owl-buttons div.owl-next:hover, .enki-module-testimonial.style-02 .entry-item .entry-content i, .enki-module-testimonial.style-03 .sync2 .owl-controls .owl-buttons div.owl-prev:hover, .enki-module-testimonial.style-03 .sync2 .owl-controls .owl-buttons div.owl-next:hover, .enki-module-testimonial.style-03 .entry-item .entry-content span i, .enki-module-testimonial.style-03 .entry-item .entry-content .enki-icon, .enki-module-countup.style-01 .widget-content li .counter, .enki-module-countup.style-04 .widget-content li .enki-custom-left i, .enki-modules-free-trial.style-01 .enki-modules-free-trial-right span, .enki-modules-free-trial.style-01 .enki-modules-free-trial-right .fa, .enki-module-contact ul li i, .enki-module-contact ul li a:hover, .enki-module-contact-form .widget-content label.error, .enki-module-contact-address .entry-item .entry-thumb i, .enki-module-contact-address .entry-item .entry-content a:hover, .scrollup:hover, .kopa-copyright a:hover, .footer-menu li > a:hover, .enki-module-client-04 .widget-content .entry-item .entry-thumb i, .enki-module-team.style-04 .entry-item .entry-content .enki-author, .enki-module-team.style-03 .entry-item .entry-content .enki-author:hover, .enki-module-ads.style-02 h5 a:hover, .enki-module-form.style-02 .widget-content .entry-item .entry-thumb i, .enki-module-form.style-02 .widget-content .entry-item .entry-content a:hover, .enki-module-form.style-02 .widget-content form label.error, .enki-module-form.style-03 .widget-content label.error, .enki-module-breacrumb .breadcrumb-nav a:hover, .entry-title .sticky-post-icon i, .enki-module-carousel.style-02 .enki-header .enki-owl-prev:hover, .enki-module-carousel.style-02 .enki-header .enki-owl-next:hover, .single-post-author .author-content-wrap header h6 a, #comments .comments-list .comment .comment-button a:hover,
        #comments .comments-list > li .comment-button a:hover, .single-other-post .entry-item > a > div:hover .entry-title, .enki-back-home:hover a, .woocommerce ul.products li.product a h3:hover, .woocommerce ul.products li.product a .price .amount, .woocommerce ul.products li.product .onsale, .woocommerce .enki-pagination .navigation.pagination .nav-links .page-numbers:hover, .woocommerce .enki-pagination .navigation.pagination .nav-links .page-numbers.prev:hover, .woocommerce .enki-pagination .navigation.pagination .nav-links .page-numbers.next:hover, .widget_products ul.product_list_widget .amount, .enki-module-shop-list .entry-item .entry-content .enki-price, .enki-module-shop-list.style-02 .entry-item .entry-content .enki-price-sale {
          color: %1$s;
        }
        .owl-theme .owl-controls .owl-buttons div:hover, .owl-theme .owl-controls .owl-pagination .owl-page.active span, .owl-theme .owl-controls .owl-pagination .owl-page:hover span, .owl-btn-01 .owl-controls .owl-pagination .owl-page.active span:before, .owl-btn-01 .owl-controls .owl-pagination .owl-page:hover span:before, .owl-btn-02 .owl-controls .owl-pagination .owl-page.active span:before, .owl-btn-02 .owl-controls .owl-pagination .owl-page:hover span:before, .kopa-social-links.style-01 ul:before, .kopa-social-links.style-04 ul li a:after, .kopa-social-links.style-10 ul li a:after, .thumb-icon, .more-link.style-06:hover, .more-link.style-07, .meta-item:before, .entry-date-1, .enki-accordion.style-02 .acc-title.active, .enki-blockquote.style-01, .enki-list.style-08 li:before, .enki-pricing-table.style-01 .enki-pricing-table-list.active, .enki-pricing-table.style-02 .enki-pricing-table-list.active .pricing-header .pricing-title, .enki-pricing-table.style-02 .enki-pricing-table-list.active .pricing-header .meta-price-month, .enki-pricing-table.style-03 .enki-pricing-table-list.active .pricing-header .pricing-title, .enki-pricing-table.style-03 .enki-pricing-table-list.active .pricing-header .meta-price-month, .enki-pricing-table.style-04 .enki-pricing-table-list .pricing-button, .enki-pricing-table.style-05 .enki-pricing-table-list.active .pricing-footer .pricing-button, .enki-progress.style-02 .enki-progress-item .pro-bar, .enki-progress.style-04 .enki-progress-item .pro-bar, .enki-tab.style-01 .accordion-link.nav-active, .enki-tab.style-01 .accordion-link.active, .enki-tab.style-02 .nav-tabs > li > a:before, .enki-tab.style-03 .accordion-link.nav-active, .enki-tab.style-03 .accordion-link.active, .enki-tab.style-04 .nav-tabs > li > a:before, .enki-tab.style-04 .accordion-link.nav-active, .enki-tab.style-04 .accordion-link.active, .enki-tab.style-05 .accordion-link.nav-active, .enki-tab.style-05 .accordion-link.active, .enki-tab.style-06 .nav-tabs > li > a:before, .enki-tab.style-06 .accordion-link.nav-active, .enki-tab.style-06 .accordion-link.active, .enki-tab.style-07 .nav-tabs > li.active > a, .enki-tab.style-07 .nav-tabs > li.active > a:focus, .enki-tab.style-07 .nav-tabs > li.active > a:hover, .enki-tab.style-07 .accordion-link.nav-active, .enki-tab.style-07 .accordion-link.active, .enki-tab.style-08 .nav-tabs > li > a:before, .enki-tab.style-08 .accordion-link.nav-active, .enki-tab.style-08 .accordion-link.active, .enki-view-all.style-01 a:hover .enki-icon-plus, button.enki-btn.enki-color-hover, a.enki-btn.enki-color-hover, button.enki-btn.enki-color-hover-light:before, a.enki-btn.enki-color-hover-light:before, .enki-module-icon.style-02 .widget-content li a:hover, .enki-module-icon.style-05 .widget-content li a.enki-custom-color-02, .enki-module-table.style-02 .widget-content .enki-custom-col ul li:first-of-type, .enki-hilightext-01, .enki-drop-cap.style-06, .hb-menu-icon.style-02 span, .hb-menu-icon.style-04 span, .hb-menu-icon.style-06 span, .main-menu.style-04 > li:hover:before, .main-menu.style-04 > li.current-menu-item:before, .main-menu.style-04 > li.current-menu-parent:before, .kopa-page-header-2 .kopa-header-top, .kopa-page-header-5 .kopa-header-top, .kopa-page-header-7 .hb-menu-icon.style-02 span, .kopa-page-header-8 .hb-menu-icon.style-02 span, .kopa-page-header-10 .kopa-header-bottom, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-1 .enki-btn, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-4 a, .enki-module-slider.style-03 .slider-pro .sp-image-bg-2, .enki-module-slider.style-03 .slider-pro .sp-buttons .sp-selected-button, .enki-module-slider.style-06 .slider-pro .sp-slide .sp-txt-2 span:before, .enki-module-service.style-02 .widget-content div[class*="col-"]:hover .fa, .enki-module-service.style-02 .widget-content .enki-view-all a, .enki-module-intro.style-10 .enki-video .enki-video-main, .enki-module-intro.style-10 .enki-video .enki-video-main a, .enki-module-intro.style-07 blockquote, .enki-module-intro.style-08 .entry-item .entry-thumb .enki-play:hover, .enki-module-intro.style-05 blockquote, .enki-module-intro.style-05 .enki-link-other li a:before, .enki-module-portfolio.style-02 .widget-content .entry-item .entry-thumb:before, .enki-module-portfolio.style-04 .entry-item .entry-thumb:before, .enki-module-portfolio.style-08 .row-custom.color-01, .enki-module-portfolio.style-08 .entry-item .entry-thumb .enki-owl-carousel.style-01 .owl-theme .owl-controls .owl-pagination .owl-page.active span, .enki-module-portfolio.style-08 .entry-item .entry-thumb:hover .enki-icon-play, .enki-module-portfolio.style-06 .widget-content .owl-sync-widget .owl-carousel.sync1 .owl-controls .owl-pagination .owl-page.active span, .enki-module-portfolio.style-07 .widget-header-wrapper .widget-header-left, .enki-module-portfolio.style-07 .widget-content .entry-item .entry-content .entry-title:before, .enki-module-testimonial .entry-item .enki-content-logo .enki-logo, .enki-module-countup.style-03 .widget-content li.enki-custom-color-02, .enki-module-countup.style-02 .widget-content li .enki-item:hover, .enki-modules-free-trial.style-01 .enki-modules-free-trial-left .enki-btn, .enki-module-newsletter.style-02 .widget-content form button, .kopa-footer.style-02 .footer-area-1, .enki-module-newsletter.style-01 button:hover, .enki-module-twitter .entry-item .entry-content, .enki-module-client .owl-theme .owl-controls .owl-buttons div.owl-prev:hover:before, .enki-module-client .owl-theme .owl-controls .owl-buttons div.owl-next:hover:before, .enki-module-client.style-02 .owl-theme .owl-controls .owl-buttons div.owl-prev:hover:before, .enki-module-client.style-02 .owl-theme .owl-controls .owl-buttons div.owl-next:hover:before, .enki-module-team.style-04 .entry-item:hover .entry-content, .enki-module-team.style-02 .entry-item:hover .entry-content, .sticky-post-icon, .enki-module-blog-list.style-03 .entry-item .entry-header .entry-categories, .enki-module-blog-list.style-05 .entry-item .entry-header .entry-categories, .enki-module-carousel.style-02 .item .enki-category, .single-tag-box a, .single-other-post .entry-item > a > span, .single-other-post .entry-item > a > span:after {
          background: %1$s;
        }
        .owl-theme .owl-controls .owl-pagination .owl-page span, .owl-btn-03 .owl-controls .owl-buttons div:hover, .kopa-social-links.style-04 ul li a:hover, .kopa-social-links.style-10 ul li a:hover, .kopa-social-links.style-11 ul li a:hover, .thumb-icon:hover, .more-link.style-06:hover, .icon-title, .icon-title:before, .icon-title:after, .tagcloud a:hover, .enki-accordion.style-02 .acc-title.active, .enki-list.style-07 li:after, .enki-pricing-table.style-01 .enki-pricing-table-list.active, .enki-pricing-table.style-02 .enki-pricing-table-list.active ul li .pricing-button, .enki-pricing-table.style-03 .enki-pricing-table-list.active ul li .pricing-button, .enki-pricing-table.style-04 .enki-pricing-table-list .pricing-button, .enki-pricing-table.style-05 .enki-pricing-table-list.active .pricing-footer .pricing-button, .enki-pricing-table.style-05 .enki-pricing-table-list .pricing-footer .pricing-button, .enki-view-all.style-01 a:hover .enki-icon-plus, .enki-loadmore.style-01:hover .fa, button.enki-btn.enki-color-hover, a.enki-btn.enki-color-hover, button.enki-btn.enki-color-hover i, a.enki-btn.enki-color-hover i, button.enki-btn.enki-color-hover.enki-effect-02:before, a.enki-btn.enki-color-hover.enki-effect-02:before, button.enki-btn.enki-color-hover-light, a.enki-btn.enki-color-hover-light, button.enki-btn.enki-color-hover-light.enki-effect-02:before, a.enki-btn.enki-color-hover-light.enki-effect-02:before, .enki-hilightext-02, .kopa-search-box .search-form .search-text:focus, .kopa-search-box-1 .search-form .search-text:focus, .slide-menu li a > span:hover, .mobile-menu li a > span:hover, .scroll-down-btn:hover, .enki-module-slider.style-03 .slider-pro .sp-slide .sp-layer.sp-link-1 .enki-btn, .enki-module-slider.style-04 .breadcrumb-bg .breadcrumb-icon:hover, .enki-module-slider.style-05 .breadcrumb-bg .breadcrumb-icon:hover, .enki-module-slider.style-01 .entry-item .entry-content .sp-link-1 a:hover, .enki-module-slider.style-01 .breadcrumb-bg .breadcrumb-icon:hover, .enki-module-slider.style-02 .entry-item .entry-content .sp-link-1 a, .enki-module-slider.style-02 .breadcrumb-bg .breadcrumb-icon:hover, .enki-module-slider.style-02 .owl-theme .owl-controls .owl-buttons div:hover, .enki-module-service.style-02 .widget-content .fa, .enki-module-intro.style-09 .entry-item .entry-thumb:before, .enki-module-portfolio.style-08 .entry-item .entry-thumb:hover .enki-icon-play, .enki-module-testimonial .entry-item .enki-content-logo, .enki-module-testimonial .owl-theme .owl-controls .owl-buttons div.owl-prev:hover, .enki-module-testimonial .owl-theme .owl-controls .owl-buttons div.owl-next:hover, .enki-module-testimonial.style-03 .sync2 .owl-controls .owl-buttons div.owl-prev:hover, .enki-module-testimonial.style-03 .sync2 .owl-controls .owl-buttons div.owl-next:hover, .enki-modules-free-trial.style-01 .enki-modules-free-trial-left .enki-btn, .scrollup:hover, .enki-module-newsletter.style-01 button:hover, .enki-module-team.style-04 .entry-item:hover .entry-content, .enki-module-team.style-02 .entry-item:hover .entry-content, .enki-module-form.style-03 .widget-content input:hover, .enki-module-form.style-03 .widget-content textarea:hover, .enki-back-home:hover, .woocommerce ul.products li.product .onsale, .enki-module-shop-list.style-04 .entry-item .entry-content .enki-category:hover {
          border-color: %1$s;
        }
        .enki-pricing-table.style-04 .enki-pricing-table-list.active, .enki-module-slider.style-04 .breadcrumb-bg .breadcrumb-icon .enki-scroll-down, .enki-module-slider.style-05 .breadcrumb-bg .breadcrumb-icon .enki-scroll-down, .enki-module-slider.style-01 .breadcrumb-bg .breadcrumb-icon .enki-scroll-down, .enki-module-slider.style-02 .breadcrumb-bg .breadcrumb-icon .enki-scroll-down, .enki-module-breacrumb .breadcrumb-icon .breadcrumb-arrow {
          border-top-color: %1$s;
        }
        .enki-blockquote.style-06, .enki-tab.style-02 .accordion-link.active, .enki-tab.style-02 .accordion-link.nav-active, .enki-back-home:hover:before {
          border-left-color: %1$s;
        }

        ::selection,
        ::-moz-selection,
        .enki-module-slider.style-05 .slider-pro .sp-buttons .sp-selected-button,
        .enki-module-icon.style-04 .widget-content li a:hover,                
        .kopa-area-01,
        .enki-bg-main {  
            background-color: %1$s;
        }

        button.enki-btn.enki-size-07:hover i, a.enki-btn.enki-size-07:hover i,
        button.enki-btn.enki-icon-left i, a.enki-btn.enki-icon-left i,
        button.enki-btn.enki-icon-right i, a.enki-btn.enki-icon-right i,                
        button.enki-btn.enki-icon-right-02 i, a.enki-btn.enki-icon-right-02 i,
        .enki-module-shop-list .enki-arrow .enki-text:hover {
          color: %1$s;
        }

        .enki-module-icon.style-02 .widget-content li a:hover,                
        .enki-module-icon.style-04 .widget-content li a:hover {               
          border-color: %1$s;
				}';

			return $css;
		}

		function is_load_optional() {
			$page_id = 0;			

			if( is_page() ) {
				
				global $post;
				$page_id = $post->ID;

			} elseif( is_home() || is_category() || is_tag() ) {
				
				$ext_id  = (int) apply_filters( 'enki_get_extended_content_before_main', 0 );
				$page_id = $ext_id ? $ext_id : 0;

			} elseif( is_post_type_archive( 'product' ) || is_tax( 'product_tag' ) || is_tax( 'product_cat' ) ) {

				$ext_id  = (int) apply_filters( 'enki_get_extended_content_before_footer', 0 );
				$page_id = $ext_id ? $ext_id : 0;

			}

			return $page_id;
		}
		
	}

}
