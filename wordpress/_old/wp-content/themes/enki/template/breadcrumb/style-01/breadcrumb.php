<?php $enki_breadcrumb = Enki_Breadcrumb::get_instance(); ?>

<div class="breadcrumb-nav">
    
    <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span itemprop="title"><?php esc_html_e( 'Home', 'enki' ); ?></span>
        </a>
    </span>
    
    <?php $enki_breadcrumb->print_html(); ?>

</div>
