<?php

/**
 * Top Stories Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 } 
?>
<div class="sidebar">
<div class="widget">
	<?php if ( $title ) : ?>
		<div class="widget-title">
			<h4><?php echo esc_html( $title ); ?></h4>
		</div>
	<?php endif; ?>
	<?php 
	$popularpost = new WP_Query( 
		array( 
			'posts_per_page' => $number, 
			'meta_key'       => 'post_views_count', 
			'orderby'        => 'meta_value_num', 
			'order'          => $order  
		)
	);

	if ($popularpost->have_posts()) : ?>
	<div class="top-stories">
		
		<ul class="thumb-list-post">
			<?php 
			$counter = 0; while ( $popularpost->have_posts() ) : $popularpost->the_post();
			$width = ( $counter == 0 ) ? 290 : 90;
			$height  = ( $counter == 0 ) ? 200 : 80;
			?>
			<?php $format = get_post_format( get_the_ID() ); ?>
			<?php if ( $format == 'audio' ) {
				$class = 'fa-headphones';
			} elseif ( $format == 'video' ) {
				$class = 'fa-play-circle-o';
			} elseif ( $format == 'gallery' ) {
				$class = 'fa-th';
			} else {
				$class = 'fa-picture-o';
			}
			?>
			<li <?php echo esc_attr( $counter == 0 ) ? 'class="topstory-big"' : ''; ?>>
				<figure <?php echo esc_attr( $counter != 0 ) ? 'class="thumb"' : ''; ?>>
					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), $width, $height, true ) ); ?>
					<?php else : ?>
						<?php the_post_thumbnail( 'full' ); ?>
					<?php endif; ?>
					<i class="fa <?php echo esc_attr( $class ); ?>"></i>
				</figure>
				<div>
					<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>
				</div>	
			</li>
			<?php $counter++; endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
<?php endif; ?>
</div><!-- top stories -->
</div>