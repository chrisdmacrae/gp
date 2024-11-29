<?php

 /**

 * Team File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */



 $atts = vc_map_get_attributes( $tag, $atts );



 extract( $atts );



 $add_teams = json_decode( urldecode( $add_team ) );

 

 if ( $add_teams ) : ?>

 <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

 	$img_obj = new ACTAVISTA_Resizer();

 }

 if ( $width && $height ) {

 	$custom_width  =  $width;

 	$custom_height = $height;

 } else {

 	$custom_width   = ( $columns == 'col-lg-6' ) ? 550 : 360;

 	$custom_height  = ( $columns == 'col-lg-6' ) ? 450 : 350;



 }


 ?>

 <div class="row merged <?php echo esc_attr($style); ?> <?php echo esc_attr( $enable_bottom_space ) ? 'team-bottom-gap' : ''; ?>">

	<?php  
 	$title_font = getFontsData( $title_font );
 	enqueueGoogleFonts($title_font);
   
 	$title_font_inline_style = googleFontsStyles( $title_font ) ? googleFontsStyles( $title_font ) : '';
?>
 	<?php 
 	$title2_font = getFontsData( $title2_font );
 	enqueueGoogleFonts($title2_font);
 	$title2_font_inline_style =  $title2_font ? googleFontsStyles( $title2_font ) : '';

  ?>
 	<?php $counter = 2; foreach ( $add_teams  as $team ) : ?>


 	<?php actavista_template_load( 'templates/shortcodes/team.php', compact( 'team', 'counter', 'columns', 'img_obj', 'custom_height', 'custom_width', 'title_size', 'title_font_inline_style',  'title_color', 'enable_title_typo', 'title2_size', 'title2_font_inline_style',  'title2_color', 'enable_title2_typo' ) ); ?>



 	<?php $counter+2; endforeach; ?>

 </div>



<?php endif; ?>