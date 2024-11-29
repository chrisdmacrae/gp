<div class="col-lg-4">
	<div class="eventor">
	<?php if ( $title ) : ?>
		<span><i><img src="<?php echo get_template_directory_uri().'/assets/images/icon5_new.png'; ?>" alt="<?php echo esc_attr__( 'marker', 'actavista'  ); ?>"></i><?php echo esc_html( $title ); ?></span>
	<?php endif; ?>

	<div class="event-scroll mCustomScrollbar">

		<ul class="nav slider-nav-event">
			<?php $counter = 0;  while ( $query->have_posts() ) : $query->the_post(); 
			$date = date_create();
			$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );  
			date_timestamp_set($date, $date_s);
			$start_date = date_format($date, 'M d , Y');
			$start_time = date_format($date, 'H:i a'); 
			$date_e = get_post_meta( get_the_ID(), 'event_event_date', true );  
			?>
	
		  <li>
		  	<?php if ( actavista_meta( 'event_location', get_the_ID() ) && $show_event_location ) : ?>
				<span><i><img src="<?php echo get_template_directory_uri().'/assets/images/loco-new-icon.png'; ?>" alt="<?php echo esc_attr__( 'marker', 'actavista'  ); ?>"></i> <?php echo esc_html( actavista_meta( 'event_location', get_the_ID() ) ); ?></span>
			<?php endif; ?>
		  	<a data-toggle="tab" href="#home<?php echo esc_attr($counter); ?>"><h4><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></h4></a>
		  	<?php if ( $show_event_date && $start_date || $start_time ) : ?>
				<i><?php echo ( date('h:i a',$date_s) ); ?> - <?php echo ( date('h:i a',$date_e) ); ?></i>
			<?php endif; ?>
		  </li>

		 
		  <?php $counter++; endwhile; wp_reset_postdata(); ?>

		</ul>
	</div>
	</div>
</div>