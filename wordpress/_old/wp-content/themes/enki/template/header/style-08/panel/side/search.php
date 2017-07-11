<div class="kopa-search-box">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
        <input type="text"  placeholder="<?php esc_attr_e( 'Enter a keyword..', 'enki' ); ?>" name="s" class="search-text">
        <button type="submit" class="search-submit">
            <span class="fa fa-search"></span>
        </button>
    </form>
</div>