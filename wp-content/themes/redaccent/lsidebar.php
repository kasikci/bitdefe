<!-- BEGIN left sidebar -->
	<div id="lsidebar">
	<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar(1) ) : ?>
	
		<!-- begin categories -->
		<h2>Categories</h2>
		<ul><?php wp_list_categories('title_li='); ?></ul>
		<!-- end categories -->
		
		<!-- begin archives -->
		<h2>Archives</h2>
		<ul><?php wp_get_archives('type=monthly'); ?></ul>
		<!-- end archives -->

		<!-- begin blogroll -->
		<!--
		<?php wp_list_bookmarks('category_before=&category_after=&title_before=<h2>&title_after=</h2>'); ?>
		-->
		<!-- end blogroll -->

		<!-- begin pages -->
		<h2>Pages</h2>
		<ul><?php dp_list_pages(); ?></ul>
		<!-- end pages -->
		
		<!-- begin meta -->
		<h2>Meta</h2>
		<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		<?php wp_meta(); ?>
		</ul>
		<!-- end meta -->
	
	<?php endif; ?>
	</div>
	<!-- END left sidebar -->