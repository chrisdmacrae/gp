<div class="history-txt">
	
	<h2><?php echo actavista_set( $history, 'title' ); ?></h2>

	<span><?php echo actavista_set( $history, 'year' ); ?></span>

	<p><?php echo wp_kses_post( actavista_set( $history, 'description' ) ); ?></p>
</div>