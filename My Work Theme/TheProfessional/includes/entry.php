<?php $thumb = '';
$width = 184;
$height = 184;
$classtext = '';
$titletext = get_the_title();

$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
$thumb = $thumbnail["thumb"]; ?>

<div class="entry clearfix">
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
	
	<?php if ($thumb <> '' && get_option('professional_thumbnails_index') == 'on') { ?>
		<div class="thumb alignleft">
			<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
			<a href="<?php the_permalink(); ?>"><span class="overlay"></span></a>
		</div> <!-- end .thumb -->
	<?php }; ?>
	<?php if (get_option('professional_blog_style') == 'false') { ?>
		<p><?php truncate_post(550);?></p>
	<?php } else { ?>
		<?php the_content(''); ?>
	<?php }; ?>
	<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('read more','Professional'); ?></span></a>
</div> <!-- end .entry -->