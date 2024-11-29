<li>
	<figure class="thumb">
		<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 90, 90, true ) ); ?>
		<?php else : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>
	</figure>
	<div>

		<?php if ( $show_blog_date ) : ?>
			<span><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date(); ?></a></span>
		<?php endif; ?>
		<?php if ( $show_blog_comment ) : ?>
			<i class="fa fa-comments-o"><?php echo get_comments_number(); ?></i>
		<?php endif; ?>
		<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>
	</div>	
</li>