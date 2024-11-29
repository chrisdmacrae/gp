<?php $options = actavista_WSH()->option(); ?>
<header class="header-style6" style="background-color:<?php echo esc_attr( $options->get( 'header7_menubar_color' ) ); ?>">
	<div class="container">
		<div class="header-wraper d-flex align-items-center justify-content-between urgent-popup-list">
			<div class="logo7">
				<?php $logo_type = $options->get( 'logo7_type' );
				$image_logo = $options->get( 'image7_logo' );
				$logo_dimension = $options->get( 'logo7_dimension' );
				$logo_text = $options->get( 'logo7_text' );
				$logo_typography = $options->get( 'logo7_typography' ); ?>
				<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
			</div>
			<div class="topbtns-menus">
     
			
                <?php if ( $options->get('show_header7_top_menu') ) : ?>
                	<ul>
						<?php $menu_name = 'topbar_menu';  actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
					</ul>
                <?php endif; ?>
                	<?php actavista_template_load( 'templates/header/header_7/header_button.php', compact( 'options' ) ); ?>
	
			</div>
            <div class="btm-navigation d-flex align-items-center justify-content-between">
				<ul>
					<?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
				</ul>
			</div>	
		</div>
	</div>

</header>

	<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>