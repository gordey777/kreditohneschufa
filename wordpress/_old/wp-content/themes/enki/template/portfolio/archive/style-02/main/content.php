<?php global $enki_index, $enki_size, $enki_subtitle, $enki_data_filter, $enki_size_class; ?>

<li class="enki-item <?php echo esc_attr( $enki_size_class ); ?>" data-index="<?php echo esc_attr( $enki_index ); ?>" data-filter='<?php echo esc_attr( json_encode( $enki_data_filter ) ); ?>'>
    
    <article class="entry-item">

        <div class="entry-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( $enki_size ); ?>
            </a>
        </div>

        <div class="entry-content">
            
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <span>                
                <?php echo esc_html( $enki_subtitle ); ?>                
            </span>

        </div>

    </article>

</li>