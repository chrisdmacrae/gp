<?php $options = actavista_WSH()->option(); 
?>
<footer class="footer3 footer-new" style="background: <?php echo esc_attr( $options->get( 'footer3_color_bg' ) ); ?>">
	<div class="gap no-gap">
		<div class="container">
			<div class="text-center">
				<div class="footer-logo-new">
					<?php
					$logo_type = $options->get( 'footer3_type' );
					$image_logo = $options->get( 'footer3_image_logo' );
					$logo_dimension = $options->get( 'footer3_logo_dimension' );
					$logo_text = $options->get( 'footer3_logo_dimension' );
					$logo_typography = $options->get( 'footer3_logo_typography' ); ?>
					<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
				</div>
				<?php if ($options->get( 'copyright_text' )) : ?>
					<p class="copyrights"><?php echo wp_kses_post( $options->get( 'copyright_text' ) ); ?></p>
				<?php endif; ?>
				<ul class="footer-menu">
					<?php $menu_name = 'footer_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
				</ul>
				<?php if ( $options->get( 'show_header5_sharing' ) ) : ?>
					<ul class="footer3-social-media">
						<?php $icons = $options->get( 'footer_social_share' ); actavista_template_load( 'templates/header/social-icons.php', compact( 'icons' ) ); ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>