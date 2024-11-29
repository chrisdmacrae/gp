<?php
/* Template Name: Fullwidth */
get_header();
$data = \ACTAVISTA\Includes\Classes\Common::instance()->data('VC')->get();
do_action( 'actavista_banner' , $data );
while ( have_posts() ): the_post();
    echo do_shortcode( the_content() );
endwhile;

get_footer();

