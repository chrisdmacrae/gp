<?php $options = actavista_WSH()->option(); ?>
<?php $footer_sidebar = apply_filters( 'actavistafooter_sidebar', $options->get( 'sidebar_footer' ) ); ?>
<?php if ( is_active_sidebar( $footer_sidebar ) ) : ?>
 <footer style="<?php echo esc_attr( $options->get( 'footer_color_bg' ) ) ? 'background: '.esc_attr( $options->get( 'footer_color_bg' ) ).'' : ''; ?>">
    <div class="gap">
        <div class="container">
            <div class="row">

                <?php
                if ( is_active_sidebar( $footer_sidebar ) ) {

                    dynamic_sidebar( $footer_sidebar );

                } ?>
            </div>
                
        </div>
    </div>
</footer>

<?php endif; ?>

<?php actavista_template_load( 'templates/footer/bottombar.php', compact( 'options' ) ); ?>
