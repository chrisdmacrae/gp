<?php
/**
 * Coming Soon Main File.
 *
 * @package actavista
 * @author  Webinane
 * @version 1.0
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php

	$options = actavista_WSH()->option();

	$favicon = $options->get( 'site_favicon', 'url' );

	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

		echo esc_attr( $favicon ) ? '<link rel="icon" type="image/png" href=" ' . esc_url( actavista_set( $favicon, 'url' ) ) . ' ">' : '';

	endif;
	?>

	<?php wp_head(); ?>

</head>


<body itemscope>
	<div class="theme-layout">
		<div class="coming-soon-bg" style="background: url('<?php echo actavista_set( $options->get('comingsoon_background'), 'url' ); ?>') center/cover no-repeat;">
			<div class="coming-soon-content">
				<div class="container">
					<div class="row">
						<?php actavista_template_load( 'templates/custom-posts/comingsoon_top_content.php', compact( 'options') ); ?>
						<div class="col-lg-8 col-md-8 col-sm-12">
							<div class="content-text-area">
								<h2><?php echo wp_kses_post( $options->get( 'comingsoon_page_title' ) ); ?></h2>

								<?php if ( $options->get( 'comingsoon_date' ) ) : ?>
									<?php actavista_template_load( 'templates/custom-posts/comingsoon_counter.php', compact( 'options') ); ?>
								<?php endif; ?>

								<?php if ( $options->get( 'show_comingsoon_subscribe_form' ) ) : ?>
									<?php actavista_template_load( 'templates/custom-posts/comingsoon_subscribe.php', compact( 'options') ); ?>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ( $options->get( 'show_comingsoon_video' ) && $options->get( 'comingsoon_video_link' ) ) : ?>
				<div class="intro-video-sec">
					<a href="<?php echo esc_url( $options->get( 'comingsoon_video_link' ) ); ?>" class="intr-vid html5lightbox"><i class="fa fa-play"></i></a>
					<span><?php echo esc_html( $options->get( 'comingsoon_video_label' ) ); ?></span>
				</div>
			<?php endif; ?>
		</div> 
		
	</div>
	<?php wp_footer(); ?>
</body>

</html>

