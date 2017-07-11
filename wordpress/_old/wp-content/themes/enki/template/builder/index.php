<?php
global $post;

$enki_builder = Enki_Builder::get_instance();
$enki_builder->print_page( $post->ID );