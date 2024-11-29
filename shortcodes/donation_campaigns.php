<?php

 /**

 * Stats File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */


 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );

 $cat = explode( ',', $cat );
 $args = array(
 	'post_type'      => 'cause',
 	'order'          => $order,
 	'posts_per_page' => $number,
 );
 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) == 'all' ) {
 	array_shift( $cat );
 }

 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) != '' )
 	$args['tax_query'] = array( array( 'taxonomy' => 'cause_cat', 'field' => 'slug', 'terms' => (array) $cat ) );
 $query = new WP_Query( $args );
 $title_limit = $title_limit ? $title_limit : 20;
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 }

 if ( $query->have_posts() ) :
 	wp_enqueue_script( array('select2', 'knob', 'element-ui', 'webinane-donation-modal') );
 	$text_limit = $text_limit ? $text_limit : 20; ?>

 	<div class="donation-campaignz lifeline-donation-app">

 		<div class="row">
 			<?php while( $query->have_posts() ) : $query->the_post();  ?>

 				<div class="col-lg-4 col-md-6 col-sm-6">

 					<div class="donation-cbox">

 						<div class="donation-cimg">

 							<figure>
 								<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 									<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 367, 310, true ) ); ?>
 								<?php else : ?>
 									<?php the_post_thumbnail( 'full' ); ?>
 								<?php endif; ?>
 							</figure>
 							<?php $terms = get_the_terms( get_the_ID(), 'cause_cat' ); if($terms): foreach( $terms as $term ) : ?>
 							<a class="donat-cat" href="<?php echo get_term_link( actavista_set( $term, 'term_id' ), 'cause_cat' ); ?>"><?php echo esc_html( actavista_set( $term, 'name' ) ); ?></a>
 						<?php endforeach; endif; ?>
 						
 						<?php if ( $button2 ) : ?>
 							<div class="donation-cbtn">
 								<?php if (wpcm_get_settings()->get('donation_Cpost_type') == 'donation_page_template'): ?>
 									<a class="theme_btn_flat" href="<?php echo esc_url(get_page_link(wpcm_get_settings()->get('donation_Cpost_select'))); ?>" >
 										<?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?>
 									</a>
 								<?php elseif (wpcm_get_settings()->get('donation_template_type_general') == 'external_link'):
 								$url = wpcm_get_settings()->get('donation_Cpost_linkGeneral'); ?>
 								<a class="theme_btn_flat" href="<?php echo esc_url($url) ?>" target="_blank" ><?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?></a>
 							<?php else: ?>
								<?php 
									$donation_settings = wpcm_get_settings();
									$style 		 = $donation_settings->get('donation_popup_style');
								?>
								<lifeline-donation-button :id="<?php echo esc_attr(get_the_id()  ); ?>" dstyle="<?php echo esc_attr($style) ?>">
 								<a data-post="<?php echo esc_attr(get_the_id()) ?>" class="theme_btn_flat donation-modal-box-callerrrr" href="" @click.prevent="showModal($event)" >
 									<?php echo esc_attr( $btn_label ) ? esc_html($btn_label) : esc_html__('DONATE NOW', 'actavista'); ?>
 								</a>
							 </lifeline-donation-button>
 							<?php endif; ?>
 						</div>
 					<?php endif; ?>

 				</div>

 				<div class="donation-ctext">

 					<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h2>
 					<p><?php echo wp_trim_words( get_the_content(), $text_limit, '...' ); ?></p>
 					<?php
 					$meta = get_post_meta( get_the_ID(), 'causes_settings', true );
 					$post = get_post(get_the_ID());

 					$donation_needed = (webinane_set($meta, 'donation')) ? webinane_set($meta, 'donation') : 0;
 					
 					$collect_amt = WebinaneCommerce\Orders::get_items_total($post);
 					if( $collect_amt != 0 && $donation_needed != 0 ) {
 						$donation_percentage = ($collect_amt/$donation_needed)*100;
 					} else {
 						$donation_percentage = 0;
 					}
 					?>
 					<span><i><?php echo esc_attr((int)$donation_percentage); ?>%</i> <?php esc_html_e( 'Donated of ', 'actavista'); ?> <?php echo webinane_cm_price_with_symbol($donation_needed); ?></span>
 					<div class="progress"><div class="progress-bar" style="width: <?php echo esc_attr((int)$donation_percentage); ?>%;"></div></div>

 				</div>		

 			</div>

 		</div>
 	<?php endwhile; wp_reset_postdata(); ?>
 </div>

</div>

<?php endif; ?>