
<ul>

    <?php  

   foreach ( $icons as $h_icon ) :

        $header_social_icons = json_decode( urldecode( actavista_set( $h_icon, 'data' ) ) );


        if ( actavista_set( $header_social_icons, 'enable') == '' )                                              

            continue;

        $icon_class = explode( '-', actavista_set( $header_social_icons, 'icon' ) );

        ?>

        <li><a class="<?php echo esc_attr( actavista_set( $icon_class, 1 ) ); ?>" href="<?php echo actavista_set( $header_social_icons, 'url'); ?>" target="_blank" <?php echo ( actavista_set( $header_social_icons, 'background' ) ) ? 'style="background-color:'. actavista_set( $header_social_icons, 'background' ).';"' : ''; ?>><i class="fab <?php echo esc_attr( actavista_set( $header_social_icons, 'icon' ) ); ?>" <?php echo ( actavista_set( $header_social_icons, 'color' ) ) ? 'style="color:' .actavista_set( $header_social_icons, 'color' ).';"' : ''; ?>></i></a></li>

    <?php endforeach;  ?>

</ul>