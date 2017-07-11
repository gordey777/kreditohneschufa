<?php 
$is_show_search_form = (int)get_theme_mod( 'is_show_search_form', 0 );

if( $is_show_search_form ):
?>

	<div class="kopa-search-box-1">
	    <span class="search-label"><?php esc_html_e( 'Search', 'enki' ); ?></span>
	    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
	        <input type="text" name="s" class="search-text">
	        <button type="submit" class="search-submit">
	            <span class="fa fa-search"></span>
	        </button>
	    </form>
	</div>

<?php
endif;