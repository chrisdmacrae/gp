<?php

 /**

 * Leader Quote File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
?>

<div class="row">

 		<?php

 		if ( $leader_img && $text_position == 'right' ) :

 			actavista_template_load( 'templates/shortcodes/leader_image.php', compact( 'leader_img' ) );

 		endif; 

 		

 		actavista_template_load( 'templates/shortcodes/leader_quote.php', compact( 'leader_img','leader_quote', 'sign_img', 'text', 'button', 'help_link', 'enable_button_typo',  'button_css', 'atts', 'button_size', 'button_font',  'button_color' , 'text_size', 'text_font',  'text_color', 'title_size', 'title_font',  'title_color', 'enable_title_typo', 'enable_text_typo'  ) );





 		if ( $leader_img && $text_position == 'left' ) :

 			actavista_template_load( 'templates/shortcodes/leader_image.php', compact( 'leader_img' ) );

 		endif;

 		?>
 		</div>
