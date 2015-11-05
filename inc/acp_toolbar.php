<?php
// Toolbar output
function acp_toolbar_ajax() {
	check_ajax_referer( 'acp-sec-toolbar', 'security' );
	
	$toolbar_side = (get_option( 'acp_toolbar_side', false )) ? get_option( 'acp_toolbar_side', false ) : 'left';
	$icon_position = (get_option( 'acp_toolbar_icon_pos', false )) ? get_option( 'acp_toolbar_icon_pos', false ) : 'top';
	$icon_size = (get_option('acp_toolbar_icon_size', false)) ? get_option('acp_toolbar_icon_size', true) : 'small';

	$customtags = (get_option('acp_fontsizer_tags')) ? 'p,h1,h2,h3,' . get_option('acp_fontsizer_tags') : 'p,h1,h2,h3';
	$sizerjump = (get_option( 'acp_fontsizer_size' )) ? '2' : get_option( 'acp_fontsizer_size' );
	
	$underlines = (get_option('acp_underlines', false)) ? get_option('acp_underlines', false) : '0';
?>
<nav id="acp_toolbarWrap" role="navigation"  class="close-toolbar acp-hide <?php echo $toolbar_side; ?>">
	<button class="acp_hide_toolbar <?php echo $icon_position; ?> acp-icon-<?php echo $icon_size; ?>">
		<span><?php _e('Accessibility', 'acp'); ?></span>
	</button>
	
	<ul id="acp_toolbar" data-underlines="<?php echo $underlines; ?>">
		<h3 tabindex="-1"><?php _e('Accessibility Toolbar', 'acp'); ?></h3>
		<li id="acp-fontsizer" data-size-tags="<?php echo $customtags; ?>" data-size-jump="<?php echo $sizerjump; ?>">
			<button class="small-letter" tabindex="-1"><?php _e('Decrease font size', 'acp');?></button>
			<button class="big-letter" tabindex="-1"><?php _e('Increase font size', 'acp'); ?></button>
			<button class="acp-font-reset acp-hide" tabindex="-1"><?php _e('Default font sizes', 'acp'); ?></button>
		</li>
		<li id="acp-contrast">
			<button class="acp-bright-btn" tabindex="-1"><?php _e('Bright contrast', 'acp'); ?></button>
			<button class="acp-dark-btn" tabindex="-1"><?php _e('Dark contrast', 'acp'); ?></button>
			<button class="acp-grayscale" tabindex="-1"><?php _e('Grayscale', 'acp'); ?></button>
			<button class="acp-contrast-reset acp-normal acp-hide" tabindex="-1"><?php _e('Reset contrast', 'acp'); ?></button>
		</li>
		<li id="acp-keyboard-navigation">
			<button id="acp-keyboard" tabindex="-1"><?php _e('Keyboard Navigation', 'acp'); ?></button>
		</li>
		<li id="acp-links">
			<button class="acp-toggle-underline" tabindex="-1"><?php _e('Toggle underline', 'acp'); ?></button>
		</li>
	</ul>
	<div class="acp-author"><a href="https://wordpress.org/plugins/accessible-poetry/" title="Link to the plugin page" target="_blank" tabindex="-1">Accessible Poetry</a></div>
</nav>
<?php 
	die();
}
add_action( 'wp_ajax_acp_toolbar_ajax', 'acp_toolbar_ajax' );
add_action( 'wp_ajax_nopriv_acp_toolbar_ajax', 'acp_toolbar_ajax' );

// toolbar essets
function acp_toolbar_style() {
	wp_register_style( 'acp_toolbar', plugins_url( 'accessible-poetry/css/toolbar.css' ) );
	wp_enqueue_style( 'acp_toolbar' );
	
	wp_enqueue_script( 'toolbar', plugins_url( 'accessible-poetry/inc/js/toolbar.js' ), array('jquery'), false, true );
	wp_localize_script( 'toolbar', 'acptAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'security' => wp_create_nonce( 'acp-sec-toolbar' )
	));
  
	wp_enqueue_script( 'grayscale', plugins_url( 'accessible-poetry/inc/js/grayscale.js' ), array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'acp_toolbar_style' );