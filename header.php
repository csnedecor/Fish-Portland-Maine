<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fishme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34311945-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="top">
		<div class="wrapper">
	    	<a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/fish-portland-maine.gif" alt="Fish Portland Maine Saltwater Charter Fishing" /></a>
	    	<span id="email">mike@fishportlandmaine.com</span>
	        <span id="phone">(207) 619-1584</span>
<!-- 	        <div id="nav">
	        	<a href="<?php echo home_url(); ?>">Home</a>
	            <a href="<?php echo home_url(); ?>/about/">About</a>
	            <a href="<?php echo home_url(); ?>/guide-service-pricing/">Pricing</a>
	            <a href="<?php echo home_url(); ?>/types-of-fish/">The Fish</a>
	            <a href="<?php echo home_url(); ?>/fishing-photos/">Gallery</a>
	            <a href="<?php echo home_url(); ?>/links/">Links</a>
	            <a href="<?php echo home_url(); ?>/contact/" class="last">Contact</a>
	        </div> -->
          <div id="nav">
            <?php wp_nav_menu( array(
              'theme_location' => 'primary'
              )
              );  ?>
          </div><!-- /#nav -->
	    </div>
	<!-- END PAGE TOP --></div>
