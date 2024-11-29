<?php
 /**
 * Awards File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $awards = json_decode( urldecode( $add_awards ) );
 
 if ( $awards ) : ?>


	 <div class="custom-awards row">
	 	<?php $counter = 2; foreach ( $awards  as $award ) : ?>

	 		<?php actavista_template_load( 'templates/shortcodes/awards.php', compact( 'award', 'counter' ) ); ?>
	 	
	 	<?php $counter+2; endforeach; ?>
	</div>

<?php endif; ?>