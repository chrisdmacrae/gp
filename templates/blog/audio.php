 <?php 
    /**

     * Single Audio File.

     * @package Actavista

     * @author  Webinane

     * @version 1.0

     */
    $page_id =  get_the_ID();
    $soundcloud  = get_post_meta( $page_id, 'actavista_soundcloud_track_id', true );

    $own_audio   = get_post_meta( $page_id, 'actavista_own_audio', true );

    ?>

    <div class="singlee audio">

        <?php if ( $soundcloud && $audio_type == 'SoundCloud' ) : ?>
          
          	<?php $protocol =  is_ssl() ? 'https' : 'http'; ?>

     		<iframe src="<?php echo esc_attr( $protocol ); ?>://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo esc_attr( $soundcloud ) ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
    	
    	<?php elseif( $own_audio && $audio_type == 'Own Audio' ) :

    		wp_enqueue_script( array( 'wp-mediaelement' ) );


			echo do_shortcode( '[audio src="' . esc_url( $own_audio ) . '"]' );
		?>

  		<?php endif; ?>

	</div>