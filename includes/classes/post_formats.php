<?php

class ACTAVISTA_Post_formats_meta {

	static public function init() {
		global $pagenow;
		$hooks = array( 'post.php', 'post-new.php' );
		if (!in_array($pagenow, $hooks))
			return;
		add_action( 'add_meta_boxes', array(__CLASS__, 'actavista_meta_layout' ) );
		add_action( 'save_post', array(__CLASS__, 'actavista_format_post_meta_save' ) );
	}

	static public function actavista_meta_layout( $post_type ) {
	
		if (post_type_supports( $post_type, 'post-formats') && current_theme_supports( 'post-formats' ) ) {
			wp_enqueue_script( 'actavista_post-formats-ui', ACTAVISTA_URL . 'assets/js/format_script.js', array('jquery'), '' );
			wp_enqueue_script( 'actavista_gallery-ui', ACTAVISTA_URL . 'assets/js/gallery.js', array( 'jquery' ), '' );
			wp_enqueue_style( 'actavista_post-formats-ui', ACTAVISTA_URL . 'assets/css/post_format.css', array(), '', 'screen' );

		}
		$meta = array( 'gallery', 'link', 'quote', 'video', 'audio' );
		foreach ( $meta as $m ) {
			$name = ucfirst( $m );
			add_meta_box( 'actavista_format_' . $m, $name . ' Settings', array(__CLASS__, 'actavista_format_' . $m ), 'post', 'normal', 'high' );
		}
	}

	static public function actavista_format_gallery( $post ) {
		wp_nonce_field('save_format_status', 'format_status_nonce');
		$gallery = get_post_meta( $post->ID, 'actavista_gallery_images', true );
		$shrink = ( $gallery != '') ? explode( ',', $gallery ) : '';
		?>
		<fieldset class="clearfix actavista_metabox">
			<div id="vp-pfui-format-gallery-preview" class="vp-pfui-elm-block vp-pfui-elm-block-image">
				<div class="vp-pfui-elm-container">
					<div class="vp-pfui-gallery-picker">
						<div class="gallery clearfix">
							<?php
							if ( ! empty($shrink ) ) {
								foreach ( $shrink as $image ) {
									$thumbnail = wp_get_attachment_image_src( $image, 'thumbnail' );
									echo '<span data-id="' . esc_attr( $image ) . '" title="' . 'title' . '"><img src="' . esc_url( $thumbnail[0] ) . '" alt="thumbnail" /><span class="close">x</span></span>';
								}
							}
							?>
						</div>
						<input type="hidden" name="actavista_gallery_images" value="<?php echo esc_attr($gallery); ?>" />
						<p class="none"><a href="#" class="button vp-pfui-gallery-button"><?php esc_html_e('Pick Images', 'actavista'); ?></a></p>
					</div>
				</div>
			</div>
		</fieldset>
		<?php
	}

	static public function actavista_format_link( $post ) {
		$link_url = get_post_meta( $post->ID, 'actavista_link_url', true);
		wp_nonce_field( 'save_format_status', 'format_status_nonce' );
		?>
		<fieldset class="clearfix actavista_metabox">
			<div>
				<label for="link-url"><?php esc_html_e( 'Link URL:', 'actavista' ) ?></label>
				<input type="text" id="link-url" name="actavista_link_url" value="<?php echo esc_attr($link_url); ?>" />
			</div>
		</fieldset>
		<?php
	}

	static public function actavista_format_quote( $post ) {
		$quote_text = get_post_meta( $post->ID, 'actavista_quote_text', true ); 
		$quote_author = get_post_meta( $post->ID, 'actavista_quote_author', true );
		wp_nonce_field( 'save_format_status', 'format_status_nonce' );
		?>
		<fieldset class="clearfix actavista_metabox">
			<div>
				<label for="quote-text"><?php esc_html_e( 'Quote Text:', 'actavista') ?></label>
				<textarea id="quote-text" name="actavista_quote_text" value="" ><?php echo esc_html($quote_text); ?></textarea>
			</div>

			<div>
				<label for="quote-author"><?php esc_html_e('Quote Author:', 'actavista') ?></label>
				<input type="text" id="quote-author" name="actavista_quote_author" value="<?php echo esc_attr($quote_author); ?>" />
			</div>
		</fieldset>
		<?php
	}

	static public function actavista_format_video($post) {
		$video_url = get_post_meta($post->ID, 'actavista_video_url', true);
		wp_nonce_field('save_format_status', 'format_status_nonce');
		?>
		<fieldset class="clearfix actavista_metabox">
			<div>
				<label for="video-url"><?php esc_html_e('Video URL:', 'actavista') ?></label>
				<input type="text" id="video-url" name="actavista_video_url" value="<?php echo esc_attr($video_url); ?>" /><br>
				<P><?php esc_html_e('Enter Youtube,Vimeo and Dailymotion link to add video post', 'actavista');?></p>
				</div>
			</fieldset>
			<?php
		}

		static public function actavista_format_audio($post) {
			$type = get_post_meta($post->ID, 'actavista_audio_type', true);
			$soundcloud = get_post_meta($post->ID, 'actavista_soundcloud_track_id', true);
			$own = get_post_meta($post->ID, 'actavista_own_audio', true);
			wp_nonce_field('save_format_status', 'format_status_nonce');
			$val = array(esc_html__('SoundCloud', 'actavista'), esc_html__('Own Audio', 'actavista'));
			?>
			<fieldset class="clearfix actavista_metabox">
				<div>
					<label for="audio-url"><?php esc_html_e('Select Type:', 'actavista') ?></label>
					<select id="actavista_audio_type" name="actavista_audio_type">
						<?php
						foreach ($val as $v) {
							$selected = ($v == $type) ? 'selected' : '';
							echo '<option value="' . esc_attr($v) . '" ' . $selected . '>' . $v . '</option>';
						}
						?>
					</select>
				</div>
				<div class="soundcloud-section">
					<label for="soundcloud_track"><?php esc_html_e('Enter SoundCloud Track ID:', 'actavista') ?></label>
					<input type="text" id="soundcloud_track" name="actavista_soundcloud_track_id" value="<?php echo esc_attr($soundcloud); ?>"/> <?php esc_html_e('For Example:262375023', 'actavista'); ?>
				</div>
				<div class="own-url-section">
					<label for="own-audio"><?php esc_html_e('Own Audio URL:', 'actavista') ?></label>
					<input type="text" id="own-audio" name="actavista_own_audio" value="<?php echo esc_attr($own); ?>"/>
				</div>
			</fieldset>
			<?php
		}

		static public function actavista_format_post_meta_save($id) {

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return;
			if (!isset($_POST['format_status_nonce']) || !wp_verify_nonce($_POST['format_status_nonce'], 'save_format_status'))
				return;
			if (!current_user_can('edit_posts'))
				return;

			$posts_keys = array('actavista_video_url', 'actavista_audio_type', 'actavista_soundcloud_track_id', 'actavista_own_audio', 'actavista_quote_text', 'actavista_quote_author', 'actavista_link_url', 'actavista_gallery_images');

			foreach ($posts_keys as $p) {
				if (actavista_set($_POST, $p)) {
					update_post_meta($id, $p, esc_attr(actavista_set($_POST, $p)));
				}
			}
		}

	}
