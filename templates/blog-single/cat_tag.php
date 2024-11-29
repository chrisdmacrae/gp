<?php if ( $data->get( 'tag' ) && has_tag() ) : ?>
    <div class="tags">
    	<span><i class="fa fa-tags"></i>Tags : </span>
        <?php wp_kses( the_tags( '', ' ' ), true ); ?>
    </div>
<?php endif; ?>