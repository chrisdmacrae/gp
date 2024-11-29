<?php
 /**
 * Post Tabs File
 *
 * @package Actavista
 * @author  Webinane
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
 	<ul class="nav nav-tabs tab-btn">
 		<li class="nav-item"><a class="active" href="#link1" data-toggle="tab"><?php echo esc_attr( $label ) ? $label : esc_html_e( 'latest', 'actavista' ); ?></a></li>
 		<?php if ( $show_trending_posts_tab ) : ?>
 			<li class="nav-item"><a class="" href="#link2" data-toggle="tab"><?php echo esc_attr( $label2 ) ? $label2 : esc_html_e( 'trending', 'actavista' ); ?></a></li>
 		<?php endif; ?>
 		<?php if ( $show_videos_posts_tab ) : ?>
 			<li class="nav-item"><a class="" href="#link3" data-toggle="tab"><?php echo esc_attr( $label3 ) ? $label3 : esc_html_e( 'videos', 'actavista' ); ?></a></li>
 		<?php endif; ?>
 	</ul>

 	<!-- Tab panes -->
 	<div class="tab-content">
 		
 		<?php actavista_template_load( 'templates/shortcodes/latest_posts.php', compact( 'number', 'order', 'title_limit', 'show_blog_date', 'show_blog_comment', 'img_obj'  ) ); ?>

 		<?php if ( $show_trending_posts_tab ) : ?>
 			<?php actavista_template_load( 'templates/shortcodes/trending_posts.php', compact( 'number', 'order', 'title_limit', 'show_blog_date', 'show_blog_comment', 'img_obj'  ) ); ?>
 		<?php endif; ?>
 		<?php if ( $show_videos_posts_tab ) : ?>
 			<?php actavista_template_load( 'templates/shortcodes/video_posts.php', compact( 'number', 'order', 'title_limit', 'show_blog_date', 'show_blog_comment', 'img_obj'  ) ); ?>
 		<?php endif; ?>
 	</div>									
</div><!-- tab widget -->
</div>