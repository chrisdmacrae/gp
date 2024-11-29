<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">
	<?php
	$icon_color = actavista_set( $service, 'icon_color' ) ? actavista_set( $service, 'icon_color' ) : '#e70f47';
	$icon_bgcolor = actavista_set( $service, 'icon_bg_color' ) ? actavista_set( $service, 'icon_bg_color' ) : '#fff';

	?>
	<div class="activities wow fadeIn" data-wow-delay="0.2s" style="background-color:<?php echo esc_attr(  actavista_set( $service, 'box_bg_color' ) ); ?>">
		<?php if ( 'image_icon' === actavista_set( $service, 'icon_type' ) ) : ?>

			<i style="color: <?php echo esc_attr( $icon_color ); ?>; background-color: <?php echo esc_attr( $icon_bgcolor ); ?>"><?php echo wp_get_attachment_image( actavista_set( $service, 'ico_img' ), 'full' ); ?></i>

		<?php elseif(  'icon_icon' === actavista_set( $service, 'icon_type' ) ) : ?>

			<i  style="color: <?php echo esc_attr( $icon_color ); ?>; background-color: <?php echo esc_attr( $icon_bgcolor ); ?>"  class="<?php echo esc_attr( actavista_set( $service, 'iconicon' ) ); ?>"></i>

		<?php else : ?>

			<i  style="color: <?php echo esc_attr( $icon_color ); ?>; background-color: <?php echo esc_attr( $icon_bgcolor ); ?>" class="<?php echo esc_attr( actavista_set( $service, 'info_icon2' ) ); ?>"></i> 

		<?php endif; ?>



		<div class="act-meta">

			<?php if ( ! empty ( actavista_set( $service, 'serv_link' ) ) ) {

				$link = ( '||' === actavista_set($service, 'serv_link') ) ? '' : actavista_set( $service, 'serv_link' );  

				$link = vc_build_link( $link ); 

			} ?>

			<?php if ( ! empty( $link ) ) : ?>


				<h4><a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></h4>
			<?php endif; ?>
			
			<span><?php echo esc_html( actavista_set( $service, 'subtitle' ) ); ?></span>
		</div>
	</div>
</div>