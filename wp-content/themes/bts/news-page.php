
<?php
/*
Template Name: News
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
<?php query_posts('post_type=post');?>
<?php if (have_posts()) : ?>

    

    
    <?php while (have_posts()) : the_post(); ?>
        <div class="post-news">
            <h1><?php the_title(); ?></h2>
            <?php //the_content( 'Read the full post»' ); ?>
            <div class="thumb">
                <?php the_post_thumbnail('medium');?>
            </div>
            <div class="excerpt">
                <?php the_excerpt('Read the full post»' );?>
            </div>
            
        </div>
        <div class="post-footer">
                <a href="#" title="read more"></a>
                <div class="social">
                    <p class="date"><?php the_time('F jS, Y') ?></p>
                </div>
            </div>
    <?php endwhile;?>

    

<?php else : ?>

    <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
            <h1 class="entry-title">Nothing Found</h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->	                                
    </article><!-- #post-0 -->

<?php endif; ?>
</div><!-- #content -->
</div><!-- #primary -->


<?php get_footer(); ?>
