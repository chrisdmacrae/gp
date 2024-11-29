<?php $options = actavista_WSH()->option(); ?>
<header style="background-color:<?php echo esc_attr( $options->get( 'header2_menubar_bg_color' ) ); ?>"  class="header_2 <?php echo esc_attr( $options->get( 'header2_sticky' ) ) ? 'sticky_header' : ''; ?>">
	<div class="container">
		<div class="row urgent-popup-list">
			<div class="col-lg-2">
				<div class="logo">
					<?php
					$logo_type = $options->get( 'logo2_type' );
					$image_logo = $options->get( 'image2_logo' );
					$logo_dimension = $options->get( 'logo2_dimension' );
					$logo_text = $options->get( 'logo2_text' );
					$logo_typography = $options->get( 'logo2_typography' ); ?>
					<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
				</div>
				<?php if ( $options->get( 'header2_sticky' ) ) : 
					wp_enqueue_script( 'actavista-stickit' ); 
				?>

				<div class="sticky_logo logo">
					<?php $logo_type = $options->get( 'sticky_logo2_type' );
					$image_logo = $options->get( 'sticky_image2_logo' );
					$logo_dimension = $options->get( 'sticky_logo2_dimension' );
					$logo_text = $options->get( 'sticky_logo2_text' );
					$logo_typography = $options->get( 'sticky_logo2_typography' ); ?>
					<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="<?php echo esc_attr( $options->get( 'show_header2_sharing' ) && $options->get( 'header2_social_share' ) ) ? 'col-lg-7'  : 'col-lg-10'; ?>">
			<div class="menus">
				<nav>
					<div class="main-menu">
						<ul>
							<?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>		
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<?php if ( $options->get( 'show_header2_sharing' ) && $options->get( 'header2_social_share' ) ) : ?>
			<div class="col-lg-3">
				<div class="right-box">
					<?php $icons = $options->get( 'header2_social_share' ); actavista_template_load( 'templates/header/social-icons.php', compact( 'icons' ) ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $options->get( 'show_header2_infobar' ) && $options->get( 'header2_pone' ) || $options->get( 'header2_email' ) || $options->get( 'show_header2_button' )  ) : ?>
			<div class="col-lg-12">
				<div class="info-bar">
					<ul style="background-color: <?php echo esc_attr( $options->get( 'header2_infobar_bg_color' ) ); ?>">
						<?php echo esc_html( $options->get( 'header2_pone' ) ) ? '<li><i class="fa fa-phone"></i>' .$options->get( 'header2_pone' ). '</li>' : '';
						echo esc_html( $options->get( 'header2_email' ) ) ? '<li><i class="fa fa-envelope"></i>' . $options->get( 'header2_email' ).'</li>': ''; ?>
						<?php if ( $options->get( 'show_header2_button' )  && function_exists('lifeline_donation_init') ) : ?>
							<li class="donate-btn__">
								<?php 
								$btn_label =  $options->get( 'header2_button_label' );
								$btn_color =  $options->get( 'header2_btn_text_color' );
								$btn_bg    =  $options->get( 'header2_btn_bg_color' );
								$class__   = 'noclass';
								actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
								?>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
</header>
<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>
