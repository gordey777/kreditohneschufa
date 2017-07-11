<?php global $enki_subtitle; ?>

<div class="col-md-3 col-sm-3 col-xs-12">
    <article class="entry-item">
        
        <div class="entry-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php 
                if( has_post_thumbnail() ) {
                    the_post_thumbnail( 'enki-medium-03' );             
                }
                ?>
                <span></span>
            </a>
        </div>    

        <div class="entry-content">
            
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            
            <?php if( $enki_subtitle ): ?>
                <span><?php echo esc_html( $enki_subtitle ); ?></span>
            <?php endif; ?>

        </div>
    
    </article>
    
</div>