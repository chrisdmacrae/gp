<ul class="countdown even-countdown">

  <li>
      <span class="days">00</span>
      <p class=""><?php esc_html_e( 'days', 'actavista' ); ?></p> 
  </li>

  <li>
      <span class="hours">00</span>
      <p class=""><?php esc_html_e( 'hours', 'actavista' ); ?></p> 
  </li>

  <li>
      <span class="minutes">00</span>
      <p class=""><?php esc_html_e( 'minutes', 'actavista' ); ?></p>
  </li>

  <li> 
      
      <span class="seconds">00</span>
      <p class=""><?php esc_html_e( 'seconds', 'actavista' ); ?></p>
  </li>

</ul>

<?php
  
  
  $custom_script = 'jQuery(document).ready(function ($) {

    jQuery(".countdown").downCount({
    date: "'.date_format($date, 'm/d/Y H:i:s').'",
    offset: +10
  }); 
  });';

  wp_add_inline_script( 'downCount', $custom_script );
 
  ?>