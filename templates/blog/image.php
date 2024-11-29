<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

	<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, 460, true ) ); ?>
<?php else : ?>
	<?php the_post_thumbnail( 'full' ); ?>
<?php endif; ?>