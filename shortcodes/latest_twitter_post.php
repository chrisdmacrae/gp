<?php
/**
 * Twitter Shortcode 
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
*/

$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts ); ?>

<?php
esperto_twitter(
	array(
		'screen_name' => $twitter_id,
		'count'       => 1,
		'selector'    => '.embed-actavista-twitter',
	)
);

?>

<?php wp_enqueue_script( array( 'js-tweets', 'script' ) ); ?>

<div class="subsrb-review-box text-center twitter wow fadeIn" style="<?php echo esc_attr( $bg_color ) ? 'background-color:'.$bg_color.'' : ''; ?>" data-wow-delay="0.4s">
	<div class="review-box-inner embed-actavista-twitter">


	</div>
</div>

