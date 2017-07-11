<?php

if ( ! class_exists( 'Enki_Post' ) ) {

	class Enki_Post{

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_action( 'admin_init', array( $this, 'register_metabox' ) );
			add_action( 'kopa_enki-post-metabox-details_saved', array( $this, 'save_post' ) );
			add_action( 'kopa_enki-portfolio-details_saved', array( $this, 'save_post' ) );
		}

		function register_metabox() {
			$args = array(
				'id'          => 'enki-post-metabox-details',
				'title'       => esc_html__( 'Featured content', 'enki' ),
				'desc'        => '',
				'pages'       => array( 'post' ),
				'context'     => 'normal',
				'priority'    => 'high',
				'fields'      => array(
				  array(
						'title'          => esc_html__( 'Gallery', 'enki' ),
						'type'           => 'gallery_sortable',
						'id'             => 'enki_gallery',
						'thumbnail_size' => 'enki-small-01',
				  ),
				  array(
						'title' => esc_html__( 'Quote', 'enki' ),
						'type'  => 'quote',
						'id'    => 'enki_quote',
				  ),
				  array(
						'title'    => esc_html__( 'Custom', 'enki' ),
						'desc'     => esc_html__( 'Enter youtube, vimeo link, any embed url. Or custom shortcode, custom HTML.', 'enki' ),
						'type'     => 'textarea',
						'id'       => 'enki_custom',
						'class'    => 'large-text',
						'validate' => false
				  )
				)
			);

			if ( function_exists( 'kopa_register_metabox' ) ) {
				kopa_register_metabox( $args );
			}
		}

		function get_widget_args() {

			$all_cats = get_categories();
			$categories = array( '' => __( '-- none --', 'enki' ) );
			foreach ( $all_cats as $cat ) {
				$categories[ $cat->slug ] = $cat->name;
			}

			$all_tags = get_tags();
			$tags = array( '' => __( '-- none --', 'enki' ) );
			foreach ( $all_tags as $tag ) {
				$tags[ $tag->slug ] = $tag->name;
			}

			return array(
				'title'  => array(
					'type'  => 'text',
					'std'   => '',
					'label' => __( 'Title:', 'enki' ),
				),
				'categories' => array(
					'type'    => 'multiselect',
					'std'     => '',
					'label'   => __( 'Categories:', 'enki' ),
					'options' => $categories,
					'size'    => 5,
				),
				'relation'    => array(
					'type'    => 'select',
					'label'   => __( 'Relation:', 'enki' ),
					'std'     => 'OR',
					'options' => array(
						'AND' => __( 'AND', 'enki' ),
						'OR'  => __( 'OR', 'enki' ),
					),
				),
				'tags' => array(
					'type'    => 'multiselect',
					'std'     => '',
					'label'   => __( 'Tags:', 'enki' ),
					'options' => $tags,
					'size'    => 5,
				),
				'order' => array(
					'type'    => 'select',
					'std'     => 'DESC',
					'label'   => __( 'Order:', 'enki' ),
					'options' => array(
						'ASC'  => __( 'ASC', 'enki' ),
						'DESC' => __( 'DESC', 'enki' ),
					),
				),
				'orderby' => array(
					'type'    => 'select',
					'std'     => 'date',
					'label'   => __( 'Ordered by:', 'enki' ),
					'options' => array(
						'date'          => __( 'Date', 'enki' ),
						'rand'          => __( 'Random', 'enki' ),
						'comment_count' => __( 'Number of comments', 'enki' ),
					),
				),
				'format' => array(
					'type'     => 'taxonomy',
					'std'      => '',
					'label'    => __( 'Post format:', 'enki' ),
					'taxonomy' => 'post_format',
				),
				'limit' => array(
					'type'  => 'number',
					'std'   => 5,
					'label' => __( 'Number of posts:', 'enki' ),
				),
				'ids' => array(
					'type'      => 'chosen_singular',	
					'post_type' => 'post',	
					'std'       => array(),
					'label'     => esc_html__( 'Or enter specify ID(s)', 'enki' ),
					'data'      => array(
						'placeholder' => esc_html__( 'Select a post', 'enki' ),
						'width'       => '100%',
						'is_multiple' => true
					),
				)
			);
		}

		function get_widget_query( $instance ) {
			$query = array(
				'post_type'           => 'post',
				'posts_per_page'      => $instance['limit'],
				'order'               => $instance['order'] == 'ASC' ? 'ASC' : 'DESC',
				'orderby'             => $instance['orderby'],
				'ignore_sticky_posts' => true,
			);

			if ( $instance['categories'] ) {
				if ( $instance['categories'][0] == '' ) {
					unset( $instance['categories'][0] ); }

				if ( $instance['categories'] ) {
					$query['tax_query'][] = array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $instance['categories'],
					);
				}
			}

			if ( $instance['tags'] ) {
				if ( $instance['tags'][0] == '' ) {
					unset( $instance['tags'][0] ); }

				if ( $instance['tags'] ) {
					$query['tax_query'][] = array(
						'taxonomy' => 'post_tag',
						'field'    => 'slug',
						'terms'    => $instance['tags'],
					);
				}
			}

			if ( $instance['format'] ) {
				$query['tax_query'][] = array(
					'taxonomy' => 'post_format',
					'field'    => 'id',
					'terms'    => $instance['format'],
				);
			}

			if ( isset( $query['tax_query'] ) && count( $query['tax_query'] ) === 2 ) {
				$query['tax_query']['relation'] = $instance['relation'];
			}

			$query = apply_filters( 'enki_widget_get_query', $query, $instance, 'post' );

			return apply_filters( 'enki_post_get_widget_query', $query, $instance );
		}

		function get_related_query( $get_by = 'post_tag', $limit = 3 ) {
			global $post;

			$query  = array();
			$get_by = apply_filters( 'enki_post_get_related_by', $get_by );
			$limit  = (int) apply_filters( 'enki_post_get_related_limit', $limit );

			if ( $limit ) {
				$taxs   = array();
				if ( $get_by ) {
					$terms = wp_get_post_terms( $post->ID, $get_by );
					if ( $terms ) {
						$ids = array();
			            foreach ( $terms as $term ) {
			                $ids[] = $term->term_id;
			            }
			            $taxs [] = array(
			                'taxonomy' => $get_by,
			                'field'    => 'id',
			                'terms'    => $ids,
			            );
					}
				}
				$query = array(
					'ignore_sticky_posts' => true,
	            	'post_type'           => array( $post->post_type ),
		            'post__not_in'        => array( $post->ID ),
		            'posts_per_page'      => $limit,
		            'tax_query'           => $taxs,
				);
			}

			return apply_filters( 'enki_post_get_related_query', $query );
		}

		function get_first_category( $post_id ) {
			$category   = false;
			$categories = get_the_category( $post_id );

			if ( $categories ) {
				$category = $categories[0];
			}

			return $category;
		}

    function save_post(  $post_id ) {
      // 1. Featured content.
			$gallery = ( isset( $_REQUEST['enki_gallery'] ) && !empty( $_REQUEST['enki_gallery'] ) ) ? 1 : 0;
			$quote   = ( isset( $_REQUEST['enki_quote']['content'] ) && !empty( $_REQUEST['enki_quote']['content'] ) ) ? 1 : 0;
			$custom  = ( isset( $_REQUEST['enki_custom'] ) && !empty( $_REQUEST['enki_custom'] ) ) ? 1 : 0;						          									
               
      if( $custom ){
      	$featured_type = 'custom';
      }elseif( $quote ){
          $featured_type = 'quote';
      }elseif( $gallery ){
          $featured_type = 'gallery';
      }elseif( has_post_thumbnail( $post_id ) ){
          $featured_type = 'thumbnail';
      }else{
          $featured_type = '';
      }		            

      update_post_meta( $post_id, 'enki_featured_type', $featured_type );
      update_post_meta( $post_id, 'enki_is_has_featured', $featured_type ? 1 : 0 );

      // 2. Create download link.
      $download_url = isset( $_REQUEST['enki_download'] ) ? esc_url( $_REQUEST['enki_download'] ) : '';
      if( !$download_url ){
        $download_url = isset( $_REQUEST['enki_file'] ) ? esc_url( $_REQUEST['enki_file'] ) : ''; 
        update_post_meta( $post_id, 'enki_download_url', $download_url );
      }else{
        delete_post_meta( $post_id, 'enki_download_url' );
      }      
		}

	}

}
