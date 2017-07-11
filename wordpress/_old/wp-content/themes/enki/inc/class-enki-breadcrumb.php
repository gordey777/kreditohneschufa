<?php

if ( ! class_exists( 'Enki_Breadcrumb' ) ) {

	class Enki_Breadcrumb {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function get_template_part() {
			$style = esc_html( get_theme_mod( 'breadcrumb_style', '' ) );
			$url   = sprintf( 'template/breadcrumb/%s', $style );
			get_template_part( $url );
		}

		function get_link( $href = '', $title = '', $is_activated = false ) {
			$classes = $is_activated ? 'current-page' : '';
			ob_start();
			?>
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
        <a href="<?php echo esc_url( $href ); ?>" itemprop="url" class="<?php echo esc_attr( $classes ); ?>">
          <span itemprop="title"><?php echo esc_html( $title ); ?></span>
        </a>
      </span>
			<?php
			return ob_get_clean();
		}

		function print_html( $echo = true ) {
			global $post, $wp_query;

			$enki_page = Enki_Page::get_instance();

			$output = '';

			if ( is_archive() ) {

				if (  is_tax() || is_category() || is_tag() ) {
					$term   = get_queried_object();
					$output .= $this->get_link( '#', $term->name, true );
				}
			} elseif ( is_singular() ) {

				if ( is_page() ) {

						$parents = get_post_ancestors( get_queried_object_id() );

					if ( $parents ) {
						$parents = array_reverse( $parents );
						foreach ( $parents as $ancestor ) {
							$output .= $this->get_link( get_permalink( $ancestor ), get_the_title( $ancestor ) );
						}
					}
				} else {

					if ( is_single() ) {

						$post_type = get_post_type();

						if ( 'post' !== $post_type ) {

							  $post_type_object = get_post_type_object( $post_type );
							  $output           .= $this->get_link( get_post_type_archive_link( $post_type ) , $post_type_object->labels->name );

						} else {

							$categories = get_the_category( get_queried_object_id() );

							if ( $categories ) {
								foreach ( $categories as $category ) {
									$title  = $category->name;
									$output .= $this->get_link( get_term_link( $category, 'category' ), $title );
								}
							}
						}
					}
				}
			}

			$output .= $this->get_link( '#', $enki_page->get_title(), true );

			if ( $echo ) {
				echo wp_kses_post( $output );
			} else {
				return $output;
			}
		}

		function customize() {
			$is_customize_breadcrumb = (int) get_theme_mod( 'is_customize_breadcrumb', true );
			if ( $is_customize_breadcrumb ) {
				$css      = '';
				$bg_image = absint( get_theme_mod( 'breadcrumb_bg_image', 0 ) );
				$bg_color = esc_html( get_theme_mod( 'breadcrumb_bg_color' ) );

				if ( $bg_image ) {
					$bg_image = wp_get_attachment_image_url ( $bg_image, 'full' );
					if( $bg_image ) {
						$css .= sprintf( '#enki_breadcrumb{ background-image: url("%s"); }', esc_url( $bg_image ) );
					}
				}

				if ( $bg_color ) {
					$enki_utility = Enki_Utility::get_instance();
					$css .= sprintf( '#enki_breadcrumb:before{ background-color: %s; }', esc_attr( $enki_utility->convert_hex_to_rgba( $bg_color ) ) );
				}

				wp_add_inline_style( 'enki-style', $css );
			}
		}
	}

}
