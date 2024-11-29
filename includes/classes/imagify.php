<?php
namespace ACTAVISTA\Includes\Classes;

use ACTAVISTA\Includes\Classes\Mobile_Detect;

class Imagify {

	public function __call( $method, $args ) {
		echo esc_html__( "unknown method ", "konia" ) . $method;

		return false;
	}

	public function thumb( $size = array(), $inPost = true, $corp = array(), $url = '', $align = '', $isUrl = false ) {
		if ( class_exists( 'Mobile_Detect' ) ) {
			$resize = new \ACTAVISTA_Resizer();
			$detect = new Mobile_Detect;

			if ( ! empty( $url ) ) {
				$url = $url;
			} else {
				$url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				if ( empty( $url ) ) {
					return;
				}
			}
			if ( $detect->isMobile() ) {
				$sizes = explode( 'x', actavista_set( $size, 'm' ) );
				$corp  = actavista_set( $corp, '0' );
			}
			if ( $detect->isiPad() || $detect->isTablet() ) {
				$sizes = explode( 'x', actavista_set( $size, 'i' ) );
				$corp  = actavista_set( $corp, '1' );
			}
			if ( ! $detect->isMobile() && ! $detect->isiPad() ) {
				$sizes = explode( 'x', actavista_set( $size, 'w' ) );
				$corp  = actavista_set( $corp, '2' );
			}

			return $resize->konia_resize( $url, actavista_set( $sizes, '0' ), actavista_set( $sizes, '1' ), $corp, $align, false, $isUrl );
		} else {
			if ( $inPost == true ) {
				return get_the_post_thumbnail( get_the_ID(), 'full' );
			} else {
				return $url;
			}
		}
	}

}
