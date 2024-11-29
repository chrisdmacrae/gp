<?php
/**
* About Us File 
*
* @package Actavista
* @author  Webinane
* @version 1.0
*/
 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 $timings = json_decode( urldecode( $timing_info ) );
 $contacts = json_decode( urldecode( $contact_descc ) );
 if ( $contacts ) : ?>
 <div class="contact-info-box">
 	<div class="timing-info">
 		<h5><?php echo esc_html( $title ); ?></h5>
 		<?php if ( $timings ) :  foreach( $timings as $timing ) : ?>
 			<div class="t-info-area">
 				<span class="days-active"><?php echo wp_kses_post( actavista_set( $timing, 'timing1' ) ); ?></span>
 				<span><?php echo wp_kses_post( actavista_set( $timing, 'timing2' ) ); ?></span>
 			</div>
 		<?php  endforeach; endif; ?>
 	</div>
 	<div class="address-info">
 		<h5><?php echo esc_html( $title2 ); ?></h5>
 		<p><?php echo esc_html( $address ); ?></p>
 		<?php if ( $contacts ) :  ?>
 			<ul class="address-meta">
 				<?php foreach( $contacts as $contact ) : ?>
 					<li>
 						<?php $icon = ( actavista_set( $contact, 'icon_typee' ) == 'icon_icon' ) ? actavista_set( $contact, 'iconicone' ) : actavista_set( $contact, 'info_icon2e' ); ?>

 						<i class="<?php echo esc_attr( $icon ); ?>"></i>

 						<strong><?php echo wp_kses_post( actavista_set( $contact, 'label' )  ); ?></strong>

 						<span><?php echo wp_kses_post( actavista_set( $contact, 'info_contact' )  ); ?></span>

 					</li>
 				<?php  endforeach; ?>
 			</ul>
 		<?php endif;?>
 		<?php  $contacts = json_decode( urldecode($add_social_icons ) );
 		if( $enable_social_icon && $contacts ) : ?>
 		<ul class="contact-social-info">
 			<?php foreach( $contacts as $contact ) : ?>
 				<li><a href="<?php echo esc_url( actavista_set( $contact, 'icon_link' ) ); ?>"  class="facebook"><i class="fab <?php echo esc_attr( actavista_set( $contact, 'social_icon' ) ); ?>"></i></a></li>
 			<?php endforeach; ?>
 		</ul>
 	<?php endif; ?>
 </div>
</div>
<?php endif; ?>