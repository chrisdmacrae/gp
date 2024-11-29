<?php



 /**



 * Useful Links  File



 *



 * @package Fixkar



 * @author  Webinane



 * @version 1.0



 */



 ?>



 <?php $atts = vc_map_get_attributes( $tag, $atts );







 extract( $atts );







 $links = json_decode( urldecode( $add_link ) );



 ?>





 <div class="widget wow fadeIn" data-wow-delay="0.6s">

 	<div class="widget-title">

 		<?php echo esc_html( $title ) ? '<h4>' . esc_html( $title ) .'</h4>' : ''; ?>

 	</div>



 	<?php if( $links ) :  ?>



 		<ul class="useful-links">



 			<?php foreach ( $links as $link ) : ?>



 				<?php  if( !empty ( actavista_set( $link, 'serv_link' ) ) ){

 					

 					$link = ( '||' === actavista_set($link, 'serv_link') ) ? '' : actavista_set($link, 'serv_link');  

 					

 					$link = vc_build_link( $link ); 



 				} ?>



 				<?php if ( !empty( $link ) ) : ?>

 					<li class="<?php echo esc_attr( $columns ); ?>">  

 						<i class="fa fa-angle-right"></i>

 						<a href="<?php echo esc_url(actavista_set( $link, 'url' )); ?>" <?php echo (actavista_set($link, 'target') ) ? 'target=_blank' : ''; ?>>

 							

 							<?php echo esc_html(actavista_set($link,'title')); ?>

 							

 						</a>

 					</li>

 					



 				<?php endif; ?>



 			<?php endforeach; ?> 



 		</ul>



 	<?php endif; ?>

 </div>





