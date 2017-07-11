<?php

if ( ! class_exists( 'Enki_Navigation' ) ) {

	class Enki_Navigation {

		static function add_index_to_lv0( $title, $item ) {
			if ( empty( $item->menu_item_parent ) ) {
				$title = '<span class="order-menu-number"></span>' . $title;
			}

			return $title;
		}
	}
}


