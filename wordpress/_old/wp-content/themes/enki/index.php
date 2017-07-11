<?php

$enki_layout = Enki_Layout::get_instance();

get_header( esc_html( get_theme_mod( 'header_style', 'style-03' ) ) );

$layout_id = $enki_layout->activated_layout['layout_id'];
$template  = apply_filters( 'enki_get_archive_template', sprintf('template/archive/%s', $layout_id), $layout_id );

get_template_part( $template );

get_footer( esc_html( get_theme_mod( 'footer_style', 'style-01' ) ) );
