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

 ?>

 <div class="row">

 	<?php $counter =0; while( $query->have_posts() ) : $query->the_post();  ?>

 	<?php if( $counter == 0 ) : ?>

 		<div class="col-lg-6 col-md-12">

 			<div class="blog-main-post">

 				<div class="blog-main-img">

 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 571, 470, true ) ); ?>

 					<?php endif; ?>
 					<div class="blog-main-info">

 						<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h2>

 						<div class="blog-meta-new">

 							<ul>
 								<?php if ( $show_date ) : ?>	
 									<li><a class="meta-date" href="<?php the_date('Y/m/d'); ?>"><?php echo get_the_date('d M Y'); ?></a></li>
 								<?php endif; ?>
 								<?php if ( $show_author ) : ?>	
 									<li><span><?php esc_html_e( 'By ', 'actavista' ); ?> </span><?php the_author_link(); ?></li>
 								<?php endif; ?>
 							</ul>

 						</div>

 					</div>

 				</div>

 			</div>

 		</div>

 	<?php else : ?>

 		<?php echo esc_attr( $counter == 1 ) ? '<div class="col-lg-6 col-md-12">' : ''; ?>

 			<div class="blog-mini-post">

 				<div class="blog-mini-img">

 
 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 147, 116, true ) ); ?>

 					<?php endif; ?>

 				</div>

 				<div class="blog-mini-info">

 					<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h2>

 					<div class="blog-mini-meta">

 						<ul>
 							<?php if ( $show_date ) : ?>	
 								<li><a class="meta-date" href="<?php the_date('Y/m/d'); ?>"><?php echo get_the_date('d M Y'); ?></a></li>
 							<?php endif; ?>
 							<?php if ( $show_author ) : ?>	
 								<li><span><?php esc_html_e( 'By ', 'actavista' ); ?> </span><?php the_author_link(); ?></li>
 							<?php endif; ?>
 						</ul>

 					</div>

 				</div>

 			</div>

 			<?php echo esc_attr($counter == 3 ) ? '</div>' : ''; ?>



 		<?php endif; ?>

 		<?php $counter++; 

 		if ($counter == 4) {

 			$counter = 0;

 		} 

 		endwhile; wp_reset_postdata(); ?>

 		
 </div>