<?php
/**
 * The main template file.
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
        <?php include(TEMPLATEPATH . '/includes/home_book_ad.php'); ?>
        
        <a class="backward">back</a>

        <!-- container for the slides -->
        <div class="images">

        <?php if (have_posts()) : ?>
        <?php query_posts('post_type=slides&orderby=title');?>
        <?php while (have_posts()) : the_post(); ?>
                    <div>
                        <h1><?php the_title();?></h1>
                        <?php the_content();?>
                    </div>
        <?php endwhile;?>
        <?php else : ?>
            
        <?php endif; ?>
        
            <!-- first slide -->


        </div>

        <!-- "next slide" button -->
        <a class="forward">forward</a>

        <!-- the tabs -->
        <div class="slidetabs">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->


<?php get_footer(); ?>