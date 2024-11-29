<?php
namespace ACTAVISTA\Includes\Classes;

use ACTAVISTA\Includes\Classes\Imagify;

class Actavista_Image_Size {
	private $attr;

	public function __construct( $args ) {
		$this->attr = $args;
		call_user_func( array( $this, $this->attr[ 'function' ] ) );
	}

	public function masonary_product_category() {
		$size = array(
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "370x400" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "760x400" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "760x400" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "370x400" ),
		);
		echo ( new Imagify() )->thumb( $size[ $this->attr[ 'size_counter' ] ], false, array(
			true,
			true,
			true
		), $this->attr[ 'image' ] );
	}

	public function featured_product() {
		if ( ! empty( $this->attr[ 'custom_size' ] ) AND is_array( $this->attr[ 'custom_size' ] ) ) {
			$size = $this->attr[ 'custom_size' ];
		} else {
			$size = array( 'm' => "330x300", 'i' => "555x513", 'w' => "555x513" );
		}
		?>
		<figure>
			<?php
			echo ( new Imagify() )->thumb( $size, true, array(
				true,
				true,
				true
			) );
			?>
		</figure>
		<?php
	}

	public function masonary_filter_product() {
		$size = array(
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x305" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "400x470" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "400x470" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "400x470" ),
			array( 'm' => "300x165", 'i' => "420x220", 'w' => "400x303" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x305" ),

			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x305" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x470" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x470" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x303" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x305" ),
			array( 'm' => "370x400", 'i' => "200x220", 'w' => "400x305" ),
		);
		?>
		<figure class="<?php echo actavista_output( $this->attr[ 'size_counter' ] ) ?>">
			<?php
			echo ( new Imagify() )->thumb( $size[ $this->attr[ 'size_counter' ] ], true, array(
				true,
				true,
				true,
			) );
			?>
		</figure>
		<?php
	}

	public function grid_products() {
		if ( ! empty( $this->attr[ 'custom_size' ] ) AND is_array( $this->attr[ 'custom_size' ] ) ) {
			$size = $this->attr[ 'custom_size' ];
		} else {
			if ( in_array( 'vc_col-lg-4', $this->attr[ 'size_class' ] ) ) {
				$w = '430x557';
			} elseif ( in_array( 'vc_col-lg-3', $this->attr[ 'size_class' ] ) ) {
				$w = '315x408';
			} else {
				$w = '660x855';
			}

			if ( in_array( 'vc_col-md-4', $this->attr[ 'size_class' ] ) ) {
				$i = '322x371';
			} elseif ( in_array( 'vc_col-md-3', $this->attr[ 'size_class' ] ) ) {
				$i = '234x270';
			} else {
				$i = '497x584';
			}

			$size = array( 'm' => '660x855', 'i' => $i, 'w' => $w );
		}
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}

	public function grid_filter_product() {
		if ( ! empty( $this->attr[ 'custom_size' ] ) AND is_array( $this->attr[ 'custom_size' ] ) ) {
			$size = $this->attr[ 'custom_size' ];
		} else {
			if ( in_array( 'vc_col-lg-4', $this->attr[ 'size_class' ] ) ) {
				$w = '420x544';
			} elseif ( in_array( 'vc_col-lg-3', $this->attr[ 'size_class' ] ) ) {
				$w = '307x398';
			} else {
				$w = '645x570';
			}

			if ( in_array( 'vc_col-md-4', $this->attr[ 'size_class' ] ) ) {
				$i = '311x372';
			} elseif ( in_array( 'vc_col-md-3', $this->attr[ 'size_class' ] ) ) {
				$i = '226x270';
			} else {
				$i = '482x575';
			}

			$size = array( 'm' => '482x575', 'i' => $i, 'w' => $w );
		}
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}

	public function classic() {
		$size = array( 'm' => "660x855", 'i' => "660x855", 'w' => "660x855" );
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}

	public function list_style() {
		$size = array( 'm' => "320x410", 'i' => "345x440", 'w' => "270x350" );
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}

	public function overlay() {
		if ( ! empty( $this->attr[ 'custom_size' ] ) AND is_array( $this->attr[ 'custom_size' ] ) ) {
			$size = $this->attr[ 'custom_size' ];
		} else {
			if ( in_array( 'col-lg-4', $this->attr[ 'size_class' ] ) ) {
				$w = '390x471';
			} elseif ( in_array( 'col-lg-3', $this->attr[ 'size_class' ] ) ) {
				$w = '293x345';
			} else {
				$w = '645x760';
			}

			if ( in_array( 'col-md-4', $this->attr[ 'size_class' ] ) ) {
				$i = '342x403';
			} elseif ( in_array( 'col-md-3', $this->attr[ 'size_class' ] ) ) {
				$i = '226x267';
			} else {
				$i = '482x567';
			}

			$size = array( 'm' => '645x760', 'i' => $i, 'w' => $w );
		}
		?>
		<figure>
			<?php
			echo ( new Imagify() )->thumb( $size, true, array(
				true,
				true,
				true,
			) );
			?>
		</figure>
		<?php
	}

	public function fancy_products_carousel() {
		$size = array( 'm' => "381x399", 'i' => "381x399", 'w' => "517x542" );
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}

	public function grid_products_two() {
		if ( ! empty( $this->attr[ 'custom_size' ] ) AND is_array( $this->attr[ 'custom_size' ] ) ) {
			$size = $this->attr[ 'custom_size' ];
		} else {
			if ( in_array( 'vc_col-lg-4', $this->attr[ 'size_class' ] ) ) {
				$w = '340x408';
			} elseif ( in_array( 'vc_col-lg-3', $this->attr[ 'size_class' ] ) ) {
				$w = '315x408';
			} else {
				$w = '640x648';
			}

			if ( in_array( 'vc_col-md-4', $this->attr[ 'size_class' ] ) ) {
				$i = '340x408';
			} elseif ( in_array( 'vc_col-md-3', $this->attr[ 'size_class' ] ) ) {
				$i = '330x396';
			} else {
				$i = '640x648';
			}

			$size = array( 'm' => '640x648', 'i' => $i, 'w' => $w );
		}
		echo ( new Imagify() )->thumb( $size, true, array(
			true,
			true,
			true
		) );
	}
}
