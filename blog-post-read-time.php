<?php
/**
 * Plugin Name: Blog Post Read Time
 * Plugin URI: https://dwanjala.com
 * Description: Blog Post Read Time is a plugin that shows the average reading time needed to read a blog post. Ideally, it is believed that on average an adult can read 265 words in a minute. This plugin uses that information to estimate the amount of time needed to finish reading a blog post. 
 * Version: 1.0.0
 * Author: Esdy Wanjala
 * Author URI: https://www.dwanjala.com
 */
 
add_action( 'the_content', 'blog_post_read_time' );

//calculate the time for the post read
function blog_post_read_time($content)
{
	$post_word_count = str_word_count(strip_tags($content));
	$time_to_read = $post_word_count/265; //265 = wpm read by an adult 
	$reading_time = round($time_to_read);
	if($reading_time < 1){
		$time = "<b>Reading time:</b> few seconds read";
		return $time . $content;
	}
	else{
		$time = "<strong>Reading time:</strong>" . $reading_time . " min read";
		return $time . $content;
	}
}