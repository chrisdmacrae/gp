<?php $options = actavista_WSH()->option(); ?>
 <?php wp_enqueue_script( array( 'actavista-scrol','script' ) ); ?>
<div class="responsive-header">
	<div class="res-items-bar">
		<div class="res-logo">
			<?php
			$logo_type = $options->get( 'responsive_logo_type' );

			$image_logo = $options->get( 'responsive_logo_image' );

			$logo_dimension = $options->get( 'responsive_logo_dimension' );

			$logo_text = $options->get( 'responsive_logo_text' );

			$logo_typography = $options->get( 'responsive_logo_typography' ); ?>

			<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>

		</div>
		<div class="res-items-list">
			<?php if ( $options->get( 'show_responsive_search' ) || $options->get( 'show_responsive_login' ) ) : ?>
				<div class="res-items">
					<?php if ( $options->get( 'show_responsive_search' ) ) : ?>
						<a href="#" class="res-searc-btn"><i class="fa fa-search"></i></a>
					<?php endif; ?>
					<?php if ( $options->get( 'show_responsive_login' ) && !is_user_logged_in() ) : ?>
						<a href="#"  class="res-login-btn"><i class="fa fa-user-o"></i></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<a href="#"  class="res-menu-btn"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</div>
<div class="res-menu-wrapper">
	<a class="res-clos-btn" href="#"><i class="fa fa-times"></i></a>
	<div class="scroll-wrapper mCustomScrollbar">
		<div class="res-menu-list">
			<ul class="menu-scroll">
				<?php  $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
			</ul>
		</div>
		<div class="res-footer-info">
			<?php if ( $options->get( 'show_info1' ) || $options->get( 'show_info2' ) ) : ?>
				<div class="res-info">

					<ul>
						<?php if ( $options->get( 'show_info1' ) ) : ?>
							<li><span class="bold-info"><?php echo wp_kses_post( $options->get( 'info1_label' ) ); ?> </span><span class="info-detail"><?php echo wp_kses_post( $options->get( 'info1' ) ); ?></span></li>
						<?php endif; ?>
						<?php if ( $options->get( 'show_info1' ) ) : ?>
							<li><span class="bold-info"><?php echo wp_kses_post( $options->get( 'info2_label' ) ); ?>  </span><span class="info-detail"> <?php echo wp_kses_post( $options->get( 'info2' ) ); ?></span></li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
				
				<?php if ( $options->get( 'show_responsive_sharing' ) && $options->get( 'responsive_social_share' ) ) : ?>
					<ul class="res-social-icons">
						<?php  foreach ( $options->get( 'responsive_social_share' ) as $h_icon ) :
						$header_social_icons = json_decode( urldecode( actavista_set( $h_icon, 'data' ) ) );

						if ( actavista_set( $header_social_icons, 'enable') == '' )                                              
							continue;
						$icon_class = explode( '-', actavista_set( $header_social_icons, 'icon' ) );
						?>
						<li><a class="<?php echo esc_attr( actavista_set( $icon_class, 1 ) ); ?>" href="<?php echo actavista_set( $header_social_icons, 'url'); ?>" target="_blank" <?php echo ( actavista_set( $header_social_icons, 'background' ) ) ? 'style="background-color:'. actavista_set( $header_social_icons, 'background' ).';"' : ''; ?>><i class="fa <?php echo esc_attr( actavista_set( $header_social_icons, 'icon' ) ); ?>" <?php echo ( actavista_set( $header_social_icons, 'color' ) ) ? 'style="color:' .actavista_set( $header_social_icons, 'color' ).';"' : ''; ?>></i></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	
</div>
</div>