<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?>

	</div><!-- #main -->
</div><!-- #page -->
        <?php if (is_home()):?>
        <div id="bottom_half">
            <div id="bottom_half_wrap">
                
                <div id="news_home_wrap">
                    <div id="news_home">
                        <h2>News &amp; Updates</h2>
                        <?php if (have_posts()) : ?>
                            <?php query_posts('post_type=post&cat=-4&posts_per_page=2');?>
                            <?php while (have_posts()) : the_post(); ?>
                        <div class="post-news">
                            <?php if(has_post_thumbnail()):?>
                            <div class="thumb">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium');?></a>
                            </div>
                            <?php endif;?>
                            <div class="excerpt">

                                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

                                <?php the_excerpt('Read the full post»' );?>
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
                        
                    </div>
                    <div class="post-footer">
                        <a href="<?php the_permalink(); ?>" title="read more" class="read_more_news"></a>

                    </div>
                </div>
                <?php include(TEMPLATEPATH . '/includes/follow_sidebar.php'); ?>
                <?php include(TEMPLATEPATH. '/includes/book.php');?>
                <?php include(TEMPLATEPATH . '/includes/ads_footer.php'); ?>
            </div>
        </div>
        <?php else:?>

        <?php endif;?>
    
	<footer role="contentinfo">
            <div class="container">
                <div class="left">
                    <h3>The Ten-second Business Travel Success Story...</h3>
                    <p>Sed ornare dictum mi, sed rutrum metus condimentum sodales. Fusce quis tellus mollis sapien porta placerat. Pellentesque tincidunt augue vitae diam auctor id fermentum ante elementum. estibulum in luctus urna. Vivamus euismod, ligula eu commodo accumsan. </p>
                    <uL>
                        <li><span>Email:</span> <a href="mailTo:hello@businesstravelsuccess.com">hello@businesstravelsuccess.com</a></li>
                        <li><span>Phone:</span> 1 (800) BIZ-TRAV</li>
                    </ul>
                </div>
                <div class="right">
                    <h3>Subscribe to BTS</h3>
                    <p>Sed ornare dictum mi, sed rutrum metus condimentum sodales.</p>
                    
                  
                    
                    <table border="0" cellspacing="0" id="cc">
                        <tr>
                            <td>
                                <form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post">
                                    <input type="hidden" name="llr" value="jyb75scab">
                                    <input type="hidden" name="m" value="1102295467785">
                                    <input type="hidden" name="p" value="oi">
                                    <input class="input_cc" type="text" name="ea" size="20" value="Your Email Address.." >
                                    <input type="submit" name="go" value="Submit" class="submit" >
                                </form>
                            </td>
                        </tr>
                    </table>
                    

                </div>
            </div>
            <div id="credits">
                <div class="container">
                    <div class="left">
                        <p>Copywrite <?php echo date('Y'); ?> Business Travel Success. All Rights Reserved.</p>  
                    </div>
                    <div class="right">
                        <p>A <a href="http://smlfrtn.com" target="_blank">Small Fortune</a> Project.</p> 
                    </div>
                </div>
            </div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
        <script src="<?php bloginfo('template_url');?>/js/libs/jquery.min.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/libs/jquery-ui.min.js"></script>
        <script src="http://cdn.jquerytools.org/1.2.6/all/jquery.tools.min.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/scripts.js"></script>
</body>
</html>