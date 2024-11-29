<div class="col-lg-4 col-md-4 col-sm-12">
	<div class="content-logo-area">
		
		<?php actavista_template_load( 'templates/custom-posts/comingsoon-logo.php', compact( 'options') ); ?>
		
		<?php if ( $options->get( 'show_comingsoon_sharing' ) && $options->get( 'comingsoon_social_share' ) ) : ?>
			<ul class="social-share-icon">
				<?php  foreach ( $options->get( 'comingsoon_social_share' ) as $h_icon ) :
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