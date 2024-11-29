<div class="<?php echo esc_attr( $columns ); ?> col-sm-6 col-12">

	<div class="workers wow fadeIn <?php echo esc_attr( actavista_set( $team, 'enable_active' ) ) ? 'active' : ''; ?>" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">

		<div class="worker-img">

			<figure>
				

				<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

					<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $team, 'team_image' ), 'full' ), $custom_width, $custom_height, true ) ); ?>

				<?php else : ?>

					<?php echo wp_get_attachment_image( actavista_set( $team, 'team_image' ), 'full' ); ?>

				<?php endif; ?>

			</figure>
			<div class="worker-meta">

				<h4 <?php if( $enable_title_typo ) : ?> style="<?php echo $title_font_inline_style; ?>  font-size:<?php echo esc_attr($title_size); ?>; color:<?php echo esc_attr( $title_color ); ?>";<?php endif; ?>><?php echo esc_html( actavista_set( $team, 'team_name' ) ); ?></h4>

				<span <?php if( $enable_title2_typo ) : ?> style="<?php echo $title2_font_inline_style; ?>  font-size:<?php echo esc_attr($title2_size); ?>; color:<?php echo esc_attr( $title2_color ); ?>";<?php endif; ?>><?php echo wp_kses_post( actavista_set( $team, 'team_text' ) ); ?></span>

				<div class="worker-contact">

				<?php 

				$social_icons = actavista_set( $team, 'add_social' ); 

				

				$icons = json_decode( urldecode( $social_icons ) );

				if( $icons ) : ?>

				<ul>

					<?php foreach ( $icons as $icon ) : if (actavista_set( $icon, 'social_icon' )  && actavista_set( $icon, 'social_url' ) ) :
					 ?>
					
						<li><a href="<?php echo esc_attr( actavista_set( $icon, 'social_url' ) ); ?>"><i class="<?php echo actavista_set( $icon, 'social_icon' ); ?>"></i></a></li>
					<?php  endif; endforeach; ?>

				</ul>

				<?php endif;?>

			</div>

		</div>
	</div>
</div>

</div>