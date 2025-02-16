<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product/tabs/tabs.php.
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
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$tabs  = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>

	<div class="gap">
		<div class="tab-section">
			<ul class="nav nav-tabs single-btn">
				<?php

				foreach ( $tabs as $key => $tab ) :
					$active = ( $key == strtolower( actavista_set( $tab, 'title' ) ) ) ? 'active' : '';
					?>
					<li class="nav-item">
						<a class="<?php echo esc_attr( $active ); ?>" href="#<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo actavista_set( $tab, 'title' ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<?php

				foreach ( $tabs as $key => $tab ) :
					$active = ( $key == strtolower( actavista_set( $tab, 'title' ) ) ) ? 'active fade show' : '';
					?>
					<div class="tab-pane <?php echo esc_attr( $active ); ?>" id="<?php echo esc_attr( $key ); ?>">
						<?php if ( isset( $tab[ 'callback' ] ) ) {
							call_user_func( $tab[ 'callback' ], $key, $tab );
						} ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<?php endif; ?>
