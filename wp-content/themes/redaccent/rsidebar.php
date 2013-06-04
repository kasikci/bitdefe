<!-- BEGIN right sidebar -->
	<div id="rsidebar">
	<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar(2) ) : ?>

		<!-- begin sponsors -->
		<h2>Sponsors</h2>
		<p class="ads">
		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Sponsors" /></a>
		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Sponsors" /></a>
		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Sponsors" /></a>
		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Sponsors" /></a>
		</p>
		<!-- end sponsors -->
		
		<!-- begin popular posts -->
		<h2>Popular Posts</h2>
		<ul><?php dp_popular_posts(5); ?></ul>
		<!-- end popular posts -->
		
		<!-- begin flickr photos -->
		<h2>Flickr Photos</h2>
		<p class="flickr">
		<?php if (function_exists('get_flickrRSS')) get_flickrRSS(); ?>
		</p>
		<!-- end flickr photos -->
		
		<!-- begin featured video -->
		<h2>Featured Video</h2>
		<div class="video">
		<script type="text/javascript">showVideo('<?php echo dp_settings("youtube") ?>');</script>
		</div>
		<!-- end featured video -->
		
		<!-- begin tags -->
		<h2>Tags</h2>
		<div class="tags">
		<?php 
		if (false) : wp_cumulus_insert();
		elseif (function_exists('wp_widget_tag_cloud')) : wp_widget_tag_cloud(array('before_title'=>'<!--','after_title'=>'-->'));
		endif;
		?>
		</div>
		<!-- end tags -->
	
	<?php endif; ?>
	</div>
	<!-- END right sidebar -->
