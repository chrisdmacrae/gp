<?php
 /**
 * Latest Blog Post File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 $args = array(
 	'numberposts' => 1,
 	'orderby' => 'post_date',
 	'order' => 'DESC',
 );
 $recent_posts = wp_get_recent_posts($args, ARRAY_A);
if( $recent_posts ) : foreach( $recent_posts as $recent_post ) :
 $limit = $title_limit ? $title_limit : 15;
 ?>
 <div style="<?php echo esc_attr( $bg_color ) ? 'background-color:'.$bg_color.'' : ''; ?>" class="subsrb-review-box text-center rss wow fadeIn" data-wow-delay="0.2s">
 	<div class="review-box-inner">
 		<i class="fa fa-rss-square"></i>
 		<p><a href="<?php echo esc_url( actavista_set( $recent_post, 'guid' ) ); ?>"><?php echo wp_trim_words( actavista_set( $recent_post, 'post_title' ), $limit, '...' ); ?></a></p>
 		<span><?php echo human_time_diff( strtotime( actavista_set( $recent_post, 'post_date' ) ), current_time( 'timestamp' ) ) . esc_html__( ' AGO', 'actavista' ); ?></span>
 	</div>
 </div>

<?php endforeach; endif; ?>