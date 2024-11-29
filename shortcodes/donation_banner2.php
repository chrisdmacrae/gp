<?php

 /**

 * Custom Services File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */
$donation_settings = wpcm_get_settings();
 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 $post = get_page_by_path( $select_donation_form, '', 'cause' );
 
 $meta = get_post_meta( actavista_set(  $post, 'ID' ), 'causes_settings', true );

 $donation_needed = (actavista_set($meta, 'donation')) ? actavista_set($meta, 'donation') : 0;

 $collect_amt = WebinaneCommerce\Orders::get_items_total($post);

 if( $collect_amt != 0 && $donation_needed != 0 ) {
 	$donation_percentage = ($collect_amt/$donation_needed)*100;
 } else {
 	$donation_percentage = 0;
 }
 $style 		 = $donation_settings->get('donation_popup_style');
$title_limit = $title_limit ? $title_limit : 10;
$text_limit = $text_limit ? $text_limit : 20;
wp_enqueue_script( array('select2', 'knob', 'element-ui', 'webinane-donation-modal') ); 
?>
 <div class="row">

 	<div class="col-lg-12">

 		<div class="donation-form-banner text-center">
 			<div class="main-title text-center">
 				<span><?php echo wp_kses_post( $tagline ); ?></span>
 				<h3><?php echo wp_trim_words( actavista_set(  $post, 'post_title' ), $title_limit, '...' ); ?></h3>

 			</div>

 			<div class="donation-target-wrap">
 				<?php if ( $enable_donation_info ) : ?>
 					
 					<div class="donation-target-inner">
 						<i class="fa fa-heart"></i>
 						<div class="donation-collection"><?php echo webinane_cm_price_with_symbol($collect_amt); ?><span><?php esc_html_e( 'Charity Collection', 'actavista' ); ?></span></div>
 						<div class="donation-collection"><?php echo webinane_cm_price_with_symbol($donation_needed); ?><span><?php esc_html_e( 'Target Needed', 'actavista' ); ?></span></div>
 						<div class="progress"><div class="progress-bar" style="width: <?php echo esc_attr( (int)$donation_percentage ); ?>%;"><span><?php echo esc_attr( (int)$donation_percentage ); ?>%</span></div></div>
 					</div>
 				<?php endif; ?>
 				<p><?php echo wp_trim_words( actavista_set(  $post, 'post_content' ), $text_limit, '...' ); ?></p>


 				<?php if ( $button ) : ?>
 					<div class="donation-cbtn lifeline-donation-app">
 						<?php if ($button_type == 'detail_page'): ?>
 							<a class="theme_btn_flat" href="<?php echo get_the_permalink(actavista_set( $post, 'ID' )); ?>" >
 								<?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?>
 							</a>
 						<?php elseif ($button_type == 'redirect_ext'):
 						$url = wpcm_get_settings()->get('donation_Cpost_linkGeneral'); ?>
 						<a class="theme_btn_flat" href="<?php echo esc_url($url) ?>" target="_blank" ><?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?></a>
 					<?php else: ?>
 						<lifeline-donation-button :id="<?php echo esc_attr( actavista_set(  $post, 'ID' ) ); ?>" dstyle="<?php echo esc_attr($style) ?>" >
	 						<a data-post="<?php echo esc_attr( actavista_set(  $post, 'ID' ) ); ?>" class="theme_btn_flat donation-modal-box-callerrrr" href="" @click.prevent="showModal($event)" >
	 							<?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?>
	 						</a>
 						</lifeline-donation-button>
 					<?php endif; ?>
 				</div>
 			<?php endif; ?>
 		</div>
 	</div>
 </div>
</div>
