<?php
/**
 * Search Not Found Template
 *
 * @package WordPress
 * @subpackage Webinane
 * @author Webinane
 * @version 1.0
 */

$options = actavista_WSH()->option(); ?>

<div class="main-search-notfound">
<div class="s-not-found">
	<h3><?php esc_html_e( 'Search Results For', 'actavista' ); ?> <span>“ <?php echo get_search_query( ); ?> ”</span></h3>
	<?php get_search_form(); ?>
	
</div>
	
<?php if ( $options->get( 'enable_search_bottom_part' ) ) : ?>
	<div class="result-errors">
		<?php echo esc_html( $options->get( 'search_bottom_title' ) ) ? '<h4>'. $options->get( 'search_bottom_title' ) . ' <span>('.get_search_query( ).')</span></h4>' : ''; ?>
		<?php $list_searches = explode( ',' , $options->get( 'search_bottom_points' ) ); ?>
		
		<?php  if ( $list_searches ) : ?>
			<ul>
				<?php foreach ( $list_searches as $list_search ) :   ?>
					<li><i class="fa fa-check"></i><?php echo esc_html( $list_search ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
<?php endif; ?>
</div>