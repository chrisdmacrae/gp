 <?php global $wp_query;

 $page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
 $format = get_post_format( get_the_ID() );
 $gallery  = get_post_meta( $page_id, 'actavista_gallery_images', true );

 $video  = get_post_meta( $page_id, 'actavista_video_url', true );


 $audio_type  = get_post_meta( $page_id, 'actavista_audio_type', true );

 ?>
 <div class="blog-post">
 	<?php if ( $data->get( 'cat' ) ) : ?>
 		<span><?php the_category( ' , ' ); ?></span>
 	<?php endif; ?>

 	<h2>
 		<a href="<?php the_permalink(); ?>">
 			<?php $title_option = $data->get( 't_limit_option' );

 			if ( $title_option && get_the_title() ) : ?>
 			<?php echo ( actavista_post_title( $title_option, $data->get( 'word_limit' ), $data->get( 'ch_limit' ), get_the_title() ) ); ?>
 		<?php endif; ?>

 	</a>
 </h2>

 <?php actavista_template_load( 'templates/blog/author_meta.php' , compact( 'data' ) ); ?>
 <?php if ( $gallery || $video || $audio_type || has_post_thumbnail( ) ) : ?>
 <figure>  

 	<?php if ( $gallery && $format == 'gallery' ) { ?>

 		<?php actavista_template_load( 'templates/blog/gallery.php' , compact( 'gallery', 'img_obj', 'width', 'data' ) ); ?>


 	<?php } 

 	elseif( $video && $format == 'video' ) { ?>

 		<?php actavista_template_load( 'templates/blog/video.php' , compact( 'video' , 'page_id' ) ); ?>


 	<?php } 

 	elseif( $audio_type && $format == 'audio'  ) {  ?>

 		<?php actavista_template_load( 'templates/blog/audio.php' , compact( 'audio_type' , 'page_id' , 'page_id' ) ); ?>

 	<?php } 

 	else { ?>

 		<?php actavista_template_load( 'templates/blog/image.php' , compact( 'img_obj', 'width', 'data' ) ); ?>

 	<?php } ?>

 </figure>

<?php endif; ?>
 <?php $content_option = $data->get( 'c_limit_option' );

 if ( $content_option && get_the_content() ) : ?>
 	<p><?php echo ( actavista_post_title( $content_option, $data->get( 'c_word_limit' ), $data->get( 'c_ch_limit' ), strip_shortcodes(get_the_content())) ); ?></p>
<?php endif; ?>

<?php if ( $data->get( 'button' ) ) : ?>
	<a href="<?php the_permalink(); ?>" class="theme_btn_flat"><?php echo esc_html( $data->get( 'label' ) ) ? $data->get( 'label' ) : esc_html_e( 'CONTINUE READING', 'actavista' ); ?></a>
<?php endif; ?>

</div>