<div class="post-info">
   <?php if ( $data->get( 'author' ) ) : ?>
       <span>
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 25 );  ?>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
        </span>
   <?php endif; ?>

    <?php if ( $data->get( 'date' ) ) : ?>
        <span>                
              <i class="fa fa-calendar-o"></i><?php echo get_the_date( 'F j,  Y' ); ?>
         </span>
    <?php endif; ?>

      <span>                
             <i class="fa fa-comment"></i><?php echo get_comments_number( get_the_ID() ); ?><?php echo ( get_comments_number( get_the_ID() ) > 1 ) ? esc_html__( ' Comments' , 'actavista' ) : esc_html__( ' Comment' , 'actavista' ); ?>
      </span>

</div>