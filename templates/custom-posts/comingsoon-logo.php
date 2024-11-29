<?php

/**
 * Logo Coming soon File
 *
 * @package Actavista
 * @author 	Webiane
 * @version 1.0
 */

$logo_type = $options->get( 'comingsoon_type');

$image_logo =  $options->get( 'comingsoon_logo');

$logo_dimension = $options->get( 'comingsoon_dimension');

$logo_text =  $options->get( 'comingsoon_text');

$logo_typography =  $options->get( 'comingsoon_typography');  ?>

<?php echo actavista_logo( $logo_type, $image_logo, $logo_dimension , $logo_text, $logo_typography ); ?>
