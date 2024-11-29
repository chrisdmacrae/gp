<?php
 	$link = ( '||' === $btn_link ) ? '' : $btn_link;  

 	$link = vc_build_link( $link ); 
?>
 	
 	<a <?php echo esc_attr( $class ) ? 'class="'.$class.'"' : ''; ?> href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>">
 		
 		<?php echo esc_attr( $icon ) ? '<i class="fa '.$icon.'"></i>' : ''; ?> 
 		
 		<?php echo esc_html( $link['title'] ); ?>
 	</a>
