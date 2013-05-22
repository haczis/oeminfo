<?php get_header(); ?>
	
	<div id="content-top"<?php if (get_option('professional_blog_style') == 'on') echo(' class="top-alt"'); ?>></div>
	<div id="content" class="clearfix<?php if (get_option('professional_blog_style') == 'on') echo(' content-alt'); ?>">
		<?php if (get_option('professional_blog_style') == 'false') { ?>

			<?php for ($i = 1; $i <= 3; $i++) { ?>
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('professional_service_'.$i)))); while (have_posts()) : the_post(); ?>
					<div class="service">
						<?php $icon = '';
						$icon = get_post_meta($post->ID, 'Icon', true);
						$tagline = '';
						$tagline = get_post_meta($post->ID, 'Tagline', true); ?>
						
						<?php if ($icon <> '') { ?>
							<img class="service-icon" alt="" src="<?php echo $icon; ?>"/>
						<?php }; ?>
						
						<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
						<?php if ($tagline <> '') { ?>
							<span class="tagline"><?php echo($tagline); ?></span>
						<?php }; ?>
						
						<div class="hr"></div>
						<?php global $more;   
						$more = 0;
						the_content(""); ?>
						<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('read more','Professional'); ?></span></a>
					</div> <!-- end .service -->
				<?php endwhile; wp_reset_query(); ?>
			<?php }; ?>
			
		<?php } else { ?>
			<div id="content-area">
				<?php if (get_option('professional_duplicate') == 'false') {
					$args=array(
						   'showposts'=>get_option('professional_homepage_posts'),
						   'post__not_in' => $ids,
						   'paged'=>$paged,
						   'category__not_in' => get_option('professional_exlcats_recent'),
					);
				} else {
					$args=array(
					   'showposts'=>get_option('professional_homepage_posts'),
					   'paged'=>$paged,
					   'category__not_in' => get_option('professional_exlcats_recent'),
					);
				};
				query_posts($args); ?>
				
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
			
		<?php }; ?>
		
	</div> <!-- end #content-->
	<div id="content-bottom"<?php if (get_option('professional_blog_style') == 'on') echo(' class="bottom-alt"'); ?>></div>
				
<?php get_footer(); ?>			