<div class="sidebar" id="twitter_feed_wrap">
    <div class="container">
    <div class="top-hdr">
        <h2>Follow Us on Twitter</h2>
    </div>
    <?php rewind_posts();?>
    <?php if (have_posts()) : ?>
    <?php query_posts('post_type=post&cat=4');?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content();?>
    <?php endwhile;?>
    <?php else:?>
        <p>no tweets today</p>
    <?php endif;?>

    </div>
    <div id="follow_twitter">
        <a href="#" title="#">followus</a>
    </div>
</div>