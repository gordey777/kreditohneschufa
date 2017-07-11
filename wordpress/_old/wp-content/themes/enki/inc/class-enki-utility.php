<?php

if ( ! class_exists( 'Enki_Utility' ) ) {

	class Enki_Utility {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function get_allowed_tags() {
			$microdata_tags = array( 'div', 'section', 'article', 'a', 'span', 'img', 'time', 'figure' );
			$allowed_tag    = wp_kses_allowed_html( 'post' );

			$allowed_tag['div']['data-place']                 = array();
			$allowed_tag['div']['data-latitude']              = array();
			$allowed_tag['div']['data-longitude']             = array();
			$allowed_tag['a']['data-gallery']                 = array();
			$allowed_tag['a']['data-page-id']                 = array();
			$allowed_tag['a']['data-excerpt-length']          = array();
			$allowed_tag['a']['data-excerpt-length-no-thumb'] = array();
			$allowed_tag['span']['data-paged']                = array();
			$allowed_tag['ul']['data-id']                     = array();
			$allowed_tag['ul']['data-limit']                  = array();
			$allowed_tag['iframe']['src']                     = array();
			$allowed_tag['iframe']['height']                  = array();
			$allowed_tag['iframe']['width']                   = array();
			$allowed_tag['iframe']['frameborder']             = array();
			$allowed_tag['iframe']['allowfullscreen']         = array();
			$allowed_tag['input']['class']                    = array();
			$allowed_tag['input']['id']                       = array();
			$allowed_tag['input']['name']                     = array();
			$allowed_tag['input']['value']                    = array();
			$allowed_tag['input']['type']                     = array();
			$allowed_tag['input']['checked']                  = array();
			$allowed_tag['select']['class']                   = array();
			$allowed_tag['select']['id']                      = array();
			$allowed_tag['select']['name']                    = array();
			$allowed_tag['select']['value']                   = array();
			$allowed_tag['select']['type']                    = array();
			$allowed_tag['option']['selected']                = array();
			$allowed_tag['style']['types']                    = array();
			$allowed_tag['script']                            = array();
			$allowed_tag['del']                               = array();
			$allowed_tag['ins']                               = array();
			$allowed_tag['article']['data-filter']            = array();

			foreach ( $microdata_tags as $tag ) {
				$allowed_tag[ $tag ]['itemscope']         = array();
				$allowed_tag[ $tag ]['itemtype']          = array();
				$allowed_tag[ $tag ]['itemprop']          = array();
				$allowed_tag[ $tag ]['data-wow-duration'] = array();
				$allowed_tag[ $tag ]['data-wow-delay']    = array();
			}

			return apply_filters( 'enki_store_get_allowed_tags', $allowed_tag );
		}

		function get_socials() {
			$socials = array(
				'rss' => array(
					'title' => esc_html__( 'Rss', 'enki' ),
					'desc'  => esc_html__( 'Enter NONE to hide this link', 'enki' ),
					'icon'  => 'fa fa-rss',
				),
				'facebook' => array(
					'title' => esc_html__( 'Facebook', 'enki' ),
					'icon'  => 'fa fa-facebook',
				),
				'twitter' => array(
					'title' => esc_html__( 'Twitter', 'enki' ),
					'icon'  => 'fa fa-twitter',
				),
				'google' => array(
					'title' => esc_html__( 'Google+', 'enki' ),
					'icon'  => 'fa fa-google-plus',
				),
				'pinterest' => array(
					'title' => esc_html__( 'Pinterest', 'enki' ),
					'icon'  => 'fa fa-pinterest',
				),
				'instagram' => array(
					'title' => esc_html__( 'Instagram', 'enki' ),
					'icon'  => 'fa fa-instagram',
				),
				'dribbble' => array(
					'title' => esc_html__( 'Dribbble', 'enki' ),
					'icon'  => 'fa fa-dribbble',
				),
				'linkedin' => array(
					'title' => esc_html__( 'Linkedin', 'enki' ),
					'icon'  => 'fa fa-linkedin',
				),
				'github' => array(
					'title' => esc_html__( 'Github', 'enki' ),
					'icon'  => 'fa fa-github',
				),
			);

			return apply_filters( 'enki_get_socials', $socials );
		}

		function extract_shortcodes( $content, $enable_multi = false, $shortcodes = array() ) {
			$codes         = array();
			$regex_matches = '';
			$regex_pattern = get_shortcode_regex();

			preg_match_all( '/' . $regex_pattern . '/s', $content, $regex_matches );

			foreach ( $regex_matches[0] as $shortcode ) {
				$regex_matches_new = '';
				preg_match( '/' . $regex_pattern . '/s', $shortcode, $regex_matches_new );

				if ( in_array( $regex_matches_new[2], $shortcodes, true ) ) :
					$codes[] = array(
						'shortcode' => $regex_matches_new[0],
						'type'      => $regex_matches_new[2],
						'content'   => $regex_matches_new[5],
						'atts'      => shortcode_parse_atts( $regex_matches_new[3] ),
					);

					if ( ! $enable_multi ) {
						break;
					}
				endif;
			}

			return $codes;
		}

		function get_socials_activated() {
			$socials   = get_theme_mod( 'social_links', array() );
			$activated = array();
			$defaults  = array( 'title' => '', 'url' => '', 'rel' => '', 'target' => '', 'icon' => '' );

			if ( $socials ) {
				foreach ( $socials as $social ) {
					$social = wp_parse_args( $social, $defaults );

					if( empty( $social[ 'target' ] ) ) {
						$social[ 'target' ] = '_self';
					}

					$activated[] = $social;
				}
			}

			return $activated;
		}

		function get_payment_gateway_providers() {
			return apply_filters( 'enki_get_payment_gateway_providers', array(
				'paypal' => array(
				'title' => esc_html__( 'Paypal', 'enki' ),
				'url'   => 'https://paypal.com',
				'image' => get_template_directory_uri() . '/images/payment-gateway-providers/paypal.png',
				),
				'visa' => array(
				'title' => esc_html__( 'Visa', 'enki' ),
				'url'   => 'https://usa.visa.com/',
				'image' => get_template_directory_uri() . '/images/payment-gateway-providers/visa.png',
				),
				'master-card' => array(
				'title' => esc_html__( 'Master card', 'enki' ),
				'url'   => 'https://www.mastercard.us',
				'image' => get_template_directory_uri() . '/images/payment-gateway-providers/master-card.png',
				),
				'maestro-card' => array(
				'title' => esc_html__( 'Maestro card', 'enki' ),
				'url'   => 'https://www.maestrocard.com',
				'image' => get_template_directory_uri() . '/images/payment-gateway-providers/maestro.png',
				),
			) );
		}

		function convert_hex_to_rgba( $color, $opacity = 0.5 ) {
			$default = 'rgb(0,0,0)';

			if ( empty( $color ) ) {
				return $default;
			}

			if ( '#' === $color[0] ) {
				$color = substr( $color, 1 );
			}

			if ( 6 === strlen( $color ) ) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( 3 === strlen( $color ) ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
				return $default;
			}

			$rgb = array_map( 'hexdec', $hex );

			if ( $opacity ) {
				if ( abs( $opacity ) > 1 ) {
					$opacity = 1.0;
				}

				$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
			} else {
				$output = 'rgb(' . implode( ',', $rgb ) . ')';
			}
			return $output;
		}

		function get_featured_image_size() {
			$sb_right = apply_filters( 'enki_get_sidebar_by_position', 'sb_right', 'pos_right' );
			$size     = is_active_sidebar( $sb_right ) ? 'enki-extra-02' : 'enki-extra-03';

			return $size;
		}

		function get_site_elements() {
			$default = array( 'family' => '', 'style' => '', 'size' => '', 'color' => '' );

			return apply_filters( 'enki_get_site_elements', array(
				'body' => array(
				'title'   => esc_html__( 'Body', 'enki' ),
				'element' => 'html, body',
				'default' => $default,
				),
				'main-menu' => array(
				'title'   => esc_html__( 'Main menu', 'enki' ),
				'element' => '.main-nav .main-menu > li.menu-item > a',
				'default' => $default,
				),
				'main-menu-sub' => array(
				'title'   => esc_html__( 'Main menu (sub)', 'enki' ),
				'element' => '.main-nav .main-menu .sub-menu > li.menu-item > a',
				'default' => $default,
				),
				'widget-title-right' => array(
				'title'   => esc_html__( 'Widget title (right)', 'enki' ),
				'element' => '.widget-title.style-05 > span',
				'default' => $default,
				),
				'widget-title-footer' => array(
				'title'   => esc_html__( 'Widget title (footer)', 'enki' ),
				'element' => '.widget-title.style-02 > span',
				'default' => $default,
				),
				'post-title' => array(
				'title'   => esc_html__( 'Single post title', 'enki' ),
				'element' => '#enki-page-title',
				'default' => $default,
				),
				'post-content' => array(
				'title'   => esc_html__( 'Single post content', 'enki' ),
				'element' => '#enki-page-content',
				'default' => $default,
				),
				'h1' => array(
				'title'   => esc_html__( 'Post content: H1', 'enki' ),
				'element' => '#enki-page-content h1',
				'default' => $default,
				),
				'h2' => array(
				'title'   => esc_html__( 'Post content: H2', 'enki' ),
				'element' => '#enki-page-content h2',
				'default' => $default,
				),
				'h3' => array(
				'title'   => esc_html__( 'Post content: H3', 'enki' ),
				'element' => '#enki-page-content h3',
				'default' => $default,
				),
				'h4' => array(
				'title'   => esc_html__( 'Post content: H4', 'enki' ),
				'element' => '#enki-page-content h4',
				'default' => $default,
				),
				'h5' => array(
				'title'   => esc_html__( 'Post content: H5', 'enki' ),
				'element' => '#enki-page-content h5',
				'default' => $default,
				),
				'h6' => array(
				'title'   => esc_html__( 'Post content: H6', 'enki' ),
				'element' => '#enki-page-content h6',
				'default' => $default,
				),
				)
			);
		}

		function parse_args( $args = array(), $default = array() ) {
			$args = wp_parse_args( $args, $default );

			if ( $args ) {
				foreach ( $args as $key => $sub_args ) {
					if ( isset( $default[ $key ] ) && is_array( $default[ $key ] ) && ! empty( $default[ $key ] ) ) {
						$args[ $key ] = $this->parse_args( $args[ $key ], $default[ $key ] );
					}
				}
			}

			return $args;
		}

		function split_words( $text, $min = 5 ) {
			$parts      = array( '', '' );
			$word_count = str_word_count( $text );

			if ( $word_count >= $min ) {
				$word_of_first_line = (int) ( ( $word_count / 2 ) );
				$parts[0]           = wp_trim_words( $text, $word_of_first_line, '' );
				$parts[1]           = trim( substr( $text, strlen( $parts[0] ) ) );
			} else {
				$parts[0] = $text;
			}

			return $parts;
		}

		function get_format_icon( $post_id ) {
			$format = get_post_format( $post_id );

			switch ( $format ) {
				case 'video':
					$icon = 'ti-video-camera';
				break;
				case 'gallery':
					$icon = 'ti-gallery';
				break;
				case 'audio':
					$icon = 'ti-volume';
				break;
				case 'quote':
					$icon = 'ti-quote-left';
				break;
				case 'image':
					$icon = 'ti-camera';
				break;
				case 'link':
					$icon = 'ti-link';
				break;
				default:
					$icon = 'ti-pencil';
				break;
			}

			return apply_filters( 'get_format_icon', $icon, $post_id );
		}

		function get_viewports() {
			return array(
				'global'  => array(
					'title' => esc_html__( 'Global', 'enki' ),					
					'media' => '%s',
				),
				'desktop' => array(
					'title' => esc_html__( 'Desktop', 'enki' ),					
					'media' => '@media screen and (min-width: 1024px) { %s }',
				),
				'tablet'  => array(
					'title' => esc_html__( 'Tablet', 'enki' ),					
					'media' => '@media screen and (min-width: 768px) and (max-width: 1023px) { %s }',
				),
				'mobile'  => array(
					'title' => esc_html__( 'Mobile', 'enki' ),					
					'media' => '@media screen and (max-width: 767px) { %s }',
				),
			);
		}		

	}

}
