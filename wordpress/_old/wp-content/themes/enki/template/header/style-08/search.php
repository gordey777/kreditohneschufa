<div class="kopa-header-search">

    <div class="search-show">
        <span><i class="fa fa-search"></i></span>
    </div>

    <div class="search-hide">
        <form action="#" class="search-form" method="get">
            <input type="text"  placeholder="<?php esc_attr_e( 'Type & Hit Enter...', 'enki' ); ?>" onBlur="if (this.value == '') this.value = this.defaultValue;" onFocus="if (this.value == this.defaultValue) this.value = '';" value="<?php esc_attr_e( 'Type & Hit Enter...', 'enki' ); ?>" name="s" class="search-text">
            <button type="submit" class="search-submit">
                <span class="ti-search"></span>
            </button>
        </form> 
        <span class="search-close ti-close"></span>
    </div>

</div>      