<?php
if ( ! class_exists( 'Kopa_Page_Builder' ) ) { return; }

if ( ! class_exists( 'Enki_Builder' ) ) {

	class Enki_Builder {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_action( 'init', array( $this, 'init' ) );
			add_filter( 'kopa_page_builder_is_allow_minify', '__return_true' );
			
			Enki_Builder_Cache::get_instance();
			Enki_Builder_Assets::get_instance();
			Enki_Builder_Layout::get_instance();
			Enki_Builder_Row::get_instance();
			Enki_Builder_Col::get_instance();
			Enki_Builder_Widgets::get_instance();
			Enki_Builder_Widget::get_instance();
		}

		function init() {
			add_filter( 'enki_get_page_template', array( $this, 'get_page_template' ) );
		}

		function get_page_template( $template ) {
			if ( is_page() ) {

				global $post;				
				$layout_slug = Kopa_Page_Builder::get_current_layout( $post->ID );

				if ( ! in_array( $layout_slug, array( '', 'disable' ) ) ) {
					$template = 'template/builder/index';
			 	}

			}

			return $template;
		}

		function print_page( $post_id = 0, $extra_args = array( 'is_nested' => false ) ) {

			$layout_slug       = Kopa_Page_Builder::get_current_layout( $post_id );			
			$obj_builder_cache = Enki_Builder_Cache::get_instance();
			$cache             = $obj_builder_cache->get_cache( $post_id, $layout_slug );
			$cache_status      = $obj_builder_cache->get_status( $post_id, $layout_slug );

			if( false === $cache ) {
				ob_start();

				$enki_builder_data_layout = Enki_Builder_Data_Layout::get_instance();
				$enki_builder_data_row    = Enki_Builder_Data_Row::get_instance();
				$enki_builder_data_col    = Enki_Builder_Data_Col::get_instance();
				$enki_builder_data_widget = Enki_Builder_Data_Widget::get_instance();
				
				$enki_builder_row         = Enki_Builder_Customize_Row::get_instance();
				$enki_builder_col         = Enki_Builder_Customize_Col::get_instance();
				$enki_utility             = Enki_Utility::get_instance();						
				
				$layout_data_customize    = Kopa_Page_Builder::get_layout_customize_data( $post_id, $layout_slug );
				$layout_data              = Kopa_Page_Builder::get_layout_data( $post_id );
				$layout_info              = Kopa_Page_Builder::get_layout( $layout_slug );
			
				$enki_builder_data_layout->set_slug( $layout_slug );
				$enki_builder_data_layout->set_data( $layout_data );
				$enki_builder_data_layout->set_data_customize( $layout_data_customize );
				$enki_builder_data_layout->set_info( $layout_info );

				if( $layout_data ) {

					get_template_part( 'template/builder/page', 'start' );

					$x = 0;
					foreach( $layout_data as $row_slug => $cols ) {

						if ( !empty( $cols ) ) {

							$col_sizes   = $layout_info[ 'section' ][ $row_slug ][ 'grid' ];
							$is_only_one = ( 1 === count( $col_sizes ) );					
							$row_data    = Kopa_Page_Builder::get_row_customize_data( $post_id, $layout_slug, $row_slug );
							$row_data    = $enki_utility->parse_args( $row_data, $enki_builder_row->get_defaults() );

							$enki_builder_data_row->set_slug( $row_slug );
							$enki_builder_data_row->set_data( $row_data );
							$enki_builder_data_row->set_index( $x );

							get_template_part( 'template/builder/row', 'start' );

							$y = 0;
							foreach ( $cols as $col_slug => $widgets ):
								
								if( !empty( $widgets ) ):

									$col_data = Kopa_Page_Builder::get_col_customize_data( $post_id, $layout_slug, $row_slug, $col_slug );
									$col_data = $enki_utility->parse_args( $col_data, $enki_builder_col->get_defaults() );
			
									$enki_builder_data_col->set_slug( $col_slug );
									$enki_builder_data_col->set_data( $col_data );
									$enki_builder_data_col->set_index( $y );

									get_template_part( 'template/builder/col', 'start' );

									$z = 0;
									foreach ( $widgets as $widget_id => $widget ) :
										
										if( class_exists ( $widget['class_name'] ) ):
										
											$widget_data = get_post_meta( $post_id, $widget_id, true );

											if( $widget_data ):
												
												$enki_builder_data_widget->set_id( $widget_id );
												$enki_builder_data_widget->set_data( $widget_data );
												$enki_builder_data_widget->set_index( $z );

												get_template_part( 'template/builder/widget' );

											endif;

										endif;

										$z++;
									endforeach;

									get_template_part( 'template/builder/col', 'end' );

								endif;

								$y++;
							endforeach;

							get_template_part( 'template/builder/row', 'end' );

						}

						$x++;
					}

					get_template_part( 'template/builder/page', 'end' );
				}

				$cache = ob_get_clean();

				if( $cache_status ){
					$cache = $obj_builder_cache->set_cache( $post_id, $layout_slug, $cache );				
				}

			}
			
			print( $cache );

		}                                                                                    

	}

}
