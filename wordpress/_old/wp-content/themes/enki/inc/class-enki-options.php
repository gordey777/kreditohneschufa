<?php

class Enki_Options{

	protected static $instance = null;

	static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	function __construct() {
		require_once get_template_directory() . '/inc/options/header.php';
		require_once get_template_directory() . '/inc/options/breadcrumb.php';
		require_once get_template_directory() . '/inc/options/footer.php';
		require_once get_template_directory() . '/inc/options/blog.php';
		require_once get_template_directory() . '/inc/options/post.php';	
		require_once get_template_directory() . '/inc/options/socials.php';		
		require_once get_template_directory() . '/inc/options/font.php';
		require_once get_template_directory() . '/inc/options/color.php';
		require_once get_template_directory() . '/inc/options/custom.php';
		require_once get_template_directory() . '/inc/options/system.php';
	}
}
