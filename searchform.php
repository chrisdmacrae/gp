<?php
/**
 * Search Form template
 *
 * @package Fixkar
 * @author Webinane
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>"  method="get" class="searchform custom">

	<input type="text" id="s" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search Here.....', 'actavista' ); ?>" />

	<button type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
	<a href="#" class="search-close-btn"><i class="fa fa-times"></i></a>
</form>
