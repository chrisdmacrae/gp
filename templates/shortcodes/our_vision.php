<div class="col-lg-4 col-sm-6">

	<div class="our-vision-box wow fadeIn" data-wow-delay="0.2s">

		

		<div class="our-vision-meta" style="background: url('<?php echo wp_get_attachment_url( actavista_set( $vision, 'vision_image' ) ); ?>');">


			<?php if ( ! empty ( actavista_set( $vision, 'vision_link' ) ) ) {



				$link = ( '||' === actavista_set( $vision, 'vision_link' ) ) ? '' : actavista_set( $vision, 'vision_link' );  



				$link = vc_build_link( $link ); 



			} ?>



			<div class="vision-submeta">



			<?php if ( ! empty( $link ) ) : ?>



				<h2><a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></h2>



			<?php endif; ?>

			<span><?php echo esc_html( actavista_set( $vision, 'subtitle' ) ); ?></span>

			</div>

		</div>

		<div class="flip-vision-meta" style="background: url('<?php echo wp_get_attachment_url( actavista_set( $vision, 'vision_image' ) ); ?>');">

			<?php if ( ! empty ( actavista_set( $vision, 'vision_link' ) ) ) {



				$link = ( '||' === actavista_set( $vision, 'vision_link' ) ) ? '' : actavista_set( $vision, 'vision_link' );  



				$link = vc_build_link( $link ); 



			} ?>



			<div class="vision-submeta">



			<?php if ( ! empty( $link ) ) : ?>



				<h2><a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></h2>



			<?php endif; ?>

			<p><?php echo wp_kses_post( actavista_set( $vision, 'text' ) ); ?></p>

		</div>

		</div>

	</div>

</div>