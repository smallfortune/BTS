<?php
/**
 * The Search Form Template.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

?>
<form action="/" method="get" id="search_form">
    <fieldset>
        <ul>
            <li class="left"><input type="text" name="s" id="search" value="Search The Site..." /></li>
            <li class="right"><input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/img-search_glass.png" /></li>
        </ul>
    </fieldset>
</form>