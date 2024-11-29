<?php
/**
 * Comments Main File.
 *
 * @package actavista
 * @author  Webinane
 * @version 1.0
 */

?>
<?php
if ( post_password_required() ) {
	return;
}

?>
<?php $count = wp_count_comments(get_the_ID()); ?>
<?php if ( have_comments() ) : ?>
<div id="comments">
	
		<?php if (actavista_set($count, 'total_comments') > 0): ?>
			<h4 class="comment-title"><i class="fa fa-comments-o"></i><?php echo actavista_set($count, 'total_comments'); ?> 

				<?php if ( actavista_set($count, 'total_comments') > 1 ) : ?>
					<?php esc_html_e('Comments', 'actavista'); ?>
				<?php else : ?>
					<?php esc_html_e('Comment', 'actavista'); ?>
				<?php endif; ?>
			</h4>
			
			<ul class="comments">
				<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 74,
					'callback'    => 'actavista_list_comments',
				) );
				?>
			</ul><!-- .comment-list -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="screen-reader-text section-heading">
						<?php esc_html_e( 'Comment navigation', 'actavista' ); ?>
					</h1>
					<div class="nav-previous">
						<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'actavista' ) ); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'actavista' ) ); ?>
					</div>
				</nav><!-- .comment-navigation -->
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'actavista' ); ?>
			</p>
		<?php endif; ?>

	


</div>
<?php endif; ?>
<?php actavista_comment_form(); ?>