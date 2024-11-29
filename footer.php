<?php
/**
 * Footer Main File.
 *
 * @package actavista
 * @author  Webinane
 * @version 1.0
 */


$options = actavista_WSH()->option();

actavista_template_load( 'templates/footer/main_footer.php', compact( 'options' ) ); ?>

</div>
<div id="quickview"></div>
<?php wp_footer(); ?>
</body>

</html>