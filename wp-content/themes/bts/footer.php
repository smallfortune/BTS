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
                            <?php query_posts('post_type=post&cat=-4');?>
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
                    
                    <!-- BEGIN: Constant Contact Basic Opt-in Email List Form -->
                    <div align="center">
                        <table border="0" cellspacing="0" cellpadding="3" bgcolor="#ffffcc" style="border:2px solid #000000;">
                            <tr>
                                <td align="center" style="font-weight: bold; font-family:Arial; font-size:12px; color:#000000;">Join Our Mailing List</td>
                            </tr>
                            <tr>
                                <td align="center" style="border-top:2px solid #000000">
                                    <form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:2;">
                                        <input type="hidden" name="llr" value="jyb75scab">
                                        <input type="hidden" name="m" value="1102295467785">
                                        <input type="hidden" name="p" value="oi">
                                        <font style="font-weight: normal; font-family:Arial; font-size:12px; color:#000000;">Email:</font> <input type="text" name="ea" size="20" value="" style="font-size:10pt; border:1px solid #999999;">
                                        <input type="submit" name="go" value="Go" class="submit" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10pt;">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
<!-- END: Constant Contact Basic Opt-in Email List Form -->
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