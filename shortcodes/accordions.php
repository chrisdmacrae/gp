<?php
 /**
 * Accordions File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 $accordions = json_decode( urldecode( $add_accordions ) );
 ?>

 
 <?php echo esc_attr( $main_title ) ? '<h4 class="single-title">'.$main_title.'</h4>' : ''; ?>
 <?php if ( $accordions ) : $number_array = count($accordions);  $array_per = $number_array/2; ?>
 	
 	<div class="<?php echo esc_attr( $style ); ?>">
 		<div id="accordion" data-offset="col-m">
 			<?php echo esc_attr( $columns == 'col-md-6' ) ? '<div class="row">' : ''; ?>
 				<?php	if ( is_float( $array_per ) ) {
 					$array_per = $array_per+0.5;
 				}
 				?>
 				<?php $counter = 1; foreach ( $accordions as $accordion ) : 
 				?>
 				<?php echo esc_attr( $columns == 'col-md-6' && (  $counter == 1 || $counter == $array_per+1 ) ) ? '<div class="col-lg-6 col-md-12">' : ''; ?>
 					<div class="card">
 						<div class="card-header" id="heading<?php echo esc_attr($counter ); ?>">
 							<h5 class="mb-0">
 								<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo esc_attr( $counter ); ?>" <?php echo esc_attr( $counter == 1 ) ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?> aria-controls="collapse<?php echo esc_attr( $counter ); ?>">
 									
 									<?php echo esc_attr( $enable_counting ) ? '<span class="accord-num">'.$counter.'</span>' : ''; ?>
 									<span class="accord-title"><?php echo wp_kses_post( actavista_set( $accordion, 'title' ) ); ?></span>
 								</button>
 							</h5>
 						</div>

 						<div id="collapse<?php echo esc_attr( $counter ); ?>" class="collapse <?php echo esc_attr( $counter == 1 ) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo esc_attr( $counter ); ?>" data-parent="#accordion">
 							<div class="card-body">
 								<?php echo wp_kses_post( actavista_set( $accordion, 'text' ) ); ?>
 							</div>
 						</div>
 					</div>
 					<?php echo esc_attr( $columns == 'col-md-6' && ( $counter == $array_per || $counter == $number_array ) ) ? '</div>' : ''; ?>
 					<?php $counter++; endforeach; ?>
 					<?php echo esc_attr( $columns == 'col-md-6' ) ? '</div>' : ''; ?>
 				</div>
 			</div>
 		<?php endif; ?>