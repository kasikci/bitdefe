<?php

/*

	Plugin Name: Twitter Tweet Feed
	Plugin URI: http://bennjomy.com/archives/twitter-feed/
	Description: This plugin displays tweets from your Twitter or your friends, from the Twitter Search, from a list or from your favorite users. 
	Author: Benn Jomy
	Version: 1.2
	Author URI: http://www.bennjomy.com
	
	
    Copyright (c) 2013  BENN JOMY (email : support@bennjomy.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    
*/

function tf_create_shortcode( $atts, $content=null ) {
	shortcode_atts(array('id'=>null,'username'=>null, 'list'=>null, 'query' => null, 'limit' => null), $atts);
	$options = (($atts['username'])?'username:"'.$atts['username'].'",':'username:"bennjomy",');
	$options .= (($atts['limit'])?'limit:'.$atts['limit'].',':'');
	$options .= (($atts['query'])?'query:"'.$atts['query'].'",':'');
	$options .= (($atts['list'])?'list:"'.$atts['list'].'",':'');
	$optionfontcolor .= (($atts['fontcolor'])?$atts['fontcolor']:'');
	$optionlinkcolor .= (($atts['alinkcolor'])?$atts['alinkcolor']:'');
	$optionbgcolor .= (($atts['bgcolor'])?$atts['bgcolor']:'');
	$optiontitle .= (($atts['title'])?$atts['title']:'');
	$optionborderrad .= (($atts['borderrad'])?$atts['borderrad']:'');
	$optionheadercolor .= (($atts['headercolor'])?$atts['headercolor']:'');
	
	return '<div class="tweets"> 
				<div class="tweets_header">&nbsp;</div> 
				<div class="content_tweets'.$atts['id'].'"> </div> 
				<div class="tweets_footer">
					<span id="bird"></span>
				</div> 
			</div>
			<script type="text/javascript">
				jQuery(".content_tweets'.$atts['id'].'").twitterfeed({
					'.$options.'
					retweet:true
				});
			</script>';
}

