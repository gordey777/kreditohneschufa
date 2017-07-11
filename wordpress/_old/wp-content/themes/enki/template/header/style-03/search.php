<?php 
$is_show_search_form = (int)get_theme_mod( 'is_show_search_form', 0 );

if( $is_show_search_form ):
?>
    <div class="kopa-header-search">

        <div class="search-show">
            <span><span><?php esc_attr_e( 'Search', 'enki' ); ?></span><i class="ti-search"></i></span>
        </div>

        <div class="search-hide">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
                <input type="text"  placeholder="<?php esc_attr_e( 'Type & Hit Enter...', 'enki' ); ?>" name="s" class="search-text">
                <button type="submit" class="search-submit">
                    <span class="ti-search"></span>
                </button>
            </form> 
            <span class="search-close ti-close"></span>
        </div>

    </div>
<?php
endif;