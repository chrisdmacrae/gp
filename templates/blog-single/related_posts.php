<?php $post_id = get_the_ID();
$cat_ids = array();
$categories = get_the_category( $post_id );

if(!empty($categories) && is_wp_error($categories)):
    foreach ($categories as $category):
        array_push($cat_ids, $category->term_id);
    endforeach;
endif;

$current_post_type = get_post_type($post_id);
$query_args = array( 

    'category__in'   => $cat_ids,
    'post_type'      => $current_post_type,
    'post_not_in'    => array($post_id),
    'posts_per_page'  => $data->get( 'related_num' ),


);

$related_cats_post = new WP_Query( $query_args );

if ( $related_cats_post->have_posts() ): 

    $col = ( $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-lg-6' : 'col-lg-4';

    ?>
    <div class="related-posts">
        <?php if ( $data->get( 'related_title' ) ) : ?>
        <div class="comment-title"><?php echo esc_html( $data->get( 'related_title' ) ); ?></div>
        <?php endif; ?>
        <div class="row">
            <?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?> 
            
                <div class="<?php echo esc_attr( $col ); ?> col-sm-6">
                    <div class="blog-related">
                        <figure>  
                            <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

                                <?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 350, 235, true ) ); ?>

                            <?php endif; ?>
                        </figure>
                        <div class="blog-rel-meta">
                            <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $data->get( 'r_title' ), '...' ); ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endwhile;  wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>
