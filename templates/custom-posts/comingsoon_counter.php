<ul class="countdown countdownC0">
	<li><p class="days_ref"><?php esc_html_e( 'days', 'actavista' ); ?></p> <span class="days">00</span></li>
	<li><span class="dots"></span><p class="hours_ref"><?php esc_html_e( 'hrs', 'actavista' ); ?></p> <span class="hours">00</span></li>
	<li><span class="dots"></span><p class="minutes_ref"><?php esc_html_e( 'min', 'actavista' ); ?></p> <span class="minutes">00</span></li>
	<li><span class="dots"></span><p class="seconds_ref"><?php esc_html_e( 'sec', 'actavista' ); ?></p> <span class="seconds">00</span></li>

</ul>
<?php
wp_enqueue_script( 'downCount' ); 


$custom_script = 'jQuery(document).ready(function ($) {

	jQuery(".countdownC0").downCount({
		date: "'.$options->get( 'comingsoon_date' ).'",
		offset: +10
	}); 
});';

wp_add_inline_script( 'downCount', $custom_script );
?>