<?php $loation  =  get_post_meta( get_the_ID(), 'event_location', true ); 
if ( $loation ) :
?>
<div class="tag">
	<i class="fa fa-map-marker"></i> 
	<span><?php echo esc_html( $loation ); ?></span>
</div>
<?php endif; ?>