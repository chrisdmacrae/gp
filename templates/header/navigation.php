<?php
wp_nav_menu( array(
	'theme_location' => $menu_name,
	'container_id' => 'navbar-collapse-1',
	'container_class' => 'navbar-collapse collapse navbar-right',
	'menu_class' => 'nav navbar-nav',
	'fallback_cb' => false,
	'items_wrap' => '%3$s',
	'container' => false,
	'walker' => new \Actavista\Includes\Classes\Bootstrap_Walker(),
	) );   ?>