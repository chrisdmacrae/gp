 <?php 

 $args = array(

    'post_type'      => 'post',

    'order'          => 'ASC',

    'posts_per_page' => $data->get( 'next_prev_itm' ) ? $data->get( 'next_prev_itm' ) : 4,

    'post__not_in' => array(get_the_ID()),

);

 $query = new WP_Query( $args ); 

 if ( $query->have_posts() ) :

    ?>

    <div class="next-post-caro">

        <?php while( $query->have_posts() ) : $query->the_post(); ?>

            <div class="item">

             <div class="paginato">

                <div class="current-post">

                    <span><?php echo get_the_date( 'F j, Y' ); ?></span>

                    <p><?php echo wp_trim_words( get_the_title(), $data->get( 'n_p_title' ), '...' ); ?></p>

                </div>

            </div>

        </div>

    <?php endwhile; wp_reset_postdata(); ?>

</div>



<?php

wp_enqueue_script( 'carousel' ); 

$custom_script = 'jQuery(document).ready(function ($) {          

    if ($.isFunction($.fn.owlCarousel)) {

        $(".next-post-caro").owlCarousel({

            items: 1,

            loop: true,

            margin: 0,

            autoplay: false,

            autoplayTimeout: 1500,

            smartSpeed: 1000,

            autoplayHoverPause: true,

            nav: true,

            navText: ["<span>Previous</span>", "<span>Next</span>"],

            dots: false,

            animateIn: "fadeIn",

            animateOut: "fadeOut", 

            responsiveClass:true,

            responsive:{

                0:{

                    items:1,

                },

                600:{

                    items:1,



                },

                1000:{

                    items:1,

                }

            }



        });       

    };            

});';



wp_add_inline_script( 'carousel', $custom_script );



?>



<?php endif; ?>