function tf_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( "tf_twitterfeed", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/jquery.twitterfeed.js"), array( 'jquery' ) );
	wp_enqueue_style( "tf_css", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/jquery.twitterfeed.css"));
}    
 
add_action('wp_enqueue_scripts', 'tf_scripts');
add_shortcode('twittertweetfeed', tf_create_shortcode);

// widget

class TwitterFeedWidget extends WP_Widget {
	
	function TwitterFeedWidget() {
		$widget_options = array(
		'classname'		=>		'twitter-tweet-feed',
		'description' 	=>		'This widget will collect twitter feeds and display it on your website instantly.'
		);
		
		parent::WP_Widget('twitter-tweet-feed', 'Twitter Tweet Feed', $widget_options);
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$options = (($instance['username'])?'username:"'.$instance['username'].'",':'username:"bennjomy",');
		$options .= (($instance['limit'])?'limit:'.$instance['limit'].',':'');
		$options .= (($instance['query'])?'query:"'.$instance['query'].'",':'');
		$options .= (($instance['list'])?'list:"'.$instance['list'].'",':'');
		$optionfontcolor .= (($instance['fontcolor'])?$instance['fontcolor']:'');
		$optionlinkcolor .= (($instance['linkcolor'])?$instance['linkcolor']:'');
		$optionbgcolor .= (($instance['bgcolor'])?$instance['bgcolor']:'');
		$optiontitle .= (($instance['title'])?$instance['title']:'');
		$optionborderrad .= (($instance['borderrad'])?$instance['borderrad']:'');
		$optionheadercolor .= (($instance['headercolor'])?$instance['headercolor']:'');
		?>
		<?php echo $before_widget; ?>
		<?php echo '<h3 class="widget-title">'.$optiontitle.'</h3><style>.tweets a,.tweet a:visited{ color:'.$optionlinkcolor.' !important;}.tweets .jomy_header a, .tweets .jomy_header a:visited, .tweets .jomy_header a:hover {color:'.$optionheadercolor.' !important;}</style><div class="tweets" style="background:'.$optionbgcolor.' !important; border-radius:'.$optionborderrad.'px !important;"> 
				<div class="tweets_header">&nbsp;</div> 
				<div class="content_tweets_'.$this->get_field_id('id').'" style="color:'. $optionfontcolor .' !important; "> </div> 
				<div class="tweets_footer">
					<span id="bird"></span>
				</div> 
			</div>
			<script type="text/javascript">
				jQuery(".content_tweets_'.$this->get_field_id('id').'").twitterfeed({
					'.$options.'
					retweet:true
				});
			</script>';?>
		<?php echo $after_widget; ?>
		<?php 
	}

	function update($new, $old) {
		return $new;
	}
	
	function form($instance) {
		?>
		<p><label for="<?php echo $this->get_field_id('title')?>">
		Title:<br />
		<input id="<?php echo $this->get_field_id('title')?>" 
		name="<?php echo $this->get_field_name('title')?>"
		value="<?php echo $instance['title'];?>" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('username')?>">
		Username:<br />
		<input id="<?php echo $this->get_field_id('username')?>" 
		name="<?php echo $this->get_field_name('username')?>"
		value="<?php echo $instance['username'];?>" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('limit')?>">
		Limit:<br />
		<input id="<?php echo $this->get_field_id('limit')?>" 
		name="<?php echo $this->get_field_name('limit')?>"
		value="<?php echo $instance['limit'];?>" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('list')?>">
		List:<br />
		<input id="<?php echo $this->get_field_id('list')?>" 
		name="<?php echo $this->get_field_name('list')?>"
		value="<?php echo $instance['list'];?>" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('query')?>">
		Query:<br />
		<input id="<?php echo $this->get_field_id('query')?>" 
		name="<?php echo $this->get_field_name('query')?>"
		value="<?php echo $instance['query'];?>" size=30 />
		</label></p>
		<p><a href="http://www.w3schools.com/html/html_colorvalues.asp" target="_blank">To know color codes, Click here</a></p>
		<p><label for="<?php echo $this->get_field_id('fontcolor')?>">
		Font Color:<br />
		<input id="<?php echo $this->get_field_id('fontcolor')?>" 
		name="<?php echo $this->get_field_name('fontcolor')?>"
		value="<?php echo $instance['fontcolor'];?>"
		placeholder="#333" size=30 />
		</label></p>
		<p>The Header color is the color, your twitter name is displayed.</p>
		<p><label for="<?php echo $this->get_field_id('headercolor')?>">
		Header Color:<br />
		<input id="<?php echo $this->get_field_id('headercolor')?>" 
		name="<?php echo $this->get_field_name('headercolor')?>"
		value="<?php echo $instance['headercolor'];?>"
		placeholder="#000" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('linkcolor')?>">
		Link Color:<br />
		<input id="<?php echo $this->get_field_id('linkcolor')?>" 
		name="<?php echo $this->get_field_name('linkcolor')?>"
		value="<?php echo $instance['linkcolor'];?>"
		placeholder="#2d5c88" size=30 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('bgcolor')?>">
		BackGround Color:<br />
		<input id="<?php echo $this->get_field_id('bgcolor')?>" 
		name="<?php echo $this->get_field_name('bgcolor')?>"
		value="<?php echo $instance['bgcolor'];?>"
		placeholder="none" size=30 />
		</label></p>
		<p>The border radius are valued in pixel, just provide the number. Provide 0 if you don't wish to have any border radius.</p>
		<p><label for="<?php echo $this->get_field_id('borderrad')?>">
		Border Radius:<br />
		<input id="<?php echo $this->get_field_id('borderrad')?>" 
		name="<?php echo $this->get_field_name('borderrad')?>"
		value="<?php echo $instance['borderrad'];?>"
		placeholder="5" size=30 />
		</label></p>
		<?php 
	}
}

function TwitterFeed_widget_init() {
	register_widget('TwitterFeedWidget');
}
add_action('widgets_init', 'TwitterFeed_widget_init');

