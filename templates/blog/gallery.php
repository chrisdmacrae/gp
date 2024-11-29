<?php $explode = explode(',', $gallery); ?>
<?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>
<ul class="gallery-caro">
	<?php foreach( $explode as $gall ) : ?>
		<li>
			<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $gall, 'full' ), $width, 400, true ) ); ?>
			<?php else : ?>
				<?php echo wp_get_attachment_image( $gall, 'full' ); ?>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>

</ul>