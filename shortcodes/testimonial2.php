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

 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {



	$img_obj = new ACTAVISTA_Resizer();

}

 ?>

<?php $testimonials = json_decode( urldecode( $add_testimonials ) ); ?>

<?php if($testimonials) : ?>

 <div class="row">

 	<div class="col-lg-12">

 		<div class="testimonial-area">

 			<div class="testimonial-newslider">

 				<?php foreach($testimonials as $testimonial) : ?>

	 			<div class="newtesti-item">

	 				<div class="newtest-img">
	 					<figure>

							<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $testimonial, 'image' ), 'full' ), 180, 180, true ) ); ?>

							<?php else : ?>

								<?php echo wp_get_attachment_image( actavista_set( $testimonial, 'image' ), 'full' ); ?>

							<?php endif; ?>

						</figure>

	 				</div>

	 				<div class="newtesti-content">

	 					<p><?php echo wp_kses_post( actavista_set( $testimonial, 'test_description' ) ); ?></p>

						<span><?php echo wp_kses_post( actavista_set( $testimonial, 'testi_name' ) ); ?></span>

						<i><?php echo wp_kses_post( actavista_set( $testimonial, 'designation' ) ); ?></i>

	 				</div>

	 			</div>

	 			<?php endforeach; ?>

	 		</div>

 		</div>

 	</div>

 </div>



 <?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>

	<?php 

	$caro_speed = $caro_speed ? $caro_speed : 1000;

	$play = $enable_autoplay ? 'true' : 'false';

	$custom_script = 'jQuery(document).ready(function ($) {   

		$( ".testimonial-newslider" ).owlCarousel({

			items: 1,

			loop: true,

			margin: 0,

			autoplay: '.$play.',

			autoplayTimeout: '.$caro_speed.',

			smartSpeed: '.$caro_speed.',

			autoplayHoverPause: '.$play.',

			nav: true,

			dots: false,

			responsiveClass:true,

			responsive:{

				0:{

					items:1,

				},

				600:{

					items:1,



				},

				1000:{

					items:1,

				}

			}



		});

	});';

	wp_add_inline_script( 'script', $custom_script );

	?>



<?php endif; ?>