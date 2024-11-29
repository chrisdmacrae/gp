	<div class="donation-payment-top">
		<div class="donation-payment-bg" style="background: url('<?php echo esc_url(  wp_get_attachment_url(wpcm_get_settings()->get('donation_Cpost_bg'))); ?>') no-repeat center;"></div>
		<span class="tag-lne"><?php echo wp_kses_post(wpcm_get_settings()->get('donation_Cpost_subtitle')); ?></span>
		<h3><?php echo wp_kses_post(wpcm_get_settings()->get('donation_Cpost_title')); ?></h3>
		<p><?php echo wp_kses_post(wpcm_get_settings()->get('donation_Cpost_text')); ?></p>
		<span><?php esc_html_e( 'Please Select the payment type', 'actavista'); ?></span>
	</div>
<div class="donation-payment-inner">
	<div class="row">
		<div class="<?php echo (  $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-lg-12' : 'offset-lg-2 col-lg-8'; ?>">
			<div class="d-payment-form">
				<form id="donation-payment" action="">
		<ul class="d-payment-type">
			<?php $donation_recurring_payments = (wpcm_get_settings()->get('donation_recurring_payments')  === false ) ? false : wpcm_get_settings()->get('donation_recurring_payments'); 
			if ( $donation_recurring_payments  ) :  ?>
			<li>
				<input type="radio" id="recurring" name="payment-cycle"data-type="recuring" @click.prevent="step = 1;recurring = true" :class="(recurring) ? 'active' : ''">
				<label for="recurring"><?php esc_html_e( 'Recurring', 'actavista' ); ?></label>
			</li>
		<?php endif;?>
		<li>
			<input type="radio" id="onetime" name="payment-cycle" data-type="one" href="#" @click.prevent="step = 1;recurring = false" :class="(!recurring) ? 'active' : ''">
			<label for="onetime"><?php esc_html_e( 'One time', 'actavista' ); ?></label>
		</li>   
		</ul>
	
		<div class="recuring-paypal" v-show="recurring" style="display: block;">
			<div class="recurring-cycle">
				<div class="textfieldd el-custom-select">
					<el-select v-model="billing_period" size="large">
						<el-option selected="selected" value=""><?php esc_html_e('Payment Cycle', 'webinane-donation') ?></el-option>
						<el-option value="daily" label="Daily"></el-option>
						<el-option value="weekly" label="Weekly"></el-option>
						<el-option value="fortnightly" label="Fortnightly"></el-option>
						<el-option value="Month" label="Monthly"></el-option>
						<el-option value="quaterly" label="Quaterly"></el-option>
						<el-option value="half yearly" label="Half yearly"></el-option>
						<el-option value="yearly" label="Yearly"></el-option>
					</el-select>

				</div>
			</div>
		</div>
		<?php $donation_multicurrency = (wpcm_get_settings()->get('donation_multicurrency')  === false ) ? false : wpcm_get_settings()->get('donation_multicurrency') ; 
		if ( $donation_multicurrency ) : ?>
			<div class="currency-selct">
				<div class="textfieldd el-custom-select">
					<el-select v-model="currency" size="large">
						<el-option v-for="(label, opt_key) in currencies" :key="opt_key" :value="opt_key" :label="label"></el-option>
					</el-select>
				</div>
			</div>
		<?php endif; ?>		
		<div class="donation-amount-list">
			<span><?php esc_html_e( 'How much would you like to donate?', 'actavista'); ?></span>
			<?php $donation_predefined_amounts = (wpcm_get_settings()->get('donation_predefined_amounts')  === false ) ? false : wpcm_get_settings()->get('donation_predefined_amounts') ;  
			if ( $donation_predefined_amounts  ) : ?>
				<ul>
					<li v-for="amt in amount_slabs" v-if="amount_slabs">
						<a :class="{active: amount == amt, 'wpdonation-button': true}" @click.prevent="amount = amt" href="#" title="">
						{{amt}}</a>
					</li>
				</ul>
			<?php endif; ?>
			<div class="custom-amnt-box">
				<?php $donation_predefined_amounts = (wpcm_get_settings()->get('donation_predefined_amounts')  === false ) ? false : wpcm_get_settings()->get('donation_predefined_amounts') ; 
				if ( $donation_predefined_amounts  ) : ?>
					<span><?php esc_html_e( 'OR', 'actavista'); ?></span>
				<?php endif; ?>
				<?php $donation_custom_amount = (wpcm_get_settings()->get('donation_custom_amount')  == false ) ? false : wpcm_get_settings()->get('donation_custom_amount') ; 
				if ( $donation_custom_amount ) : ?>
					<input v-model="amount" type="text" name="custom-amnt" placeholder="<?php esc_attr_e( 'Enter the Amount You Want', 'actavista'); ?>">
				<?php endif; ?>
			</div>		
		</div>
			<div class="your-donation">
				<span class="popup-title"><?php esc_html_e('Select your payment option', 'webinane-donation'); ?></span>
				<ul class="donation-payment-types">
					<li v-if="gateways" v-for="(gateway, gateway_id) in gateways">
						<a @click.prevent="payment_method = gateway.id" :class="getwayActiveClass(gateway.id)" title="" href="#">{{ gateway.name }}</a>
					</li>

				</ul>
			</div>
		<?php do_action('webinane_checkout_payment_gateway_data') ?>
		<div class="donation-detail-fields">
			<div class="row">
				<div class="col-lg-6">
					<input type="text" placeholder="<?php esc_html_e('First Name', 'webinane-donation') ?>" v-model="billing_fields.first_name" :disabled="loading" required>
				</div>
				<div class="col-lg-6">
					<input type="text" placeholder="<?php esc_html_e('Last Name', 'webinane-donation') ?>" v-model="billing_fields.last_name" :disabled="loading" required>
				</div>
				<div class="col-lg-12">
					<input type="email" placeholder="<?php esc_html_e('Email Address', 'webinane-donation') ?>" v-model="billing_fields.email" :disabled="loading" required>
				</div>
				<div class="col-lg-12">
					<input type="text" placeholder="<?php esc_html_e('Phone Number', 'webinane-donation') ?>" v-model="billing_fields.phone" :disabled="loading">
				</div>
				<div class="col-lg-12">
					<textarea placeholder="<?php esc_html_e('Address', 'webinane-donation') ?>" v-model="billing_fields.address" :disabled="loading"></textarea>
				</div>
				<div class="col-lg-12">
					<button class="theme_btn_flat" type="button" @click.prevent="submit()">
						<?php esc_html_e('Donate Now', 'webinane-donation') ?>
						<i class="fa fa-refresh fa-spin" v-if="loading"></i>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
</div>

</div>