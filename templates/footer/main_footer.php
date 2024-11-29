<?php $options = actavista_WSH()->option(); ?>
<?php global $wp_query;
    $page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

    $footer_enable = get_post_meta( $page_id, 'new_meta_footer_setting', true );
    $meta_footer = get_post_meta( $page_id, 'footer_style', true );
        
    if ( $page_id && $footer_enable && $meta_footer ) {
  
        $footer_style = $meta_footer; 
    } else {

        $footer_style = $options->get( 'custom_footer' );

    }
    $footer_style = ( $footer_style ) ? $footer_style : 'footer_2';
    
    actavista_template_load( 'templates/footer/'.$footer_style.'.php' );

?>