<?php $options = actavista_WSH()->option(); ?>
<header class="header-style5" style="background-color:<?php echo esc_attr( $options->get( 'header6_menubar_color' ) ); ?>">
	<div class="container">
		<div class="header-wraper d-flex align-items-center justify-content-between urgent-popup-list">
			<div class="logo6">
				<?php $logo_type = $options->get( 'logo6_type' );
				$image_logo = $options->get( 'image6_logo' );
				$logo_dimension = $options->get( 'logo6_dimension' );
				$logo_text = $options->get( 'logo6_text' );
				$logo_typography = $options->get( 'logo6_typography' ); ?>
				<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
			</div>
			<div class="topbtns-menus">
				<?php actavista_template_load( 'templates/header/header_6/header_button.php', compact( 'options' ) ); ?>
				<div class="btm-navigation d-flex align-items-center justify-content-between">
					<ul>
						<?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>	
					</ul>
					<?php if ( $options->get( 'show_header6_search' ) ) : ?>
						<a class="serch-btn" href="#"><i class="fa fa-search"></i></a>
							<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
								<input type="text" id="s" name="s" placeholder="<?php echo esc_attr__( 'Search Here', 'actavista' ); ?>">
								<button type="submit"><i class="fa fa-search"></i></button>
								<span class="clos-sform">X</span>
							</form>					
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>

	<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>