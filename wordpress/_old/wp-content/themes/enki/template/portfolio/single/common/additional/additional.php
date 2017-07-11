<?php
$items = get_post_meta( get_the_ID(), 'enki_additional', true );

if( $items ):
    $classes = apply_filters( 'enki_portfolio_single_get_additional_classes', array( 'enki-list' ) );
    ?>
    <ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

        <?php 
        foreach( $items as $item ):
            $key   = $item['key'];
            $value = $item['value'];

            if( $key && $value ):
                ?>
                <li>
                    <?php echo esc_html($key); ?>:
                    <span><?php echo wp_kses_post( $value ); ?></span>
                </li>
                <?php 
            endif;
        endforeach;
        ?>

        <li>
            <?php esc_html_e( 'Date', 'enki' ); ?>
            <span><?php echo get_the_date(); ?></span>
        </li>
        
    </ul>
    <?php
endif;