<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">
	<div class="our-events wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">

		<?php 
		if ( $show_event_location  ) : 
			actavista_template_load( 'templates/custom-posts/event_location.php' );
		endif; 
		?>


		<figure>
			<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 370, $height, true ) ); ?>
			<?php endif; ?>
		</figure>


		<div class="event-info">
			
			<?php $start_date  =  get_post_meta( get_the_ID(), 'event_start_date', true );

			if ( $show_event_date && $start_date ) : ?>
			
			<div class="event-date">
				<?php 
				$date = date_create();
				$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );  
			
				date_timestamp_set($date, $date_s);
				$start_date = date_format($date, 'd M Y');
				$date_e = get_post_meta( get_the_ID(), 'event_event_date', true );  
	
				?>

				<span class="date"><?php echo esc_attr( $start_date ); ?></span>
				<span class="time"><?php echo ( date('h:i A',$date_s) ); ?> - <?php echo ( date('h:i A',$date_e) ); ?></span>
			</div>
		<?php endif; ?>

		
		<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>



		<p><?php echo wp_trim_words( get_the_content(), $text_limit, '...' ); ?></p>

	</div>	
</div>
</div>