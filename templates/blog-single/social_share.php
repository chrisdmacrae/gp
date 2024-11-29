<?php if( $data->get( 'enable_share' ) && $data->get( 'social_share' ) ) : ?>
	<div class="sharing-sidebar">
		<ul class="sharing-bar">          
			<?php foreach ( $data->get( 'social_share' ) as $k => $v) {

				if($v == '') continue;  ?>

				<?php echo actavista_social_share_output( $k );  ?>

			<?php } ?>

		</ul>

	</div>
<?php endif; ?>