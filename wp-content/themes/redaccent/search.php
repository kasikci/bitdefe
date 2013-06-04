<?php get_header(); include('lsidebar.php'); ?>

<!-- BEGIN content -->
<div id="content">

	<h2 class="title">Search Results for <strong><?php the_search_query(); ?></strong></h2>

	<?php
	if (have_posts()) :
	while (have_posts()) : the_post(); 
	$arc_year = get_the_time('Y');
	$arc_month = get_the_time('m');
	$arc_day = get_the_time('d');
	?>

	<!-- begin post -->
	<div class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p class="details1">Posted by <?php the_author_posts_link(); ?> on <a href="<?php echo get_day_link("$arc_year", "$arc_month", "$arc_day"); ?>"><?php the_time('F j, Y') ?></a> at <?php the_time('H:i a') ?></p>
	<?php the_content('Read More'); ?> 
	<div class="details2">
	<?php the_tags('<p class="l">Tags:', ', ', '</p>'); ?>
	<p class="r">Filed Under: <?php the_category(', '); ?></p>
	</div>
	</div>
	<!-- end post -->
	
	<?php endwhile; ?>
	<p class="postnav">
	<span class="l"><?php next_posts_link('&laquo; Older Entries'); ?></span> 
	<span class="r"><?php previous_posts_link('Newer Entries &raquo;'); ?></span>
	</p>
	<?php else : ?>
	<div class="notfound">
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that is not here.</p>
	</div>
	<?php endif; ?>
	
</div>
<!-- END content -->

<?php include('rsidebar.php'); get_footer(); ?>
