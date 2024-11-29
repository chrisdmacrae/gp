<?php 
/**
 * Single Event Main File.
 *

 * @package Actavista
 * @author  Webinane
 * @version 1.0
*/
get_header(); 

$options = actavista_WSH()->option();

$data = \Actavista\Includes\Classes\Common::instance()->data('servicesingle')->get();

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}

$class = ( $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-sm-12 col-md-12 col-lg-8' : 'col-md-12';
$page_meta =  get_post_meta( get_the_ID(), 'causes_settings', true );
$donation_needed = (webinane_set($page_meta, 'donation')) ? webinane_set($page_meta, 'donation') : 0;
$collect_amt = WebinaneCommerce\Orders::get_items_total($post);
if( $collect_amt != 0 && $donation_needed != 0 ) {
	$donation_percentage = ($collect_amt/$donation_needed)*100;
} else {
	$donation_percentage = 0;
}
do_action( 'actavista_banner' , $data );  ?>
<section>
	<div class="gap  post-detail-page" data-id="<?php the_ID() ?>">
		<div class="container">
			<div class="row">
				<?php do_action( 'actavista_sidebar', 'left', $data ); ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php while( have_posts() ) : the_post();  ?>
						<div class="donation-wrapper">
							<div class="">
								<div class="container">
									<div class="donation-wrapper-content">
										<figure>
											<?php the_post_thumbnail( 'full' ); ?>
												<div class="donation-target-inner">
													<i class="fa fa-heart"></i>
													<div class="donation-collection">
														<?php echo webinane_cm_price_with_symbol($collect_amt); ?><span><?php esc_html_e( 'Donation Collected', 'actavista'); ?></span>
													</div>   
													<div class="donation-collection">
														<?php echo webinane_cm_price_with_symbol($donation_needed); ?><span><?php esc_html_e( 'Donation Needed', 'actavista'); ?></span>
													</div>
													<div class="progress">
														<div class="progress-bar" style="width: <?php echo esc_attr( (int)$donation_percentage ); ?>%;"><span><?php echo esc_attr( (int)$donation_percentage ); ?>%</span></div>
													</div>
												</div>
										</figure>

										<div class="row">
											<div class="<?php echo (  $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-lg-12' : 'col-lg-10 offset-lg-1'; ?>">
												<div class="donation-top">
													<div class="row">
														<div class="col-lg-12">
															<div class="donation-info">
																<h2><?php the_title(); ?></h2>
																<?php $terms = get_the_terms( get_the_ID(), 'cause_cat' ); ?>
																<?php if( $terms ) : ?>
                                                                    <span><?php esc_html_e( 'Posted in:', 'actavista'); ?> 
                                                                    <?php  foreach( $terms as $term ) : ?>
                                                                        <a href="<?php get_term_link( actavista_set( $term, 'term_id' )  ); ?>"><?php echo actavista_set( $term, 'name' ); ?></a>
															        <?php endforeach; ?> </span>  
															<?php endif; ?>
															
															</div>
														</div>
														<div class="<?php echo (  $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-lg-12' : 'col-lg-10 offset-lg-1'; ?>">
														
														</div>
													</div>
													<div class="d-desc">
														<p><?php the_content(); ?></p>
													</div>
												</div>
												<?php 
													$donation_settings = wpcm_get_settings();
													$style 		 = $donation_settings->get('donation_popup_style');
												?>
												<div class="donation-payment-area text-center">
												
													<?php if (wpcm_get_settings()->get('donation_Cpost_type') == 'donation_popup_box' ) : ?>
														<div class="lifeline-donation-app" >
															<lifeline-donation-button :id="<?php echo esc_attr(get_the_ID()) ?>" dstyle="<?php echo esc_attr($style) ?>">
									
															
																<a class="theme_btn_flat donation-modal-box-callerrrr" href="#"><?php esc_html_e( 'Donate Now', 'actavista' ); ?></a>
														
														</lifeline-donation-button>
														


														</div>
													<?php elseif( wpcm_get_settings()->get('donation_Cpost_type') == 'external_link' ) : ?>
														<a class="theme_btn_flat" href="<?php echo esc_url(wpcm_get_settings()->get('donation_button_link')); ?>"><?php esc_html_e( 'Donate Now', 'actavista' ); ?></a>
													
													<?php else : ?>
									



													<?php endif; ?>

											
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php do_action( 'actavista_sidebar', 'right', $data ); ?>
</div>
</div>
</div>
</section>
<?php  wp_enqueue_script( array('select2', 'knob', 'element-ui', 'lifeline-donation-modal') ); get_footer(); ?>