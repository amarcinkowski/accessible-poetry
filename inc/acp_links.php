<?php

/**
 * Remove Target _blank
 **/
function acp_removetarget() {
	wp_enqueue_script( 'remove-target', plugins_url( 'accessible-poetry/inc/js/remove-target.js' ), array('jquery'), '1.0.0', true );
}
if( get_option( 'acp_removetarget', false ) ) {
	add_action( 'wp_enqueue_scripts', 'acp_removetarget');
}

/**
 * Change all title attributes on <a> tags to aria-label
 **/
function acp_linksaria() {
	wp_enqueue_script( 'links-attr', plugins_url( 'accessible-poetry/inc/js/links-attr.js' ), array('jquery'), '1.0.0', true );
}
if( get_option( 'acp_linksaria', false ) ) {
	add_action( 'wp_enqueue_scripts', 'acp_linksaria');
}