<?php $options = actavista_WSH()->option(); ?>

<header class="humburger-header">
	<div class="container">
		<div class="header-wraper d-flex align-items-center justify-content-between">
			<div class="logo5">
				<?php $logo_type = $options->get( 'logo5_type' );
				$image_logo = $options->get( 'image5_logo' );
				$logo_dimension = $options->get( 'logo5_dimension' );
				$logo_text = $options->get( 'logo5_text' );
				$logo_typography = $options->get( 'logo5_typography' ); ?>
				<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
			</div>
			<div class="humburger-menu d-flex align-items-center urgent-popup-list">
				
				<?php if ( $options->get( 'show_header5_button' ) && function_exists('lifeline_donation_init') ) : ?>
					<div class="header-btn-new">
						<?php 
						$btn_label =  $options->get( 'header5_button_label' );
						$btn_color =  $options->get( 'header5_btn_text_color' );
						$btn_bg    =  $options->get( 'header5_btn_bg_color' );
						$class__   = 'theme_btn_flat';
						actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
						?>
					</div>
				<?php endif; ?>
				<?php if ( $options->get( 'header5_sticky' ) ) {
						wp_enqueue_script( 'actavista-stickit' ); 
					}
				?>
				<a href="#" class="humbrgr-menu-btn  <?php echo esc_attr($options->get( 'header5_sticky' )) ? 'sticky_header' : ''; ?>">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="menus-wraper" style="background-color:<?php echo esc_attr( $options->get( 'header5_menubar_color' ) ); ?>">
				<span class="close-menu-btn">X</span>
				<ul>
					<?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
				</ul>
				<div class="menu-btm-area">
					<?php if ( $options->get( 'show_header5_sharing' ) ) : ?>
						<div class="humbrgr-social-media">
							<?php $icons = $options->get( 'header5_social_share' ); actavista_template_load( 'templates/header/social-icons.php', compact( 'icons' ) ); ?>
						</div>
					<?php endif; ?>
					<?php if ( $options->get( 'header5_email' ) || $options->get( 'header5_phone' ) ) : ?>
						<div class="humbrgr-info-bar">
							<ul>
								<li>
									<i class="fa fa-phone"></i>
									<?php echo esc_html($options->get( 'header5_phone' )); ?>
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<?php echo esc_html($options->get( 'header5_email' )); ?>
								</li>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>

<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>