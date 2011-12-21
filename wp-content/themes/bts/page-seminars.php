
<?php
/*
Template Name: Seminars
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
        <?php gravity_form(1, false, false, false, '', false); ?>
        
        </div><!-- #content -->
    </div><!-- #primary -->
    <div id="two_col">
        <div class="col first">
            <?php rewind_posts();?>
            <?php if (have_posts()) : ?>
            <?php query_posts('post_type=post&p=87');?>
            <?php while (have_posts()) : the_post(); ?>
                
                <div class="post-news">
                <div class="top-hdr">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="excerpt">
                    <?php get_template_part( 'content', 'page' ); ?>
                </div>
            </div>
            <?php endwhile;?>
            <?php else : ?>
            <?php endif; ?>
        </div>
        <div class="col">
            <?php rewind_posts();?>
            <?php if (have_posts()) : ?>
            <?php query_posts('post_type=post&p=93');?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="post-news">
                <div class="top-hdr">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="excerpt">
                    <?php get_template_part( 'content', 'page' ); ?>
                </div>
            </div>
            <?php endwhile;?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
    
    <div id="ad_footer">
        <?php dynamic_sidebar('Footer Ad Space'); ?>
    </div>
    
   
<?php get_footer(); ?>
