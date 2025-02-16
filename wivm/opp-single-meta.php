<?php

/**

 * This template is used to display the meta (time, location, etc.) for a single volunteer opportunity.

 *

 * This template is displayed immediately before the_content() is called within your theme file.

 * To adjust this template copy it into your current theme within a folder called "wivm".

 */

$opp = new WI_Volunteer_Management_Opportunity( $post->ID ); //Get volunteer opportunity information

?>



<div class="volunteer-opp-info">

	<?php $opp->display_meta( ( $opp->opp_meta['one_time_opp'] == 1 ) ? $opp->format_opp_times() : $opp->opp_meta['flexible_frequency'], __( 'When:', 'actavista' ) ); ?>

	<ul>
	<li><i class="fa fa-map-marker"></i><?php $opp->display_meta( $opp->format_address(), 										__( 'Where:', 'actavista' ) ); ?></li>



	<li><i class="fa fa-user"></i><?php $opp->display_meta( $opp->opp_meta['contact_name'], 								__( 'Contact:', 'actavista' ) ); ?></li>

	<li><i class="fa fa-envelope"></i><?php $opp->display_meta( $opp->get_email_as_link( $opp->opp_meta['contact_email'] ), 	__( 'Contact Email:', 'actavista' ) ); ?></li>

	<li><i class="fa fa-phone"></i><?php $opp->display_meta( $opp->opp_meta['contact_formatted_phone'], 					__( 'Contact Phone:', 'actavista' ) ); ?></li>



	<li><i class="fa fa-gamepad"></i><?php $opp->display_meta( $opp->get_open_volunteer_spots(), 							__( 'Open Volunteer Spots:', 'actavista' ) ); ?></li>
	</ul>
</div><!-- .volunteer-opp-info -->