<li class="col-md-6 col-sm-6 col-xs-12">

    <article class="entry-item">

        <?php if( has_post_thumbnail() ): ?>
            <div class="entry-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'enki-medium-09' ); ?>
                </a>
            </div>
        <?php endif; ?>


        <div class="entry-content">

            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <?php
            $terms = wp_get_post_terms( get_the_ID(), 'portfolio_tag' );
            if( $terms ):
                $term_html = array();              
                ?>
                <p>
                    <?php 
                    foreach( $terms as $term ):                     
                        $term_html[] = sprintf( '<a href="%s" title="">%s</a>', esc_url( get_term_link( $term, 'portfolio_tag' ) ), esc_html( $term->name ) );
                    endforeach;

                    echo wp_kses_post( implode( ', ', $term_html ) );
                    ?>
                </p>
            <?php endif; ?>        

        </div>

    </article>

</li>