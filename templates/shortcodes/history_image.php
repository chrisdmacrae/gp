<div class="history-img">
	<figure>

		<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $history, 'history_image' ), 'full' ), 640,470, true ) ); ?>

		<?php endif; ?>

	</figure>

</div>
