<?php
 /**
 * Custom Services File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $tabs = json_decode( urldecode( $add_tabs ) );
 
 if ( $tabs ) : ?>

 <div class="party-moto">
 	<ul class="nav nav-tabs flex-column">
 		<?php $counter = 0; foreach ( $tabs as $tab ) : ?>

 		<li class="nav-item"><a class="<?php echo esc_attr( $counter ==  0 ) ? 'active' : ''; ?>" href="#link<?php echo esc_attr( $counter ); ?>" data-toggle="tab"><?php echo esc_html( actavista_set( $tab, 'tab_name' ) ); ?></a></li>

 		<?php $counter++; endforeach; ?>
 	</ul>
 	<!-- Tab panes -->
 	<div class="tab-content">
 		<?php $counter = 0; foreach ( $tabs as $tab ) : ?>
 		<div class="tab-pane <?php echo esc_attr( $counter ==  0 ) ? 'active show' : ''; ?> fade" id="link<?php echo esc_attr( $counter ); ?>" >
 			<div class="orginizer">
 				<span><?php echo esc_html( actavista_set( $tab, 'tab_tagline' ) ); ?></span>
 				<h2><?php echo esc_html( actavista_set( $tab, 'tab_content' ) ); ?></h2>


 				<?php if ( ! empty ( actavista_set( $tab, 'button' ) && actavista_set( $tab, 'help_link'  ) ) ) {

 					$link = ( '||' === actavista_set( $tab, 'help_link'  ) ) ? '' : actavista_set( $tab, 'help_link'  );  

 					$link = vc_build_link( $link ); 

 				} ?>

 				<?php if ( ! empty( $link ) ) : ?>

					<a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>" class="main-btn"> <?php echo esc_html( $link['title'] ); ?></a>
 				
 				<?php endif; ?>
 			</div> 
 		</div>
 		<?php $counter++; endforeach; ?>
 	</div>
 </div>	
<?php endif; ?>