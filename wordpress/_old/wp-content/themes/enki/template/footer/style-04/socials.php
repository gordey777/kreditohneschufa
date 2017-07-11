<?php
$enki_utility = Enki_Utility::get_instance();
$socials = $enki_utility->get_socials_activated();

if( count( $socials ) ):
?>

    <div class="enki-module-ft-social">
        <ul class="clearfix ul-mh">
            <?php 
            $loop_index = 0;

            foreach ( $socials as $slug => $social ) :

                if( $loop_index && ( 0 === $loop_index % 4 ) ) {
                    echo '</ul>';
                    echo '<ul class="clearfix ul-mh">';
                }
                ?>
                <li>
                	<div>
                		<a href="<?php echo esc_url( $social['url'] ); ?>" class="<?php echo esc_attr( $social['icon'] ); ?>"  target="_blank" rel="nofollow"></a>
                		<h6><a href="<?php echo esc_url( $social['url'] ); ?>"  target="<?php echo esc_attr( $social['target'] ); ?>" rel="<?php echo esc_attr( $social['rel'] ); ?>"><?php echo wp_kses_post( $social['title'] ); ?></a></h6>
                	</div>
                </li>       
                <?php 
                $loop_index++;
            endforeach; 
            ?>
        </ul>
    </div>

<?php
endif;