<?php
$post_data = get_post($select_event);
$title = actavista_set( $post_data, 'post_title' );
?>

<div class="<?php echo esc_attr( $show_post_image ) ? 'col-lg-6' : 'col-lg-12'; ?>">

	<div class="counter-timer gray-bg wow fadeIn" data-wow-delay="0.4s">

		<div class="counter-meta">

			<i><img src="<?php echo get_template_directory_uri().'/assets/images/calendar.png'; ?>" alt="<?php echo esc_attr_e( 'calender', 'actavista' ); ?>"></i>

			<span><?php echo wp_kses_post( $subtitle ); ?></span>

			<h3><a href="<?php echo esc_url( actavista_set( $post_data, 'guid' ) ); ?>">

				<?php echo wp_trim_words( $title, $title_limit, '...' ); ?>

			</a></h3>

			<?php if ( $text_limit ) : ?>

				<p><?php $post_data = get_post( $select_event ); echo wp_trim_words( actavista_set( $post_data, 'post_content' ), $text_limit, '...' ); ?></p>

			<?php endif; ?>

			<?php if ( $show_event_counter ) :

			$date = date_create();

			$date_s = get_post_meta( $select_event, 'event_start_date', true );  
			if($date_s) {
				date_timestamp_set($date, $date_s); }?>

				<ul class="countdown">

					<li><p><?php esc_html_e( 'days', 'actavista' ); ?></p> <span class="days">00</span></li>

					<li><span class="dots"></span><p><?php esc_html_e( 'hours', 'actavista' ); ?></p> <span class="hours">00</span></li>

					<li><span class="dots"></span><p><?php esc_html_e( 'minutes', 'actavista' ); ?></p> <span class="minutes">00</span></li>

					<li><span class="dots"></span><p><?php esc_html_e( 'seconds', 'actavista' ); ?></p> <span class="seconds">00</span></li>

				</ul>

				<?php

				wp_enqueue_script( 'downCount' ); 

				$custom_script = 'jQuery(document).ready(function ($) {

					jQuery(".countdown").downCount({

						date: "'.date_format($date, 'm/d/Y H:i:s').'",

						offset: +10

					}); 

				});';



				wp_add_inline_script( 'downCount', $custom_script );

				endif; ?>

			</div>

		</div>

	</div>