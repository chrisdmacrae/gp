<?php
 /**
 * Awards2 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
  $awards = json_decode( urldecode( $add_awards ) );
 ?>

 <div class="col-md-12">
 	<div class="pre-awards-list">
 		<?php echo esc_html( $title ) ? '<h3>'.$title.'</h3>' : ''; ?>
 		<ul>
 			<?php foreach( $awards as  $award ) : ?>
	 			<li>
	 				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/award-list-icon.png" alt="<?php esc_attr_e( 'icon', 'actavista' ); ?>">
	 				<span class="award-year2"><?php echo actavista_set( $award, 'year' ); ?></span>
	 				<span class="award-desc"><?php echo wp_kses_post( actavista_set( $award, 'text' ) ); ?></span>
	 			</li>
			<?php endforeach; ?>
 		</ul>
 	</div>
 </div>
