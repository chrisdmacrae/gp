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
		'count'       => $number,
		'selector'    => '.twitter-caro',
	)
);

?>

<?php wp_enqueue_script(array( 'twitter_tweets', 'carousel','script' )); ?>
<div class="container">
<div class="row">
	<div class="col-lg-12">

		
		<div class="twitter-caro">

		</div>
	</div>
</div>
</div>
