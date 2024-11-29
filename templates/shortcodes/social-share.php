<?php if($show_facebook) : $icon = 'facebook'; ?>
	<div class="social-signup">

		<a class="social-facebook" href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>

		<span class="social-folow facbook-follow">

			<?php echo wp_kses_post($facebook_title); ?>

			<span class="folow-meta"><?php echo wp_kses_post($facebook_id); ?></span>

		</span>

	</div>
<?php endif; ?>
<?php if($show_twitter) : ?>
	<div class="social-signup">

		<a class="social-twitter" href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>

		<span class="social-folow twitter-follow">

			<?php echo wp_kses_post($twitter_title); ?>

			<span class="folow-meta"><?php echo wp_kses_post($twitter_id); ?></span>

		</span>

	</div>
<?php endif; ?>