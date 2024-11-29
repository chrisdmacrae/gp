<?php

namespace Actavista\Includes\Library\Widgets;

use \WP_Widget;

/**
 * Widgets files
 *
 * @package Fixkar
 */


//Get In Touch
class Static_Block extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Static_Block', /* Name */__( 'Static Blocks', 'actavista' ), array( 'description' => esc_html__( 'Choose the static block to show in topbar.', 'actavista' ) ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance )
	{
		extract( $args );
		
		$block = isset( $instance['block'] ) ? $instance['block'] : '';

		if ( ! $block ) {
			return;
		}
		
		$post = get_post( $block );

		if ( ! $post ) {
			return;
		}


		//$css_class = str_replace(array ('[',']','vc_row','/vc_row','vc_column','/vc_column','"','=','gap_select','overlap_select','show_container','container_type','bg_settings','parallax_bg_image','image_layer', 'layer_opacity','image_bg_color'), '', $post->post_content);

		///$preg_classes = preg_split("/css/", $css_class);


		//if (! empty ($preg_classes) ):
			//foreach ($preg_classes as $preg_class ) :?>
			<!-- <style > -->
			<?php  //echo $preg_class; ?>
		<!-- </style> -->
	<?php //endforeach; endif;  

	echo do_shortcode( $post->post_content );

}



/** @see WP_Widget::update */
function update($new_instance, $old_instance)
{
	$instance = $old_instance;

	$instance['block'] = strip_tags($new_instance['block']);

	return $instance;
}

/** @see WP_Widget::form */
function form($instance) {
	$block = ($instance) ? esc_attr($instance['block']) : '';
	?>       
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('block') ); ?>"><?php esc_html_e( 'Choose static block for sidebar widgets or footer widgets area:', 'actavista' ); ?></label>

		<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('block') ); ?>" id="<?php echo esc_attr( $this->get_field_id('block') ); ?>">

			<?php foreach ( (array)actavista_get_posts_blocks('static_block') as $key => $value ) : ?>

				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $block ) ?>><?php echo wp_kses_post( $value ) ?></option>
			<?php endforeach; ?>
		</select>

	</p>

	<?php 
}
}
