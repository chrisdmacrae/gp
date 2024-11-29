<div class="<?php echo esc_attr( $options->get( 'events_listing_style' ) ); ?> col-sm-6">
	<div class="our-events wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">

		<?php 
			if ( $options->get( 'events_location' )  ) : 
				actavista_template_load( 'templates/custom-posts/event_location.php' );
			endif; 
		?>


		<figure>
			<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 370, 250, true ) ); ?>
			<?php endif; ?>
		</figure>


		<div class="event-info">
			
			<?php $start_date  =  get_post_meta( get_the_ID(), 'event_start_date', true );

			if ( $options->get( 'events_date' ) && $start_date ) : ?>
			
				<div class="event-date">
					<?php 
						$date = date_create();
						$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );  
						date_timestamp_set($date, $date_s);
						$start_date = date_format($date, 'M d , Y');
						$start_time = date_format($date, 'H:i a'); 
					?>

					<span class="date"><?php echo esc_attr( $start_date ); ?></span>
					<span class="time"><?php echo esc_attr( $start_time ); ?></span>
				</div>
			<?php endif; ?>
			
			<?php $title_option = $options->get( 'event_title_limit_option' );
				$ch_limit = $options->get( 'events_title_limit' );
				$word_limit = $options->get( 'events_title_limit2' );
				if ( $title_option && get_the_title() ) :
			?>
					<h4><a href="<?php the_permalink(); ?>"><?php echo ( actavista_post_title( $title_option, $word_limit, $ch_limit, get_the_title() ) ); ?></a></h4>
			<?php endif; ?>

			<?php $content_option = $options->get( 'event_content_limit_option' );
			$ch_limit2 = $options->get( 'events_content_limit' );
			$word_limit2 = $options->get( 'events_content_limit2' );
			if ( $content_option && get_the_content() ) :
				?>
				<p><?php echo ( actavista_post_title( $content_option, $word_limit2, $ch_limit2, get_the_content() ) ); ?></p>
			<?php endif; ?>



		</div>	
	</div>
</div>