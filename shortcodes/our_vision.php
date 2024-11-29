<?php

 /**

 * Custom Services File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */



 $atts = vc_map_get_attributes( $tag, $atts );



 extract( $atts );



 $visions = json_decode( urldecode( $add_visions ) );

 

 if ( $visions ) : ?>

<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

    $img_obj = new ACTAVISTA_Resizer();

}



$width  = ( $columns == 'col-lg-6' ) ? 550 : 350;

$height  = ( $columns == 'col-lg-6' ) ? 490 : 490;



?>

<div class="vision-boxes">

	<div class="row">
	
	 	<?php foreach ( $visions  as $vision ) : ?>



	 		<?php actavista_template_load( 'templates/shortcodes/our_vision.php', compact( 'vision', 'columns', 'img_obj', 'height', 'width' ) ); ?>



	 	<?php endforeach; ?>

	</div>

</div>

<?php endif; ?>