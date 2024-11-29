<?php

 /**

 * Event Carousel File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */

 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 $cat = explode( ',', $cat );

 $args = array(

 	'post_type'      => 'post',

 	'order'          => $order,

 	'posts_per_page' => $number,

 );

 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) == 'all' ) {

 	array_shift( $cat );

 }
 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) != '' )

 	$args['tax_query'] = array( array( 'taxonomy' => 'category', 'field' => 'slug', 'terms' => (array) $cat ) );

 $query = new WP_Query( $args );

 $title_limit = $title_limit ? $title_limit : 20;

 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
}

 if( $columns == 'col-lg-6' ) {

 	$width = $width ? $width : 545;

 	$height = $height ? $height : 325;

 } else {

 	$width = $width ? $width : 350;

 	$height = $height ? $height : 235;

 }



 ?>


  <?php echo wp_kses_post( $main_title ) ? '<h4 class="single-title">'.$main_title.'</h4>' : ''; ?>

 <?php if ( $query->have_posts() ) : ?>

 	<div class="row">

	 	<?php while( $query->have_posts() ) : $query->the_post(); ?>

	 		<?php $format = get_post_format( get_the_ID() ); ?>

		 	<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">

		 		<div class="news-post wow fadeIn" data-wow-delay="0.2s">

		 			<figure>

		 				<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

		 					<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), $width, $height, true ) ); ?>

		 				<?php else : ?>

		 					<?php the_post_thumbnail( 'full' ); ?>

		 				<?php endif; ?>

		 				<?php if ( $show_format_icn ) : ?>

		 				<?php if ( $format == 'audio' ) {

		 					$class = 'fa-headphones';

		 				} elseif ( $format == 'video' ) {

		 					$class = 'fa-play-circle';

		 				} elseif ( $format == 'gallery' ) {

		 					$class = 'fa-th';

		 				} else {

		 					$class = 'fas fa-image';

		 				}



		 				?>

		 				<a href="javascript:void(0)"><i class="fa <?php echo esc_attr( $class ); ?>"></i></a>

		 			<?php endif; ?>

		 			</figure>

		 			<div class="news-meta">

		 				<ul>

		 					<?php if ( $show_blog_date ) : ?>

		 						<li><a href="<?php get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date('d M Y'); ?></a></li>

		 					<?php endif; ?>

		 					<?php if ( $show_blog_author ) : ?>

		 						<li class="byautor"><span><?php esc_html_e( 'By ', 'actavista' ); ?></span><?php the_author_link(); ?></li>

		 					<?php endif; ?>

		 				</ul>

		 				<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h2>

		 				<?php if ( $show_blog_date ) : ?>

			 				<div class="tag-cloud">

			 					<span><i class="fa fa-tag"></i></span>

			 					<?php the_category(','); ?>

			 				</div>

			 			<?php endif; ?>

		 			</div>

		 		</div>

		 	</div>

		 <?php endwhile; wp_reset_postdata(); ?>

	</div>

 <?php endif; ?>

