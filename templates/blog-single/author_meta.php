<div class="post-info">
	<?php if ( $data->get( 'author' ) ) : ?>
		<span>
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 25 );  ?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
		</span>
	<?php endif; ?>

	<?php if ( $data->get( 'date' ) ) : ?>
		<span>                
			<i class="fa fa-calendar-o"></i><?php echo get_the_date( 'F j,  Y' ); ?>
		</span>
	<?php endif; ?>

	<span>                
		<i class="fa fa-comment"></i><?php echo get_comments_number( get_the_ID() ); ?><?php echo ( get_comments_number( get_the_ID() ) > 1 ) ? esc_html__( ' Comments' , 'actavista' ) : esc_html__( ' Comment' , 'actavista' ); ?>
	</span>
	
	<?php if ( $data->get( 'views' ) ) :  actavista_setPostViews( get_the_ID() ); ?>

		<span class="like-views">

			<a href="javascript:void(0)"><i class="fa fa-eye"></i><?php echo actavista_getPostViews( get_the_ID() ); ?></a>

		</span>
	<?php endif; ?>

	<?php if ( $data->get( 'likes' ) ) :

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
		<span>
			<a class="add-to-wishlist" data-loggedin="<?php echo esc_attr( $loggedin) ?>" data-id="<?php the_ID() ?>" href="#"><i class="fa <?php echo esc_attr( $icon ) ?>"></i> <span><?php echo esc_attr( $like_count ) ?></span></a>

			<?php wp_enqueue_script( array( 'sweetalert2', 'like' ) ); ?>
		</span>

	<?php endif; ?>

</div>
