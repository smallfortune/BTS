<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

             <div class="post-news">
                <div class="top-hdr">
                    <h2><?php the_title(); ?></h2>
                </div>
                <?php //the_content( 'Read the full post»' ); ?>
                <?php if(has_post_thumbnail()):?>
                <div class="thumb">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium');?></a>
                </div>
                <?php endif;?>
                <div class="excerpt">
                    <?php the_excerpt('Read the full post»' );?>
                </div>
            </div>
            <div class="post-footer">
                <a href="<?php the_permalink(); ?>" title="read more" class="read_more_news"></a>
                <div class="social">
                    <p class="date"><?php the_time('F jS, Y') ?></p>
                    <script charset="utf-8" type="text/javascript">var switchTo5x=true;</script><script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'wp.e5e164fb-0493-4667-b8f5-468dd1e6d80f'});var st_type='wordpress3.2.1';</script>
                </div>
            </div>
            <?php endwhile; ?>

            <?php toolbox_content_nav('nav-below'); ?>

        <?php else : ?>

            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e('Nothing Found', 'toolbox'); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'toolbox'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->

        <?php endif; ?>

    </div><!-- #content -->
</div><!-- #primary -->
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php include(TEMPLATEPATH . '/includes/social_sidebar.php'); ?>

<?php include(TEMPLATEPATH . '/includes/cats_sidebar.php'); ?>
<?php include(TEMPLATEPATH . '/includes/follow_sidebar.php'); ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>

<?php get_footer(); ?>