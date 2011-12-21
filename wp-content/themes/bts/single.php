<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            
            <div class="the_content">
                <div class="top-hdr">
                    <h2><?php the_title(); ?></h2>
                </div>
                <?php get_template_part('content', 'single'); ?>
            </div>
            <?php toolbox_content_nav('nav-below'); ?>

            <?php comments_template('', true); ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php include(TEMPLATEPATH . '/includes/social_sidebar.php'); ?>

<?php include(TEMPLATEPATH . '/includes/cats_sidebar.php'); ?>
<?php include(TEMPLATEPATH . '/includes/follow_sidebar.php'); ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php get_footer(); ?>