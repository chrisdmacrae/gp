<?php if ( $data->get( 'views' ) || $data->get( 'likes' ) ) : ?>
	<div class="like-views">

		<?php if ( $data->get( 'views' ) ) : 

			actavista_setPostViews( get_the_ID() );

		?> 

			<a href="javascript:void(0)"><i class="fa fa-eye"></i><?php echo actavista_getPostViews( get_the_ID() ); ?></a>

		<?php endif; ?>



		<?php

			if ( $data->get( 'likes' ) ) :

				$current_user = wp_get_current_user();

				$loggedin = ( is_user_logged_in() ) ? '1' : '0'; 



				if ( $current_user ) {

					$meta = (array) get_user_meta( $current_user->ID, 'wishlist', true );

				} else {

					$meta = array();

				}

				$like_count = (int) get_post_meta( get_the_id(), 'post_favorite_count', true );

				$icon       = ( in_array(get_the_id(), $meta) ) ? 'fa-thumbs-up' : 'fa-thumbs-o-up';



			?>



			<a class="add-to-wishlist" data-loggedin="<?php echo esc_attr( $loggedin) ?>" data-id="<?php the_ID() ?>" href="#"><i class="fa <?php echo esc_attr( $icon ) ?>"></i> <span><?php echo esc_attr( $like_count ) ?></span></a>



			<?php wp_enqueue_script( array( 'sweetalert2', 'like' ) ); ?>

		<?php endif; ?>

	</div>
<?php endif; ?>