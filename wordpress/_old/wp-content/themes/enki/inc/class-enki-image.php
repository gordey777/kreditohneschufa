<?php

if( !class_exists( 'Enki_Image' ) ) {
	
	class Enki_Image {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		function register_image_sizes() {
			$sizes = $this->get_image_sizes();
			
			if( $sizes ) {
				foreach( $sizes as $slug => $size ) {
					add_image_size( $slug, $size[0], $size[1], $size[2] );		
				}
			}
		}

		function get_image_sizes() {
			
			$sizes = array(
				'enki-tiny-01'         => array(  36, 36, true ),
				'enki-small-01'        => array(  90, 90, true ),
				'enki-small-02'        => array(  120, 120, true ),
				'enki-small-03'        => array(  null, 130, false ),
				'enki-small-04'        => array(  100, 72, true ),
				'enki-small-05'        => array(  200, 200, true ),
				'enki-medium-01'       => array(  343, 215, true ),
				'enki-medium-01-extra' => array(  520, 326, true ),
				'enki-medium-02'       => array(  370, 241, true ),
				'enki-medium-02-extra' => array(  544, 354, true ),
				'enki-medium-03'       => array(  270, 360, true ),
				'enki-medium-04'       => array(  270, 270, true ),
				'enki-medium-05'       => array(  355, 440, true ),
				'enki-medium-06'       => array(  470, 290, true ),
				'enki-medium-07'       => array(  405, 395, true ),
				'enki-medium-08'       => array(  340, 340, true ),
				'enki-medium-09'       => array(  455, null, false ),
				'enki-medium-10'       => array(  390, 275, true ),
				'enki-medium-11'       => array(  322, 636, true ),
				'enki-medium-12'       => array(  331, 316, true ),
				'enki-medium-13'       => array(  448, 400, true ),
				'enki-large-01'        => array(  816, 423, true ),
				'enki-large-01-extra'  => array(  1170, 606, true ),
				'enki-large-02'        => array(  570, 350, true ),
				'enki-large-03'        => array(  540, 540, true ),
				'enki-large-04'        => array(  540, 270, true ),
				'enki-large-05'        => array(  270, 540, true ),
				'enki-large-06'        => array(  675, 535, true ),
				'enki-large-07'        => array(  680, 340, true ),
				'enki-large-08'        => array(  570, null, false ),
				'enki-large-09'        => array(  570, 555, true ),
				'enki-large-10'        => array(  893, 390, true ),				
				'enki-extra-02'        => array(  820, 430, true ),
				'enki-extra-03'        => array(  1170, 430, true ),
				'enki-extra-04'        => array(  1366, 675, true )
			);

			return apply_filters( 'enki_utility_get_image_sizes', $sizes );
		}

		function get_image_size( $size_name ) {
			$sizes = $this->get_image_sizes();

			if( $size_name && $sizes && isset( $sizes[ $size_name ] ) ) {
				return $sizes[ $size_name ];
			}else{
				return false;
			}
		}

		function get_attachment_image_src( $image, $attachment_id, $size ) {

			if( function_exists( 'fly_get_attachment_image_src' ) ) {

			  if( !is_array( $size ) && $size != "full" && $size != "original" ) {

			  	$_size = $this->get_image_size( $size );

			  	if( $_size ){
				    
				    $fly_image = fly_get_attachment_image_src($attachment_id, array($_size[0], $_size[1]), $_size[2]);    
				    
				    $image = array(
				      $fly_image["src"],
				      $fly_image["width"],
				      $fly_image["height"],
				      true
				    );

				  }

			  }

			}

		  return $image;
		}

	}

}
