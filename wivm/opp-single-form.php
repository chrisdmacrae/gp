<?php

/**

 * This template is used to display the sign up form for a single volunteer opportunity.

 *

 * This template is displayed immediately after the_content() is called within your theme file.

 * To adjust this template copy it into your current theme within a folder called "wivm".

 *

 * Please note that the field called "wivm_hp" is a honeypot field used for spam protection. It is

 * hidden via CSS when the form is displayed. Only spambots can see this and when they fill it out

 * the form won't submit. You can turn on or off the honeypot within the plugin settings.

 */

$opp = new WI_Volunteer_Management_Opportunity( $post->ID ); //Get volunteer opportunity information

$options = new WI_Volunteer_Management_Options();

$use_honeypot = $options->get_option( 'use_honeypot' );

?>


<div class="single-volunteer-singlepage">
<h3 class="wivm-form-heading jki"><?php ( $opp->opp_meta['one_time_opp'] == 1 ) ? _e( 'Sign Up to Volunteer', 'actavista' ) : _e( 'Express Interest in Volunteering', 'actavista' ) ; ?></h3>

					

<?php if( $opp->should_allow_rvsps() ): ?>

<div class="loading volunteer-opp-message"><?php _e( 'Please wait...', 'actavista' ); ?></div>

<div class="success volunteer-opp-message"><?php _e( 'Thanks for signing up. You\'ll receive a confirmation email shortly.', 'actavista' ); ?></div>

<div class="already-rsvped volunteer-opp-message"><?php _e( 'It looks like you already signed up for this opportunity.', 'actavista' ); ?></div>

<div class="rsvp-closed volunteer-opp-message"><?php _e( 'We\'re sorry, but we weren\'t able to sign you up. We have no more open spots.', 'actavista' ); ?></div>

<div class="error volunteer-opp-message"><?php _e( 'Please fill in every field and make sure you entered a valid email address.', 'actavista' ); ?></div>



<form id="wivm-sign-up-form" method="POST" url="<?php the_permalink(); ?>">
	<div class="row">

	<?php wp_nonce_field( 'wivm_sign_up_form_nonce', 'wivm_sign_up_form_nonce_field' ); ?>



	<?php do_action( 'wivm_start_sign_up_form_fields', $post ); ?>

	<div class="col-sm-6 col-lg-6 col-xs-12">
		<input placeholder="<?php esc_attr_e( 'First Name:', 'actavista' ); ?>" type="text" id="wivm_first_name" name="wivm_first_name" value="" />
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
		<input type="text" placeholder="<?php esc_attr_e( 'Last Name:', 'actavista' ); ?>" id="wivm_last_name" name="wivm_last_name" value="" />
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
		<input type="text" placeholder="<?php esc_attr_e( 'Phone:', 'actavista' ); ?>" id="wivm_phone" name="wivm_phone" value="" />
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
	     <input type="email" placeholder="<?php esc_attr_e( 'Email:', 'actavista' ); ?>" id="wivm_email" name="wivm_email" value="" />

	</div>

	<?php if( $use_honeypot == 1 ): ?>
	
	<label for="wivm_hp" class="wivm_hp"><?php _e( 'Name:', 'actavista' ); ?></label>

	<input type="text" class="wivm_hp" id="wivm_hp" name="wivm_hp" value=""  autocomplete="off" />

	<?php endif; ?>



	<?php do_action( 'wivm_end_sign_up_form_fields', $post ); ?>

	<div class="col-sm-6 col-lg-6 col-xs-12">

	<input type="hidden" id="wivm_opportunity_id" name="wivm_opportunity_id" value="<?php echo the_ID(); ?>" />

	<input type="submit" value="<?php ( $opp->opp_meta['one_time_opp'] == 1 ) ? _e( 'Sign Up', 'actavista' ) : _e( 'Express Interest', 'actavista' ) ; ?>" />
		</div>
</form>

<?php else: ?>

	<p><?php _e( 'We\'re sorry, but we\'re no longer accepting new volunteers for this opportunity.', 'actavista' ); ?></p>

<?php endif; ?>
</div>