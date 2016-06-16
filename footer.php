<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fishme
 */
?>

<div id="bottom">
	<div class="wrapper">
    	<div id="affiliated">
        </div>
        <div id="text-links">
        	<p><a href="http://www.facebook.com/FishPortlandMaine" target="_blank"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/facebook-icon.gif" alt="find fish portland maine on facebook" /></a></p>
            <p><a href="<?php echo home_url(); ?>">Home</a> | <a href="<?php echo home_url(); ?>/about/">About Fish Portland Maine</a> | <a href="<?php echo home_url(); ?>/guide-service-pricing/">Guide Service Pricing</a> | <a href="<?php echo home_url(); ?>/types-of-fish/">Gulf of Maine Fish</a> | <a href="<?php echo home_url(); ?>/fishing-photos/">Photos</a> | <a href="<?php echo home_url(); ?>/links/">Links</a> | <a href="<?php echo home_url(); ?>/contact/">Contact</a></p>
            <p><a href="http://roccotripaldi.com" target="_blank">Website Design By Rocco Tripaldi</a><br />
&copy; <?php echo date('Y'); ?> Fish Portland Maine. All rights reserved.</p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
