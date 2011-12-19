
<?php
/*
Template Name: Publications
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

get_header(); ?>

<div id="primary">
    <div id="content" role="main">
   

       
       <?php while ( have_posts() ) : the_post(); ?>
            <div class="post-news">
                
                <div class="excerpt">
                    <?php get_template_part( 'content', 'page' ); ?>
                </div>
            </div>
           
        <?php endwhile;?>
        
        
        </div><!-- #content -->
    </div><!-- #primary -->
    <?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
    <?php include(TEMPLATEPATH . '/includes/social_sidebar.php'); ?>
    
    
    <?php include(TEMPLATEPATH . '/includes/follow_sidebar.php'); ?>
   
<?php get_footer(); ?>
