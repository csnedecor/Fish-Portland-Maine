<?php get_header(); ?>
<div id="content-wrapper">
    <div id="content">
    
   	 	<?php while( have_posts() ): the_post(); ?>
        <?php the_content(); ?>
		<?php endwhile; ?>
        
        <div class="clear">&nbsp;</div>
	</div>
</div>
<?php get_footer(); ?>