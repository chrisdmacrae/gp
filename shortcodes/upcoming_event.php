<?php
 /**
 * Upcoming Event File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 if ( $select_event ) : 

	if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

 		$img_obj = new ACTAVISTA_Resizer();

 	}

 ?>
 	
	<div class="row merged">

		<?php if ( $show_post_image && $position == 'left' ) : ?>
			<?php actavista_template_load( 'templates/shortcodes/event_image.php', compact( 'select_event', 'position', 'img_obj' ) ); ?>
		<?php endif; ?>

	
		<?php actavista_template_load( 'templates/shortcodes/event_content.php', compact( 'select_event', 'show_post_image', 'subtitle', 'text_limit', 'title_limit', 'show_event_counter' ) ); ?>

		<?php if ( $show_post_image && $position == 'right' ) : ?>
			<?php actavista_template_load( 'templates/shortcodes/event_image.php', compact( 'select_event', 'position', 'img_obj' ) ); ?>
		<?php endif; ?>
	</div>
	
<?php endif; ?>