<div class="single-author">

    <figure><?php echo get_avatar( get_the_author_meta( 'ID' ), 225 ); ?></figure>

    <div class="single-author-meta">

        <span><?php esc_html_e( 'POSTED BY', 'actavista' ); ?></span>

        <h5><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h5>

        <p><?php echo esc_html(get_the_author_meta('description')); ?></p>

        <?php 

            $facebook_profile = get_the_author_meta( 'actavista_fb' );

            $google_profile = get_the_author_meta( 'actavista_google' );

            $twitter_profile = get_the_author_meta( 'actavista_tw' );

            $linkedin_profile = get_the_author_meta( 'actavista_link' );

            $pinterest_profile = get_the_author_meta( 'actavista_pinterest' );

            $reddit_url = get_the_author_meta( 'actavista_reddit' );

            if ( $facebook_profile || $google_profile || $twitter_profile || $linkedin_profile ) : ?>

            <ul>

              <?php

                  if ( $facebook_profile && $facebook_profile != '' ) {

                    echo '<li><a class="facebook" href="' . esc_url( $facebook_profile ) . '"><i class="fa fa-facebook-f"></i></a></li>';

                }

       

                if ( $google_profile && $google_profile != '' ) {

                    echo '<li><a class="google" href="' . esc_url( $google_profile ) . '" rel="author"><i class="fa fa-google-plus"></i></a></li>';

                }

                

                if ( $twitter_profile && $twitter_profile != '' ) {

                    echo '<li><a class="twitter" href="' . esc_url( $twitter_profile ) . '"><i class="fa fa-twitter"></i></a></li>';

                }

                if ( $linkedin_profile && $linkedin_profile != '' ) {

                    echo '<li><a class="linkedin" href="' . esc_url( $linkedin_profile ) . '"><i class="fa fa-linkedin"></i></a></li>';

                }



                if ( $pinterest_profile && $pinterest_profile != '' ) {

                    echo '<li><a class="pinterest" href="' . esc_url( $pinterest_profile ) . '"><i class="fa fa-pinterest"></i></a></li>';

                }

                if ( $reddit_url && $reddit_url != '' ) {

                    echo '<li><a class="rss" href="' . esc_url( $reddit_url ) . '"><i class="fa fa-reddit-alien"></i></a></li>';

                }

                ?>

            </ul>

        <?php endif; ?>

    </div>  

</div>