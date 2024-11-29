<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;
// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}
global $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 6 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
$featured_image    = get_post_thumbnail_id( get_the_ID() );
$gallery           = array_merge( $product->get_gallery_image_ids(), array( $featured_image ) );
$object            = new konia_Imagify();
if ( get_post_meta( get_the_ID(), 'product_style', true ) != 'none' ) {
	$layout = get_post_meta( get_the_ID(), 'product_style', false );
} elseif ( konia_get_opt( 'product_single_layout' ) ) {
	$layout = array( konia_get_opt( 'product_single_layout' ) );
} else {
	$layout = array( 'classic' );
}
$style_metas = array(
	'classic' => array(
		'class'    => 'silver-caro',
		'fullsize' => array( 'm' => "500x300", 'i' => "500x340", 'w' => "540x420" ),
	),
	'diamond' => array(
		'class'    => 'silver-caro',
		'fullsize' => array( 'm' => "500x300", 'i' => "500x340", 'w' => "560x520" ),
	),
	'mobile'  => array(
		'class'     => 'mobile-carousel',
		'subclass'  => 'mob-caro-btn',
		'fullsize'  => array( 'm' => "240x165", 'i' => "635x435", 'w' => "530x360" ),         //done
		'thumbnail' => array( 'm' => "90x60", 'i' => "90x60", 'w' => "90x60" ),
	),
	'pearl'   => array(
		'class'     => 'slider-for-pearl',
		'subclass'  => 'slider-nav-pearl',
		'fullsize'  => array( 'm' => "250x340", 'i' => "440x590", 'w' => "440x590" ),         //done
		'thumbnail' => array( 'm' => "120x120", 'i' => "120x120", 'w' => "120x120" ),
		'vertical'  => 'false',
	),
	'spinel'  => array(
		'class'     => 'slider-for-gold',
		'subclass'  => 'slider-nav-gold',
		'fullsize'  => array( 'm' => "180x200", 'i' => "390x440", 'w' => "390x440" ),         //done
		'thumbnail' => array( 'm' => "60x60", 'i' => "60x60", 'w' => "60x60" ),
		'vertical'  => 'true',
	),
);
if ( isset( $style_metas[ konia_set( $layout, '0' ) ] ) ) {
	$slider_class = $style_metas[ konia_set( $layout, '0' ) ];
} else {
	$slider_class = array(
		'class'     => 'slider-for-gold',
		'subclass'  => 'slider-nav-gold',
		'fullsize'  => array( 'm' => "200x300", 'i' => "500x340", 'w' => "440x590" ),
		'thumbnail' => array( 'm' => "118x130", 'i' => "118x130", 'w' => "118x130" ),
		'vertical'  => 'true',
	);
}
if ( ! empty( $gallery ) && count( $gallery ) > 1 ) :
	if ( array_intersect( array( 'classic', 'diamond' ), $layout ) ) :
		?>
		<div class="<?php foreach ( $wrapper_classes as $class ) : echo esc_attr( $class ) . ' '; endforeach; ?>">
			<div class="woocommerce-product-gallery__image">
				<div class="<?php echo esc_attr( konia_set( $slider_class, 'class' ) ); ?>">
					<?php

					foreach ( $gallery as $g ) :
						$image = konia_set( wp_get_attachment_image_src( $g, 'full' ), '0' );
						?>
						<span><img class='wp-post-image' src="<?php echo esc_url( $object->konia_thumb( konia_set( $slider_class, 'fullsize' ), false, array(
								true,
								true,
								true
							), $image, 'c', true, true ) ); ?>" alt="<?php esc_attr_e( 'image not found', 'actavista' ); ?>"></span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php

		$script = 'jQuery(".' . esc_js( konia_set( $slider_class, 'class' ) ) . '").owlCarousel({
                                items: 1,
                                loop: true,
                                margin:0,
                                autoplay: false,
                                autoplayTimeout: 2000,
                                smartSpeed: 1500,
                                animateIn: "fadeIn",
                                animateOut: "fadeOut",
                                autoplayHoverPause: true,
                                nav: false,
                                dots: true,
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

                                });';
		wp_enqueue_script( 'owl-carousel' );
		wp_add_inline_script( 'owl-carousel', $script );
	elseif ( 'mobile' == konia_set( $layout, '0' ) ) :
		?>
		<div class="<?php foreach ( $wrapper_classes as $class ) : echo esc_attr( $class ) . ' '; endforeach; ?>">
			<div class="woocommerce-product-gallery__image">
				<div class="mobile-carousel">
					<?php

					foreach ( $gallery as $g ) :
						$image = konia_set( wp_get_attachment_image_src( $g, 'full' ), '0' );
						?>
						<div class="insta-itme" data-hash="link<?php echo esc_attr( $g ); ?>">
							<img class='wp-post-image' src="<?php echo esc_url( $object->konia_thumb( konia_set( $slider_class, 'fullsize' ), false, array(
								true,
								true,
								true
							), $image, 'c', true, true ) ); ?>" alt="<?php esc_attr_e( 'image not found', 'actavista' ); ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<ul class="mob-caro-btn">
					<?php

					foreach ( $gallery as $g ) :
						$image = konia_set( wp_get_attachment_image_src( $g, 'full' ), '0' );
						?>
						<li>
							<a href="#link<?php echo esc_attr( $g ); ?>"><img src="<?php echo esc_url( $object->konia_thumb( konia_set( $slider_class, 'thumbnail' ), false, array(
									true,
									true,
									true
								), $image, 'c', true, true ) ); ?>" alt="<?php esc_attr_e( 'image not found', 'actavista' ); ?>"></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php

		$script = 'jQuery(".mobile-carousel").owlCarousel({
                                        items:1,
                                        loop:false,
                                        margin:0,
                                        smartSpeed:1000,
                                        dots:false,
                                        nav:false,
                                        animateIn: "fadeIn",
                                        animateOut: "fadeOut",
                                    });
                                    jQuery(".mob-caro-btn").owlCarousel({
                                        items:3,
                                        loop:false,
                                        margin:10,
                                        dots:false,
                                        nav:false,
                                        URLhashListener:true,
                                        startPosition: "URLHash",
                                        responsive:{
                                        0:{
                                            items:2,
                                            nav:false,
                                        },
                                        600:{
                                            items:3,
                                            nav:false,
                                        },
                                    }
                                });';
		wp_enqueue_script( 'owl-carousel' );
		wp_add_inline_script( 'owl-carousel', $script );
	else :
		?>
		<div class="<?php foreach ( $wrapper_classes as $class ) : echo esc_attr( $class ) . ' '; endforeach; ?>">
			<div class="woocommerce-product-gallery__image">
				<div class=" <?php echo ( konia_set( $layout, '0' ) == 'spinel' ) ? 'prod-avatar spinel' : ''; ?>">
					<ul class="<?php echo esc_attr( konia_set( $slider_class, 'class' ) ); ?>">
						<?php
						foreach ( $gallery as $g ) :
							$image = konia_set( wp_get_attachment_image_src( $g, 'full' ), '0' );
							?>
							<li>
								<img src="<?php echo esc_url( $object->konia_thumb( konia_set( $slider_class, 'fullsize' ), false, array(
									true,
									true,
									true
								), $image, 'c', true, true ) ); ?>" alt="<?php esc_attr_e( 'image not found', 'actavista' ); ?>">
							</li>
						<?php endforeach; ?>
					</ul>
					<ul class="<?php echo esc_attr( konia_set( $slider_class, 'subclass' ) ); ?>">
						<?php

						foreach ( $gallery as $g ) :
							$image = konia_set( wp_get_attachment_image_src( $g, 'full' ), '0' );
							?>
							<li>
								<img src="<?php echo esc_url( $object->konia_thumb( konia_set( $slider_class, 'thumbnail' ), false, array(
									true,
									true,
									true
								), $image, 'c', true, true ) ); ?>" alt="<?php esc_attr_e( 'image not found', 'actavista' ); ?>">
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php

		$vertical = ( 'spinel' == konia_set( $layout, '0' ) ) ? 'true' : 'false';
		$script   = 'jQuery(".' . esc_js( konia_set( $slider_class, 'class' ) ) . '").slick({
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                    slide: "li",
                                    fade: false,
                                    asNavFor: ".' . esc_js( konia_set( $slider_class, 'subclass' ) ) . '"
                                });
                                jQuery(".' . esc_js( konia_set( $slider_class, 'subclass' ) ) . '").slick({
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        asNavFor: ".' . esc_js( konia_set( $slider_class, 'class' ) ) . '",
                                        dots: false,
                                        arrows: true,
                                        slide: "li",
                                        vertical: ' . esc_js( konia_set( $slider_class, "vertical" ) ) . ',
                                        centerMode: true,
                                        centerPadding: "0",
                                        focusOnSelect: true,
                                        responsive: [
                                        {
                                            breakpoint: 768,
                                            settings: {
                                                slidesToShow: 3,
                                                slidesToScroll: 1,
                                                infinite: true,
                                                vertical: false,
                                                centerMode: true,
                                                dots: false,
                                                arrows: false
                                            }
                                        },
                                        {
                                            breakpoint: 641,
                                            settings: {
                                                slidesToShow: 2,
                                                slidesToScroll: 1,
                                                infinite: true,
                                                vertical: ' . esc_js( $vertical ) . ',
                                                centerMode: true,
                                                dots: false,
                                                arrows: false
                                            }
                                        }
                                    ]
                                });';
		wp_enqueue_script( 'slick' );
		wp_add_inline_script( 'slick', $script );
	endif;
else:
	$single_image = array( 'm' => "500x460", 'i' => "500x460", 'w' => "500x460" );
	?>
	<div class="<?php foreach ( $wrapper_classes as $class ) : echo esc_attr( $class ) . ' '; endforeach; ?>">
		<div class="woocommerce-product-gallery__image extra-bottom">
			<?php echo wp_kses( $object->konia_thumb( $single_image, true, array( true, true, true ) ), true ); ?>
		</div>
	</div>
<?php
endif;

