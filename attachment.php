<?php 

$img_id = $_GET['attachment_id'];
$img = wp_get_attachment_image_src( $img_id, $size='large' );
$img_src = $img[0];

get_header(); ?>
<div id="content-wrapper">
    <div id="content">
    
   	 	<?php while( have_posts() ): the_post(); ?>
			<div class="mainpanel left" style="text-align: center; background-color: black; padding-top: 15px; padding-bottom: 15px;">
            
	            <img src="<?php echo $img_src; ?>" alt="" style="border: 1px solid white; width: 520px;" /><br /><br />
	            <!-- AddThis Button BEGIN -->
	            <div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="text-align: center;">
	            <a class="addthis_button_preferred_1"></a>
	            <a class="addthis_button_preferred_2"></a>
	            <a class="addthis_button_preferred_3"></a>
	            <a class="addthis_button_preferred_4"></a>
	            <a class="addthis_button_compact"></a>
	            <a class="addthis_counter addthis_bubble_style"></a>
	            </div>
	            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fb3bd184702c961"></script>
	            <!-- AddThis Button END -->
	         </div>
         
	         <div class="sidepanel right">
	         	<p style="font-size: 12px; margin-left: 0px;"><a href="/fishing-photos/">&uarr; All Fishing Photos</a></p>
            	<?php fpm_gallery_nav($img_id); ?>
	            <?php the_content(); ?>
	         </div>
		<?php endwhile; ?>
        
        <div class="clear">&nbsp;</div>
	</div>
</div>
<?php get_footer(); ?>