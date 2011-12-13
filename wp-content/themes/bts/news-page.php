
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
   
    <?php if (have_posts()) : ?>
        <?php query_posts('post_type=post&cat=-9');?>
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
    <?php rewind_posts(); ?>
    <div id="social_sidebar" class="sidebar">
        <div class="top-hdr">
            <h2>Subscribe to BTS</h2>
        </div>
        <ul>
            <li><a href="#" title="" id="feed_twitter">Follow Us @BizTravSuccess</a></li>
            <li><a href="#" title="" id="feed_rss">Get Our RSS Feed</a></li>
            <li><a href="#" title="" id="feed_facebook">Like Us on Facebook</a></li>
        </ul>
    </div>
    <div class="sidebar" id="twitter_feed_sidebar">
        <div class="top-hdr">
            <h2>Categories</h2>
        </div>
        <ul>
        <?php 
          $categories=  get_categories(); 
          foreach ($categories as $category) {
                $li = '<li>';
                $li .= '<a href='. get_category_link( $category->term_id ) .'>';
                $li .= $category->cat_name;
                $li .= '</a>';
                $li .= '</li>';
                echo $li;
          }
         ?>
        </ul>
    </div>
    <div id="follow_twitter">
        <a href="#" title="#">followus</a>
    </div>
    <div class="sidebar">
        <div class="top-hdr">
            <h2>Follow Us on Twitter</h2>
        </div>
        <?php rewind_posts();?>
        <?php if (have_posts()) : ?>
        <?php query_posts('post_type=post&cat=9');?>
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content();?>
        <?php endwhile;?>
        <?php else:?>
            <p>no tweets today</p>
        <?php endif;?>
    </div>
    

<?php get_footer(); ?>
