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
        <script src="<?php bloginfo('template_url');?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/scripts.js"></script>
</body>
</html>