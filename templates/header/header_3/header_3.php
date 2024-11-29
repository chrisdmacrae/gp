<?php $options = actavista_WSH()->option(); ?>

<header class="style3 urgent-popup-list" style="background-color:<?php echo esc_attr( $options->get( 'header3_menubar_bg_color' ) ); ?>" class="header_3 style3 <?php echo esc_attr( $options->get( 'header3_sticky' ) ) ? 'sticky_header' : ''; ?>">
	<?php if ( $options->get( 'header3_background' ) ) : ?>
		<div class="mockup">
			<img src="<?php echo esc_url( actavista_set( $options->get( 'header3_background' ), 'url' ) ); ?>" alt="">
		</div>
	<?php endif; ?>
	<div class="simple-logo">
		<?php
		$logo_type = $options->get( 'logo3_type' );
		$image_logo = $options->get( 'image3_logo' );
		$logo_dimension = $options->get( 'logo3_dimension' );
		$logo_text = $options->get( 'logo3_text' );
		$logo_typography = $options->get( 'logo3_typography' ); ?>
		<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
	</div>
	<?php if ( $options->get( 'show_header3_button' ) && function_exists('lifeline_donation_init') ) : ?>
		<div class="right-box">
			<?php 
				$btn_label =  $options->get( 'header3_button_label' );
				$btn_color =  $options->get( 'header3_btn_text_color' );
				$btn_bg    =  $options->get( 'header3_btn_bg_color' );
				$class__   = 'main-btn';
				actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
			?>
		</div>
	<?php endif; ?>
	<div class="menus">
		<div class="main-menu">
			<ul>
				<?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>
			</ul>
		</div>
	</div>
</header>
<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>