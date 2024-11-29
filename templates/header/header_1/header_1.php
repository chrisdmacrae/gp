<?php $options = actavista_WSH()->option(); ?>
<style>
.header-bg-image::before{
	background-color: <?php echo esc_attr($options->get( 'header1_background_layerrr' ));?>;
	opacity: 0.8;
}
header.style2.sticky_header .header-style2-pos.sticky{
	background-color: <?php echo esc_attr($options->get('header1_sticky_header_bg_color')); ?>
}
</style>
<header class="header_1 style2 <?php echo esc_attr( $options->get( 'header1_sticky' ) ) ? 'sticky_header' : ''; ?>">
	<div class="header-bg-image" style="background-image: url( '<?php echo esc_url( actavista_set( $options->get( 'header1_background' ), 'url' ) ); ?>' )"></div>
	<div class="container">
		<div class="header-style2-pos urgent-popup-list">
			<div class="row">
				<div class="col-lg-2">
					<div class="simple-logo">
						<?php
						$logo_type = $options->get( 'logo1_type' );
						$image_logo = $options->get( 'image1_logo' );
						$logo_dimension = $options->get( 'logo1_dimension' );
						$logo_text = $options->get( 'logo1_text' );
						$logo_typography = $options->get( 'logo1_typography' ); ?>
						<?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
					</div>
				</div>
				<div class="col-lg-7">
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
				<?php if ( $options->get( 'show_header1_button' )  || $options->get( 'header1_search' )  ) : ?>
					<div class="col-lg-3">
						<div class="right-box">

							<?php if ( $options->get( 'show_header1_button' ) ) : ?>
								<?php 
									$class     = 'header-btn'; 
									$btn_label =  $options->get( 'header1_button_label' );
									$btn_color =  $options->get( 'btn_text_color' );
									$btn_bg    =  $options->get( 'btn_bg_color' );
									$class__ = 'header-btn';
   									actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
								?>
							<?php endif; ?>
							
							<?php if ( $options->get( 'header1_search' ) ) : ?>
								<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
							<?php endif; ?>

						</div>
					</div>
				<?php endif; ?>

				<div class="search-from">
					<?php echo get_search_form( ); ?>
				</div>

			</div>
		</div>
	</div>

</header><!-- header with banner -->

<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>
