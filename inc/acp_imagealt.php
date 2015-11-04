<?php
/**
 * Use attachment title as the ALT value on images	
 **/
function acp_images_alt_with_title($content) {
    global $post;
    preg_match_all('/<img (.*?)\/>/', $content, $images);
    if(!is_null($images)) {
	    foreach($images[1] as $index => $value) {
		    if(!preg_match('/alt=/', $value)) {
			    $new_img = str_replace('<img', '<img alt="'.$post->post_title.'"', $images[0][$index]);
			    $content = str_replace($images[0][$index], $new_img, $content);
			}
		}
    }
    return $content;
}
function acp_images_alt_with_desc($content) {
    global $post;
    preg_match_all('/<img (.*?)\/>/', $content, $images);
    if(!is_null($images)) {
	    foreach($images[1] as $index => $value) {
		    if(!preg_match('/alt=/', $value)) {
			    $new_img = str_replace('<img', '<img alt="'.$post->post_content.'"', $images[0][$index]);
			    $content = str_replace($images[0][$index], $new_img, $content);
			}
		}
    }
    return $content;
}
if( get_option( 'acp_imagealt', false ) == 'title' ) {
	add_filter('the_content', 'acp_images_alt_with_title', 99999);
}
elseif( get_option( 'acp_imagealt', false ) == 'desc' ) {
	add_filter('the_content', 'acp_images_alt_with_desc', 99999);
}

/**
 * Load script to force ALT on all images	
 **/
function acp_force_images_alt() {
	wp_enqueue_script( 'acp-forcealt', plugins_url( '/js/forcealt.js' , __FILE__ ), array('jquery'), false, true );
}
if( get_option( 'acp_imageforcealt', false) ) {
	add_action( 'wp_enqueue_scripts', 'acp_force_images_alt' );
}