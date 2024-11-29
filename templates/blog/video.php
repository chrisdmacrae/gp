 <?php 
    /**
     * Single Video File.
     *
     * @package Actavista
     * @author  Webinane
     * @version 1.0
     */

   		$video = actavista_vd_details( $video );

        
      	echo ( actavista_set( $video, 'embed_video' ) );

    ?>
