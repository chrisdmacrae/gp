<?php

/**
 * Cases Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts );
$cats = explode( ',', $cat );
$args = array(
	'post_type'      => 'post',
	'order'          => $order,
	'posts_per_page' => $number,
);
if ( ! empty( $cats ) && actavista_set( $cats, 0 ) == 'all' ) {
	array_shift( $cats );
}

if ( ! empty( $cats ) && actavista_set( $cats, 0 ) != '' ){

	$args['tax_query'] = array( array( 'taxonomy' => 'category', 'field' => 'slug', 'terms' => (array) $cats ) );

}
$query = new WP_Query( $args );

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}

if ( $query->have_posts() ) :
	wp_enqueue_script( array( 'slick', 'script' ) ); 
	$title_limit = ( $title_limit ) ? $title_limit : 20; ?>
	<div class="speeches-wrapper">

		<div class="tab-content">
			<?php $counter =0; while( $query->have_posts() ) : $query->the_post(); ?>
			<?php $format = get_post_format( get_the_ID() ); ?>
			<?php if ( $format == 'audio' ) {
				$class = 'fa-headphones';
			} elseif ( $format == 'video' ) {
				$class = 'fa-play';
			} elseif ( $format == 'gallery' ) {
				$class = 'fa-th';
			} else {
				$class = 'fa-picture-o';
			}
			?>
			<div class="tab-pane fade <?php echo esc_attr( $counter == 0 ) ? 'show active' : '';?>" id="speech-tab<?php echo get_the_ID(); ?>">
				<div class="speech-box">
					
					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
						<?php $img = get_post_meta( get_the_ID(), 'featured_bg_img_id', true ); ?>
						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url($img, 'full' ), 1920, 750, true ) ); ?>
					<?php endif; ?>

					<div class="speech-info">
						<a href="javascript: void(0)">
							<?php if ( $show_icon ) : ?>
								<i class="fa <?php echo esc_attr( $class ); ?> theme-bg"></i>
							<?php endif; ?>
							
							<?php echo esc_attr( $format ); ?>

							
						</a>
						<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<p><?php //echo get_the_content(); ?><?php echo wp_trim_words( get_the_content(), $content_limit, '...' ); ?></p>
					</div>
				</div>
			</div>
			<?php $counter++; endwhile; wp_reset_postdata(); ?>

		</div>
		<div class="speeches-nav-wrapper">
			<div class="speeches-nav-innr overlap90">
				<div class="speeches-nav-car">
					
					<?php $counter = 0; while( $query->have_posts() ) : $query->the_post(); ?>
					<?php $format = get_post_format( get_the_ID() ); ?>
					<?php if ( $format == 'audio' ) {
						$class = 'fa fa-headphones';
					} elseif ( $format == 'video' ) {
						$class = 'fa fa-play-circle';
					} elseif ( $format == 'gallery' ) {
						$class = 'fa fa-th';
					} else {
						$class = 'fas fa-image';
					}
					?>

					<?php echo esc_attr( $counter == 0 ) ? '<ul class="nav nav-tabs">' : ''; ?>
						<li class="nav-item">
							<a class="nav-link <?php echo esc_attr( $counter == 0 ) ? 'active' : '';?>" data-toggle="tab" href="#speech-tab<?php echo get_the_ID(); ?>">
								<div class="speech-nav-box">
									<span class="speech-date">
										<?php if ( $show_icon ) : ?>
											<i class="fa <?php echo esc_attr( $class ); ?> theme-clr"></i>
										<?php endif; ?>
										<?php if ( $show_date ) : ?>
											<?php echo get_the_date( 'M d, Y' ); ?>
										<?php endif; ?>
									</span>
									<h4><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></h4>
								</div>
							</a>
						</li>

						<?php  echo esc_attr( $counter == 2 ) ? '</ul>' : '';  $counter++; 

						if ( $counter == 3  ) $counter = 0;
						
						endwhile; wp_reset_postdata(); ?>

				
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>