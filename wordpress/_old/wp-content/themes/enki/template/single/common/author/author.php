<?php
$author_id = get_the_author_meta('ID');

if( $author_id ):    
    $author_bio = get_the_author_meta('description', $author_id);
    
    if( empty( $author_bio ) ){
        return;
    }

		$enki_utility         = Enki_Utility::get_instance();
		$author_email         = get_the_author_meta('user_email', $author_id);
		$author_name          = get_the_author_meta('display_name');    
		$author_external_link = trim(get_the_author_meta('user_url'));
		$author_link          = ($author_external_link) ? $author_external_link : get_author_posts_url($author_id);
		$author_jobs          = get_the_author_meta('jobs');
    ?>

    <div class="kopa-entry-post">
        <div class="single-post-author clearfix">
            
            <div class="author-avatar kopa-pull-left">
                <a href="<?php echo esc_url( $author_link ); ?>">
                    <?php echo get_avatar( $author_email, 106 ); ?>
                </a>
            </div>

            <div class="author-content-wrap">
                <header class="clearfix">
                    <div class="kopa-pull-left">
                        <h5><a href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_html( $author_name ); ?></a></h5>
                        <h6><a href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_html( $author_jobs );?></a></h6>
                    </div>

                    <?php
                    $socials = $enki_utility->get_socials();
                    if( $socials ):
                        ?>
                        <div class="kopa-pull-right">
                            <div class="kopa-social-links style-08 enki-author-socials">
                                <ul class="clearfix">
                                    <?php 
                                    foreach( $socials as $slug => $social ):
                                        $url = get_the_author_meta( $slug );
                                        if( $url ) :
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url( $url ); ?>" class="enki-author-sc-link <?php echo esc_attr( $social['icon'] ); ?>" target="_blank" rel="nofollow"></a>
                                            </li>
                                            <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                </header>
                <div class="author-content">
                    <p><?php echo wp_kses_post( $author_bio ); ?></p>
                </div>                          
            </div>
        </div>
    </div>

<?php
endif;
