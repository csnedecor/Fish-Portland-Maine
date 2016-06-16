<?php get_header(); ?>
<div id="content-wrapper">
    <div id="content">
    
   	 	<?php while( have_posts() ): the_post(); ?>
			<h1><?php the_title(); ?></h1>
			
			<?php $sidebar = get_post_meta( $post->ID, 'fish_sidebar_content', true); ?>
			
			<?php if( empty( $sidebar) ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<div class="mainpanel right">
					<?php the_content(); ?>
				</div>
				<div class="sidepanel left"
					<?php echo apply_filters('the_content', $sidebar); ?>
				</div>
			<?php endif; ?>
				
		<?php endwhile; ?>
        
        <div class="clear">&nbsp;</div>
	</div>
</div>
<?php get_footer(); ?>