<?php if (is_archive()) $post_number = get_option('professional_archivenum_posts');
if (is_search()) $post_number = get_option('professional_searchnum_posts');
if (is_tag()) $post_number = get_option('professional_tagnum_posts');
if (is_category()) $post_number = get_option('professional_catnum_posts'); ?>
<?php get_header(); ?>
	
	<div id="content-top" class="top-alt"></div>
	<div id="content" class="clearfix content-alt">
		<div id="content-area">
			<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
			
			<?php global $query_string; 
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
				
			<?php endwhile; ?>
				<div class="hr-separator"></div>
				<div class="entry page-nav clearfix">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
					else { ?>
						 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
					<?php } ?>
				</div> <!-- end .entry -->
				
			<?php else : ?>
				<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
			<?php endif; wp_reset_query(); ?>
		</div> <!-- end #content-area -->
		
		<?php get_sidebar(); ?>
		
	</div> <!-- end #content -->
	<div id="content-bottom" class="bottom-alt"></div>
				
<?php get_footer(); ?>