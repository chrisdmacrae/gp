 <?php 
    /**
     * Single Video File.
     *
     * @package Actavista
     * @author  Webinane
     * @version 1.0
     */

?> 
<figure>
  <div class="singlee audio">

   <?php 

   		$video = actavista_vd_details( $video );

        
      	echo ( actavista_set( $video, 'embed_video' ) );

    ?>


</div>
</figure>