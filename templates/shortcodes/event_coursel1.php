<div class="col-lg-8">
	<div class="event-tabs event-slider">
		<div class="tab-content slider-for-event">
			<?php $counter = 0; while ( $query->have_posts() ) : $query->the_post(); 
			$date = date_create();
			$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );  
			$date_e = get_post_meta( get_the_ID(), 'event_event_date', true );  
			date_timestamp_set($date, $date_s);
			$start_date = date_format($date, 'M d , Y');
			$start_time = date_format($date, 'H:i a'); 

			?>
			<div id="home<?php echo esc_attr( $counter ); ?>" class="tab-pane <?php echo esc_attr( $counter == 0 ) ? 'show active' : ''; ?>">
				<?php if ( actavista_meta( 'event_speech', get_the_ID() ) && $video_link = actavista_meta( 'event_speech_video', get_the_ID() )  ) : ?>
					<span class="play-box"><a class="html5lightbox" href="<?php echo esc_url( $video_link ); ?>"><i class="fa fa-play"></i> <?php echo esc_html( actavista_meta( 'event_speech_label', get_the_ID() ) ); ?></a></span>
				<?php endif; ?>
				<div class="event-data">
					<?php if ( $show_event_date && $start_date || $start_time ) : ?>
						<div class="post-information">
							<a href="javascript:void(0)"><?php echo esc_attr( $start_date ); ?></a>
							
							<span><?php echo ( date('h:i A',$date_s) ); ?> - <?php echo ( date('h:i A',$date_e) ); ?></span>
						</div>
					<?php endif; ?>
                    <?php $text_limit= $text_limit ? $text_limit : 20; ?>
					<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h2>
					<p><?php echo wp_trim_words( get_the_content(), $text_limit, '...' ); ?></p>
					<?php if ( $show_event_counter && $start_date ) : ?>
						<ul class="countdown countdownC<?php echo esc_attr( $counter ); ?>">
							<li><p class="days_ref"><?php esc_html_e( 'days', 'actavista' ); ?></p> <span class="days">00</span></li>
							<li><span class="dots"></span><p class="hours_ref"><?php esc_html_e( 'hrs', 'actavista' ); ?></p> <span class="hours">00</span></li>
							<li><span class="dots"></span><p class="minutes_ref"><?php esc_html_e( 'min', 'actavista' ); ?></p> <span class="minutes">00</span></li>
							<li><span class="dots"></span><p class="seconds_ref"><?php esc_html_e( 'sec', 'actavista' ); ?></p> <span class="seconds">00</span></li>
						</ul>
						<?php counter_script( $counter, date_format($date, 'm/d/Y H:i:s') ); ?>
					<?php endif; ?>

					<?php if ( actavista_meta( 'event_location', get_the_ID() ) && $show_event_location ) : ?>
						<span><i><img src="<?php echo get_template_directory_uri().'/assets/images/map-marker.png'; ?>" alt="<?php echo esc_attr_e( 'marker', 'actavista' ); ?>"></i> <?php echo esc_html( actavista_meta( 'event_location', get_the_ID() ) ); ?></span>
					<?php endif; ?>
				</div>	
			</div>
			<?php  $counter++; endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
	
</div>