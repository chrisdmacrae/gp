<div class="col-lg-6">
	<figure class="election-baner wow fadeIn" data-wow-delay="0.2s">
		<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( $select_event ) , 'full' ), 1065, 725, true ) ); ?>
		<?php else : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>
	</figure>
</div>