<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
    <input type="text"  placeholder="<?php esc_attr_e( 'Type & Hit Enter...', 'enki' ); ?>" name="s" class="search-text">
    <button type="submit" class="search-submit">
        <span class="ti-search"></span>
    </button>
</form> 