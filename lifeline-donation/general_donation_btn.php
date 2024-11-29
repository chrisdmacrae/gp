<?php
if ( !function_exists( 'wpcm_get_settings' ) ) {
	return;
}

$color   = ( $btn_color ) ? 'color:'.esc_attr__($btn_color).';' : '';
$bgcolor = ($btn_bg) ? 'background-color: '.esc_attr__($btn_bg).';' : ''; 

$class = $class__ ? $class__ : '';
$buttonn_label = $btn_label ? $btn_label : esc_html__( 'Donate Now', 'actavista' );
$donation_settings = wpcm_get_settings();
$style 		 = $donation_settings->get('donation_popup_style');

?>

<?php 
if (wpcm_get_settings()->get('donation_general_type') == 'donation_page_template'):

	$url = get_page_link(wpcm_get_settings()->get( 'donation_button_page'));

	$queryParams = array('data_donation' => 'general', 'postId' => '');
	?>

	<a style="<?php echo $color . $bgcolor; ?>" class="<?php echo esc_attr( $class ); ?>"

		href="<?php echo esc_url(add_query_arg($queryParams, $url)); ?>" >

		<?php echo esc_html($buttonn_label); ?>

	</a>

<?php elseif (wpcm_get_settings()->get('donation_general_type') == 'external_link'): ?>

	<a style="<?php echo $color . $bgcolor; ?>" class="<?php echo esc_attr( $class ); ?>"

		href="<?php echo esc_url(wpcm_get_settings()->get('donation_button_linkGeneral')); ?>"

		><?php echo esc_html($buttonn_label); ?></a>

	<?php else: ?>



        <?php $btn_id =  wpcm_get_settings()->get('donation_dummy_page_select') ? wpcm_get_settings()->get('donation_dummy_page_select') : 2; ?>
		<div class="lifeline-donation-app">
			<lifeline-donation-button :id="<?php echo esc_attr($btn_id) ?>" dstyle="<?php echo esc_attr($style) ?>">
										
																
				<a class="<?php echo esc_attr( $class ); ?>  donation-modal-box-callerrrr" href="#"><?php esc_html_e( 'Donate Now', 'actavista' ); ?></a>
			
			</lifeline-donation-button>
		</div>

	<?php endif; ?>




	<?php  wp_enqueue_script( array('select2', 'knob', 'element-ui', 'webinane-donation-modal') ); ?>

