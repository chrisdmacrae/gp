<?php

	/**

	 * Sidebar Template

	 *

	 * @package WordPress

	 * @subpackage Fixkar

	 * @author Webinane

	 * @version 1.0

	 */



?>

<?php if ( is_active_sidebar( $data->get('sidebar') ) ) : ?>

	<div class="offset-lg-0 col-lg-4 col-md-8  col-sm-8">

		<aside class="sidebar">

			<?php dynamic_sidebar( $data->get('sidebar') ); ?>

		</aside>

	</div>

<?php endif; ?>

