<?php

/**
 * Video Filter Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts );

$cat = explode( ',', $cats );

$tag = $cat;

$title_limit = ( $title_limit ) ? $title_limit : 20;


?>
<?php  if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

	$img_obj = new ACTAVISTA_Resizer();

}
?>
<?php wp_enqueue_script( array( 'isotopee', 'isotope-init' ) ); ?>

<div class="row">
	<?php if ( $title ||  $tagline ) : ?>
		<div class="col-lg-12">
			<div class="main-title text-left">
				<h3><?php echo esc_html( $title ); ?></h3>
				<span><?php echo esc_html( $tagline ); ?></span>
			</div>
		</div>
	<?php endif; ?>
	<div id="options" class="col-lg-12">
		<ul id="filter" class="option-set nav nav-tabs videos-tab" data-option-key="filter">

			<?php if ( ! empty( $cat ) ) {

				$terms = get_terms( 'video_cat', array( 'hide_empty' => true, 'include' => $cat ) );
			} else {

				$terms = get_terms( 'video_cat', array( 'hide_empty' => false ) );

			}

			if ( ! empty( $terms ) ):
				$counter = 0; ?>
				<li class="nav-item"><a  href="#all" data-option-value="*" class="active"><i class="fa fa-th"></i><?php esc_html_e('all', 'actavista'); ?></a></li>
				<?php 
				$cats_style = array();
				foreach ( $terms as $term ) : 
					$coach_meta = get_option( "video_cat_".$term->term_id );
					?>

					<li class="nav-item slug<?php echo esc_attr($term->slug); ?>"><a  href="#slug<?php echo esc_attr($term->slug); ?>"  data-option-value=".slug<?php echo esc_attr($term->slug); ?>"><i style="color:<?php echo esc_attr(actavista_set( $coach_meta, 'cat_icon_color' ) ); ?>" class="fa fa-<?php echo strtolower(actavista_set( $coach_meta, 'registered_users' ) ); ?>"></i><?php echo esc_html( $term->name ); ?></a></li>
					<?php $cats_style[] = ".nav-item.slug".esc_attr($term->slug)." a.active{
						color : ".esc_attr(actavista_set( $coach_meta, 'cat_icon_color' ) ).";
						border-color : ".esc_attr(actavista_set( $coach_meta, 'cat_icon_color' ) ).";
					}";  ?>
					
					

					<?php

					$counter++; ?>

				<?php endforeach;


			endif;

			?>

		</ul>
		<?php //echo '<style type="text/css">';

		/*foreach ($cats_style as $key => $value) {
			echo $value;

		}*/

		//echo '</style>';
		?>
	</div>
	<!-- Tab panes -->
	<div class="col-lg-12">
		<div class="tab-content">

			<?php
			$args = array(
				'post_type' => 'actavista_video',

				'order' => $order,

				'posts_per_page' => $number,
			);

			if ( ! empty( $tag ) ) {

				$args['tax_query'] = array( array( 'taxonomy' => 'video_cat', 'field' => 'slug', 'terms' => (array) $cat ) );
			}

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : ?>
			<div class="row masonry scroll video-border video-filter">
				<?php  while( $query->have_posts() ) :

				$query->the_post();

				$post_class = '';


				$post_terms = wp_get_post_terms( get_the_ID(), 'video_cat' );

				if(!empty($post_terms)){

					foreach ($post_terms as $post_term )
					{

						$post_class .= $post_term->slug. ' ';

					}
				}

				?>


				<div class="slug<?php echo esc_attr( $post_class ); ?> col-lg-6 col-sm-6">
					<div class="videos-contant">
						<figure class="gallery">
							<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 540, 320, true ) ); ?>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
						</figure>
						<div class="video-meta">
							<?php if ( $show_post_date ) : ?>
								<div class="publish-time">

									<span> <i class="fa fa-youtube-play"></i> <?php esc_html_e('Published', 'actavista' ); ?> 
										<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . esc_html__(' ago on', 'actavista'); ?>

										<?php echo get_the_date( 'M d, Y' ); ?></span>
									</div>
								<?php endif; ?>
								<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>
								<?php if ( $add_socials ) :
								$icons = json_decode( urldecode( $add_socials ) );

								if( $icons ) : ?>
								<ul class="squar-socials">
									<?php foreach ( $icons as $icon ) : ?>

										<li><a  onMouseOver="this.style.color='<?php echo esc_attr( actavista_set( $icon, 'icon_color' ) ); ?>'" onMouseOut="this.style.color='#cecece'" href="<?php echo esc_url( actavista_set( $icon, 'social_url' ) ); ?>"><i class="fa <?php echo esc_attr( actavista_set( $icon, 'social_icon' ) ); ?>"></i></a></li>

									<?php endforeach; ?>
								</ul>
							<?php endif; endif; ?>

						</div>
					</div>	
				</div>
			<?php  endwhile;  wp_reset_postdata(); ?>
			<?php if (function_exists('actavista_encrypt')): ?>
				<?php $data = array('number' => $number,  'order' => $order, 'cats' => $cats, 'title_limit' => $title_limit, 'show_post_date' => $show_post_date, 'add_socials' => $add_socials); 
				$security_key=wp_create_nonce(ACTAVISTA_NONCE);?>
			<!-- <div class="load-more">
				<a href="#" data-ajax="actavista_videos" data-page="1" data-atts="<?php //echo esc_attr(actavista_encrypt(serialize($data))); ?>" ><?php //esc_html_e('Load more', 'actavista'); ?></a>
			</div> -->
		<?php endif; ?>
	</div>

	<?php
	if (/*$more == 'true' && */function_exists('actavista_encrypt')) {
		$custom_script = "jQuery(document).ready(function($){
			$('.load-more > a').live('click', function(){

				var parent = $(this).parent('.load-more').parent('.video-filter');
				var page_id = $(this).data('page');
				var action    = 'actavista_ajax';
				var subaction = $(this).data('ajax');
				var data_atts = $(this).data('atts');
				var security_key = '".esc_attr($security_key)."';
				var thiss = this;
				$(thiss).html('" . esc_js('loading more products...', 'actavista') . "')

				$.ajax({
					url: actavista_data.ajaxurl,
					type: 'json',
					method: 'POST',
					data: 'action='+action + '&subaction=' + subaction +'&page_num='+page_id+'&data_atts='+data_atts+'&security_key='+security_key,
					console.log(res),
					success: function(res){
						var result = $.parseJSON(res);


						$('.video-filter').append(result.products);


					},
				});
				return false;
			});
		});";
		wp_add_inline_script('script', $custom_script);
	}


	?>
<?php endif; ?>	
</div>	
</div>
</div>
