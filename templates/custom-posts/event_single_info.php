<?php $general_info = get_post_meta( get_the_ID(), 'event_single_info', true );  ?>

<div class="event-queries">

	<div class="row">

		<?php if ( $general_info ) : foreach ( $general_info as $gen_info ) : ?>

			<div class="col-lg-4 col-md-6 col-sm-6">

				<div class="query-box <?php echo esc_attr( actavista_set($gen_info, 'enable_active_info' ) ) ? 'active' : ''; ?>">

					<?php if (  actavista_set($gen_info, 'single_event_icon_select' ) == 'icon' && actavista_set($gen_info, 'event_icon2' ) ) : ?>
						<span><i class="<?php echo esc_attr(actavista_set($gen_info, 'event_icon2' )); ?>"></i></span>

					<?php elseif (  actavista_set($gen_info, 'single_event_icon_select' ) == 'image' && actavista_set($gen_info, 'event_image_icon' ) ) : ?>
						<img src="<?php echo esc_url( actavista_set($gen_info, 'event_image_icon' )  ); ?>" alt="<?php esc_attr( 'icon', 'actavista' ); ?>">

					<?php elseif (  actavista_set($gen_info, 'single_event_icon_select' ) == 'icon2' && actavista_set( $gen_info, 'event_icon' ) ) : ?>
						<span><i class="fa <?php echo esc_attr(actavista_set( $gen_info, 'event_icon' )); ?>"></i></span>
					<?php endif; ?>

					<h4><?php echo esc_html( actavista_set($gen_info, 'single_event_info_title' ) ); ?></h4>
					<p><?php echo esc_html( actavista_set($gen_info, 'single_event_info_' ) ); ?></p>

				</div>

			</div>

		<?php endforeach; endif; ?>

	</div>

</div>