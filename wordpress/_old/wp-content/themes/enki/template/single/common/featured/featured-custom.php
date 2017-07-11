<?php
$enki_utility = Enki_Utility::get_instance();
$custom = get_post_meta( get_the_ID(), 'enki_custom', true );
echo wp_kses( apply_filters('the_content', $custom ), $enki_utility->get_allowed_tags() );



