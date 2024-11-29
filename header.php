<?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 * @package Actavista

 * @since 1.0

 * @version 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js no-svg mycustom">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php  wp_head(); ?>

</head>

<body <?php  body_class(); ?>>
	
	<?php  $options = actavista_WSH()->option(); ?>
	
	<?php $boxed = ( $options->get( 'boxed_layout_status') == 1 ) ? ' boxed' : ''; ?>

	<?php $boxed_margin = ( $options->get( 'boxed_layout_status' ) == 1 && $options->get( 'boxed_top' ) != "" ) ? 'margin-top:' . esc_attr( $options->get( 'boxed_top' ) ) . 'px;' : ''; ?>

	<?php $boxed_margin .= ( $options->get( 'boxed_layout_status' ) == 1 && $options->get( 'boxed_bottom' ) != "" ) ? 'margin-bottom:' . esc_attr( $options->get( 'boxed_bottom' ) ) . 'px;' : '';  ?>
	<?php if( $options->get( 'page_loader' ) ): ?>
		<div class="page-loader">
	        <div class="l_main">
	          <div class="l_square"><span></span><span></span><span></span></div>
	          <div class="l_square"><span></span><span></span><span></span></div>
	          <div class="l_square"><span></span><span></span><span></span></div>
	          <div class="l_square"><span></span><span></span><span></span></div>
	        </div>
	    </div>
    <?php endif; ?>
	<div class="theme-layout<?php echo esc_attr( $boxed ) ?>" style="<?php echo esc_attr( $boxed_margin ) ?>">

		<?php do_action( 'actavista_main_header' ); ?>

		<?php actavista_template_load( 'templates/header/responsive_header.php', compact( 'options' ) ); ?>