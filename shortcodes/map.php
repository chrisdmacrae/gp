<?php
/**
 * Google Map Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php $add_map = json_decode( urldecode( $add_map ) ); 

 wp_enqueue_script(array( 'google-api', 'map-init' ) );
?>

<?php if ( $add_map ) : ?>
    <div class="entry-content">

        <div class="gen-map google-map-wrap">
            <div id="map-canvas" class="google-map loc-map">
            </div><!-- #google-map -->
        </div>

        <?php
        $locations = array();

        foreach ( $add_map as $map ) {
            $locations[] = array(
                'google_map' => array(
                    'lat' => actavista_set( $map, 'latitude' ),
                    'lng' => actavista_set( $map, 'longitude' ),
                ),
                'location_address' => actavista_set( $map, 'address' ),
                'location_name'    => actavista_set( $map, 'title' ),
            );
        }


        ?>

        <?php
        /* Set Default Map Area Using First Location */
        $map_area_lat = isset( $locations[0]['google_map']['lat'] ) ? $locations[0]['google_map']['lat'] : '';
        $map_area_lng = isset( $locations[0]['google_map']['lng'] ) ? $locations[0]['google_map']['lng'] : '';
        ?>

        <script>
            jQuery( document ).ready( function($) {

                /* Do not drag on mobile. */
                var is_touch_device = 'ontouchstart' in document.documentElement;

                var map = new GMaps({
                    el: '#map-canvas',
                    lat: '<?php echo esc_attr( $map_area_lat ); ?>',
                    lng: '<?php echo esc_attr($map_area_lng ); ?>',
                    scrollwheel: false,
                    draggable: ! is_touch_device
                });

                /* Map Bound */
                var bounds = [];

                <?php /* For Each Location Create a Marker. */
                foreach( $locations as $location ){
                    $name = $location['location_name'];
                    $addr = $location['location_address'];
                    $map_lat = $location['google_map']['lat'];
                    $map_lng = $location['google_map']['lng'];
                    ?>
                    /* Set Bound Marker */
                    var latlng = new google.maps.LatLng(<?php echo esc_attr( $map_lat ); ?>, <?php echo esc_attr( $map_lng ); ?>);
                    bounds.push(latlng);
                    /* Add Marker */
                    map.addMarker({
                        lat: <?php echo esc_attr( $map_lat ); ?>,
                        lng: <?php echo esc_attr( $map_lng ); ?>,
                        title: '<?php echo esc_attr( $name ); ?>',
                        infoWindow: {
                            content: '<h5><?php echo esc_attr( $name ); ?></h5><p><?php echo esc_attr( $addr ); ?></p>'
                        }
                    });
                    <?php } //end foreach locations ?>

                    /* Fit All Marker to map */
                    map.fitLatLngBounds(bounds);

                    /* Make Map Responsive */
                    var $window = $(window);
                    function mapWidth() {
                        var size = $('.google-map-wrap').width();
                        $('.google-map').css({width: size + 'px'});
                    }
                    mapWidth();
                    $(window).resize(mapWidth);

                });
            </script>

            </div><!-- .entry-content -->

            <?php

endif;
