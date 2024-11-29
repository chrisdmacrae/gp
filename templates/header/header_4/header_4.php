<?php $options = actavista_WSH()->option(); ?>

<header class="header_4 urgent-popup-list">
    <?php if( $options->get( 'header4_topbar' ) ) : ?>
        <div class="topbar" style="background-color:<?php echo esc_attr( $options->get( 'header4_topbar_color' ) ); ?>">

            <div class="container">

                <div class="row">

                    <?php if ( $options->get( 'topbar-info' ) ) : ?>
                        <div class="col-lg-7">
                            <div class="top-info-bar">
                                <?php echo wp_kses_post( $options->get( 'topbar-info' ) ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-5">

                        <div class="top-social-icons  pull-right">

                            <?php $icons = $options->get( 'header4_social_share' ); actavista_template_load( 'templates/header/social-icons.php', compact( 'icons' ) ); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    <?php endif; ?>
    <div class="menu-area <?php echo esc_attr($options->get( 'header4_sticky' )) ? 'sticky_header' : ''; ?>" style="background-color:<?php echo esc_attr( $options->get( 'header4_menubar_color' ) ); ?>">

        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <div class="header4-logo">
                        
                        <?php
                        $logo_type = $options->get( 'sticky_logo4_type' );
                        $image_logo = $options->get( 'sticky_image4_logo' );
                        $logo_dimension = $options->get( 'sticky_logo4_dimension' );
                        $logo_text = $options->get( 'sticky_logo4_text' );
                        $logo_typography = $options->get( 'sticky_logo4_typography' ); ?>
                        <?php actavista_template_load( 'templates/header/logo.php', compact( 'logo_type', 'image_logo', 'logo_dimension', 'logo_text', 'logo_typography' ) ); ?>
                    </div>

                </div>

                <div class="col-lg-9">

                    <div class="menus-bar">

                        <nav>

                            <ul>

                             <?php $menu_name = 'main_menu'; actavista_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_name' ) ); ?>    

                         </ul>

                     </nav>
                     <?php if($options->get('header4_cart')): ?>
                        <div class="header-cart-btn">
                            <a href="#" class="shopped-items"></a>
                        </div>
                     <?php endif; ?>
                     <?php  if ( $options->get( 'show_header4_button' )  ) :  ?>
                         <div class="header-btn-new">
                             <?php 
                             $btn_label =  $options->get( 'header4_button_label' );
                             $btn_color =  $options->get( 'header4_btn_text_color' );
                             $btn_bg    =  $options->get( 'header4_btn_bg_color' );
                             $class__   = 'theme_btn_flat';
                             actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
                             ?>
                         </div>
                     <?php endif; ?>
                 </div>

             </div>

         </div>     

     </div>

 </div>

</header>

<?php actavista_template_load( 'templates/header/responsive-header.php', compact( 'options' ) ); ?>

