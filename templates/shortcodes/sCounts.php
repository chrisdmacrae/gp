<?php

$thiss = new SC_Class(); 

$apsc_settings = $thiss->apsc_settings;
$cache_period = ($apsc_settings['cache_period'] != '') ? $apsc_settings['cache_period']*60*60 : 24 * 60 * 60;

$apsc_settings['social_profile_theme'] = isset($atts['theme'])?$atts['theme']:$apsc_settings['social_profile_theme']; 
$format = isset($apsc_settings['counter_format'])?$apsc_settings['counter_format']:'comma';
?>

<div class="apsc-<?php echo esc_attr( $apsc_settings['social_profile_theme'] ); ?>" >
	<div class="row">
		<div class="col-lg-12">
			<ul class="ftr-socials">
				<?php
				foreach ($apsc_settings['profile_order'] as $social_profile) {
					if (isset($apsc_settings['social_profile'][$social_profile]['active']) && $apsc_settings['social_profile'][$social_profile]['active'] == 1) {
						?>

						<?php
						$count = $thiss->get_count($social_profile);
						$count = ($count!=0)?$thiss->get_formatted_count($count,$format):$count;
						switch ($social_profile) {
							case 'facebook':
							$facebook_page_id = $apsc_settings['social_profile']['facebook']['page_id'];
							?>
							<li>
								<a class="clearfix" href="<?php echo "https://facebook.com/" . $facebook_page_id; ?>" target="_blank" <?php do_action('apsc_facebook_link');?>>
									<i class="fa fa-facebook facebook"></i><span>Facebook<i><?php echo esc_attr($count); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>

								</a>
							</li>
							<?php
							break;
							case 'twitter':
							?>
							<li>
								<a  class="clearfix"  href="<?php echo 'https://twitter.com/'.$apsc_settings['social_profile']['twitter']['username'];?>" target="_blank"  <?php do_action('apsc_twitter_link');?>>

									<i class="fa fa-twitter twitter"></i><span>Twitter<i><?php echo esc_attr($count); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>

								</a>
							</li>
							<?php
							break;
							case 'googlePlus':
							$social_profile_url = 'https://plus.google.com/' . $apsc_settings['social_profile']['googlePlus']['page_id'];
							?>
							<li>
								<a href="<?php echo esc_url( $social_profile_url ); ?>" target="_blank"  <?php do_action('apsc_googlePlus_link');?>>

									<i class="google fa fa-google-plus"></i><span>Google Plus<i><?php echo esc_attr( $count ); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>
									
								</a>
							</li>
							<?php
							break;
							case 'instagram':
							$username = $apsc_settings['social_profile']['instagram']['username'];
							$user_id = $apsc_settings['social_profile']['instagram']['user_id'];
							$social_profile_url = 'https://instagram.com/' . $username;
							?>
							<li>
								<a  href="<?php echo esc_url( $social_profile_url ); ?>" target="_blank"   <?php do_action('apsc_instagram_link');?>>
									
									<i class="instagram fa fa-instagram"></i>
									
									<span>Instagram<i><?php echo esc_attr( $count ); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>
									
								</a>
							</li>
							<?php
							break;
							case 'youtube':
							$social_profile_url = esc_url($apsc_settings['social_profile']['youtube']['channel_url']);
							?>
							<li>
								<a href="<?php echo esc_url( $social_profile_url ); ?>" target="_blank"  <?php do_action('apsc_youtube_link');?>>
									
									<i class="youtube fa fa-youtube"></i>
									<span>Youtube<i><?php echo esc_attr( $count ); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>
									
								</a>
							</li>
							<?php
							break;
							case 'soundcloud':
							$username = $apsc_settings['social_profile']['soundcloud']['username'];
							$social_profile_url = 'https://soundcloud.com/' . $username;
							?>
							<li>
								<a clearfix" href="<?php echo esc_url( $social_profile_url ); ?>" target="_blank" <?php do_action('apsc_soundcloud_link');?>>
									<i class="soundcloud fa fa-soundcloud"></i>
									<span>SoundCloud<i><?php echo esc_attr( $count ); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>
											
								</a>
							</li>
							<?php
							break;
							case 'dribbble':
							$social_profile_url = 'https://dribbble.com/'.$apsc_settings['social_profile']['dribbble']['username'];
							?>
							<li>
								<a  href="<?php echo esc_url( $social_profile_url ); ?>" target="_blank" <?php do_action('apsc_dribbble_link');?>>
									<i class="dribbble fa fa-dribbble"></i>
									<span>Dribble<i><?php echo esc_attr($count); ?><?php esc_html_e( ' Follwers', 'actavista' ); ?></i></span>
								
								</a>
							</li>
							<?php
							break;
							case 'posts':
							?>
							<li>
								<a href="javascript:void(0);" <?php do_action('apsc_posts_link');?>>
									<i class="posts fa fa-edit"></i>
									<span>Posts<i><?php echo esc_attr($count); ?><?php esc_html_e( ' Published', 'actavista' ); ?></i></span>
									
								</a>
							</li>
							<?php
							break;
							case 'comments':
							?>
							<li>
								<a class="apsc-comment-icon clearfix" href="javascript:void(0);" <?php do_action('apsc_comments_link');?>>
									<i class="comments fa fa-comments"></i>
									<span>Comment<i><?php echo esc_attr($count); ?><?php esc_html_e( ' Comments', 'actavista' ); ?></i></span>
									
								</a>
							</li>
							<?php
							break;
							default:
							break;
						}
						?>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>


