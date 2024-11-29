<div class="col-lg-4 col-sm-6">
		<div class="our-awards wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">
			<figure><?php echo wp_get_attachment_image( actavista_set( $award, 'award_image' ), 'full' ); ?></figure>
			<div class="awards-info">
				<span><?php echo esc_html( actavista_set( $award, 'date' ) ); ?></span>
				<h4><?php echo esc_html( actavista_set( $award, 'title' ) ); ?></h4>
				<p><?php echo wp_kses_post( actavista_set( $award, 'text' ) ); ?></p>
			</div>	
		</div>
	</div>