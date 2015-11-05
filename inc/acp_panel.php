<?php

function acp_panel_init() {
	
	// general
	register_setting( 'accessible-poetry', 'acp_htmllang' );
	
	// Skiplinks Settings
	register_setting( 'accessible-poetry', 'acp_skiplinks' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_side' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_home' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_style' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_bg' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_textColor' );
	register_setting( 'accessible-poetry', 'acp_skiplinks_linkUnderline' );
	
	// Toolbar Settings
	register_setting( 'accessible-poetry', 'acp_toolbar' );
	register_setting( 'accessible-poetry', 'acp_toolbar_fixed' );
	register_setting( 'accessible-poetry', 'acp_toolbar_side' );
	register_setting( 'accessible-poetry', 'acp_toolbar_icon_pos' );
	register_setting( 'accessible-poetry', 'acp_toolbar_icon_size' );
	
	// Contrast Settings
	register_setting( 'accessible-poetry', 'acp_contrast' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright_all' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright_bg' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright_text' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright_link' );
	register_setting( 'accessible-poetry', 'acp_contrast_bright_linkHover' );
	register_setting( 'accessible-poetry', 'acp_contrast_disable_bright' );
	
	register_setting( 'accessible-poetry', 'acp_contrast_dark' );
	register_setting( 'accessible-poetry', 'acp_contrast_dark_bg' );
	register_setting( 'accessible-poetry', 'acp_contrast_dark_all' );
	register_setting( 'accessible-poetry', 'acp_contrast_dark_text' );
	register_setting( 'accessible-poetry', 'acp_contrast_dark_link' );
	register_setting( 'accessible-poetry', 'acp_contrast_dark_linkHover' );
	register_setting( 'accessible-poetry', 'acp_contrast_disable_dark' );
	
	register_setting( 'accessible-poetry', 'acp_contrast_add' );
	
	
	
	// Font Sizer Settings
	register_setting( 'accessible-poetry', 'acp_fontsizer' );
	register_setting( 'accessible-poetry', 'acp_fontsizer_size' );
	register_setting( 'accessible-poetry', 'acp_fontsizer_tags' );
	register_setting( 'accessible-poetry', 'acp_fontsizer_customtags' );

	// links
	register_setting( 'accessible-poetry', 'acp_rolelink' );
	register_setting( 'accessible-poetry', 'acp_removetarget' );
	register_setting( 'accessible-poetry', 'acp_linksaria' );
	register_setting( 'accessible-poetry', 'acp_focuslinks' );
	register_setting( 'accessible-poetry', 'acp_underlines' );
	
	// Use image title as ALT
	register_setting( 'accessible-poetry', 'acp_imageforcealt' );
	register_setting( 'accessible-poetry', 'acp_imagealt' );
	
}
add_action( 'admin_init', 'acp_panel_init' );

// Add the setting Sub Page
function acp_setting_page() {
	add_submenu_page(
		'tools.php',
		__('Accessible Poetry', 'acp'),
		__('Accessible Poetry', 'acp'),
		'manage_options',
		'accessible-poetry',
		'acp_page_callback' );
}

// Disply the options to admin only
if ( is_admin() ){
	add_action('admin_menu', 'acp_setting_page');
	add_action( 'admin_init', 'acp_panel_init' );
}

function acp_page_callback() {
	wp_enqueue_style( 'accessible-poetry' );
?>
<div id="accessible-poetry" class="wrap">
	<div class="acp-field">
		<h1><?php _e('Welcome to Accessible Poetry!', 'acp');?></h1>
		<div class="plugin-version"><span><?php _e('Version', 'acp');?>: 1.2.3</span></div>
		<p><?php _e('Here you will find options to perform a better accessibility WordPress website.', 'acp');?></p>
		<p><?php _e('This plugin is provided by', 'acp');?> <a href="http://www.Amitmoreno.com/"><?php _e('Amit Moreno', 'acp');?></a>. <?php _e('Please visit our', 'acp');?> <a href="https://wordpress.org/plugins/accessible-poetry/" role="link" aria-label="<?php _e('Go to our Plugin Page', 'acp');?>"><?php _e('Plugin Page', 'acp');?></a> <?php _e('and ', 'acp');?><a href="https://wordpress.org/support/view/plugin-reviews/accessible-poetry" role="link" aria-label="<?php _e('Rate Us on our Plugin Page', 'acp');?>"><?php _e('Rate Us', 'acp');?></a>.</p>
	</div>
	<div class="metabox-holder">
		<div id="normal-sortables" class="meta-box-sortables ui-sortable ui-sortable-disabled">
			<form method="post" action="options.php">
				<?php settings_fields( 'accessible-poetry' ); ?>
				<?php do_settings_sections( 'accessible-poetry' ); ?>
				<!-- General -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('General', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<input name="acp_htmllang" id="acp_htmllang" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_htmllang' ) ); ?> />
							<label for="acp_htmllang"><?php _e('Add language attribute to the html tag.', 'acp');?></label>
						</div>
					</div>
				</section>
						
				<!-- Toolbar -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Toolbar', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<label for="acp_toolbar_side"><?php _e('Toolbar Side', 'acp');?></label><br />
							<select id="acp_toolbar_side" name="acp_toolbar_side">
								<option value="left" <?php if ( get_option('acp_toolbar_side') == 'left' ) echo 'selected="selected"'; ?>><?php _e('Left', 'acp');?></option>
								<option value="right" <?php if ( get_option('acp_toolbar_side') == 'right' ) echo 'selected="selected"'; ?>><?php _e('Right', 'acp');?></option>
							</select>
						</div>
						<div class="acp-field-wrap">
							<label for="acp_toolbar_icon_pos"><?php _e('Icon position', 'acp');?></label><br />
							<select id="acp_toolbar_icon_pos" name="acp_toolbar_icon_pos">
								<option value="top" <?php if ( get_option('acp_toolbar_icon_pos') == 'top' ) echo 'selected="selected"'; ?>>Top</option>
								<option value="middle" <?php if ( get_option('acp_toolbar_icon_pos') == 'middle' ) echo 'selected="selected"'; ?>>Middle</option>
								<option value="bottom" <?php if ( get_option('acp_toolbar_icon_pos') == 'bottom' ) echo 'selected="selected"'; ?>>Bottom</option>
							</select>
						</div>
						<div class="acp-field-wrap">
							<label for="acp_toolbar_icon_size"><?php _e('Icon size (default is medium)', 'acp');?></label><br />
							<select id="acp_toolbar_icon_size" name="acp_toolbar_icon_size">
								<option value="small" <?php if ( get_option('acp_toolbar_icon_size') == 'small' ) echo 'selected="selected"'; ?>><?php _e('Small', 'acp'); ?></option>
								<option value="medium" <?php if ( get_option('acp_toolbar_icon_size') == 'medium' ) echo 'selected="selected"'; ?>><?php _e('Medium', 'acp'); ?></option>
							</select>
						</div>
					</div>
				
					<h3 class="ui-sortable-handle"><?php _e('Contrast', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<label for="acp_contrast_add"><?php _e('Affect additional elements with the contrast (separate elements with comma)', 'acp');?></label><br />
							<input name="acp_contrast_add" type="text" value="<?php if( get_option( 'acp_contrast_add' ) ){echo get_option( 'acp_contrast_add' );} ?>" />
						</div>
						<h4><?php _e('Bright Contrast', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_contrast_disable_bright" id="acp_contrast_disable_bright" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_disable_bright' ) ); ?> />
							<label for="acp_contrast_disable_bright"><?php _e('Don\'t use any style for the Bright option.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_bright_all" id="acp_contrast_bright_all" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_bright_all' ) ); ?> />
							<label for="acp_contrast_bright_all"><?php _e('Affect on all the elements in Bright contrast mode.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_bright" id="acp_contrast_bright" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_bright' ) ); ?> />
							<label for="acp_contrast_bright"><?php _e('Use custom colors for the Bright option.', 'acp');?></label>
						</div>
						<div id="acp-bright-set" class="hidden">
							<hr />
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_bg"><?php _e('Custom Color for the Background of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_bg" type="text" value="<?php if( get_option( 'acp_contrast_bright_link' ) ){echo get_option( 'acp_contrast_bright_bg' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_text"><?php _e('Custom Color for the Text of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_text" type="text" value="<?php if( get_option( 'acp_contrast_bright_text' ) ){echo get_option( 'acp_contrast_bright_text' );} ?>" class="meta-color"  />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_link"><?php _e('Custom Color for the Link of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_link" type="text" value="<?php if( get_option( 'acp_contrast_bright_link' ) ){echo get_option( 'acp_contrast_bright_link' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_linkHover"><?php _e('Custom Color for the Link of the Bright option in hover & focus modes.', 'acp');?></label><br />
								<input name="acp_contrast_bright_linkHover" type="text" value="<?php if( get_option( 'acp_contrast_bright_linkHover' ) ){echo get_option( 'acp_contrast_bright_linkHover' );} ?>" class="meta-color" />
							</div>
							<hr />
						</div>
						<h4><?php _e('Dark Contrast', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_contrast_disable_dark" id="acp_contrast_disable_dark" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_disable_dark' ) ); ?> />
							<label for="acp_contrast_disable_dark"><?php _e('Don\'t use any style for the Dark option.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_dark_all" id="acp_contrast_dark_all" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_dark_all' ) ); ?> />
							<label for="acp_contrast_dark_all"><?php _e('Affect on all the elements in Dark contrast mode.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_dark" id="acp_contrast_dark" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_dark' ) ); ?> />
							<label for="acp_contrast_dark"><?php _e('Use custom colors for the Dark option.', 'acp');?></label>
						</div>
						<div id="acp-dark-set" class="hidden">
							<hr />
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_bg"><?php _e('Custom Color for the Background in the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_bg" type="text" value="<?php if( get_option( 'acp_contrast_dark_bg' ) ){echo get_option( 'acp_contrast_dark_bg' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_text"><?php _e('Custom Color for the Text in the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_text" type="text" value="<?php if( get_option( 'acp_contrast_dark_text' ) ){echo get_option( 'acp_contrast_dark_text' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_link"><?php _e('Custom Color for the Link of the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_link" type="text" value="<?php if( get_option( 'acp_contrast_dark_link' ) ){echo get_option( 'acp_contrast_dark_link' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_linkHover"><?php _e('Custom Color for the Link of the Dark option in hover & focus modes.', 'acp');?></label><br />
								<input name="acp_contrast_dark_linkHover" type="text" value="<?php if( get_option( 'acp_contrast_dark_linkHover' ) ){echo get_option( 'acp_contrast_dark_linkHover' );} ?>" class="meta-color" />
							</div>
						</div>
					</div>
					
					<h3 class="ui-sortable-handle"><?php _e('Font Sizer', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<label for="acp_fontsizer_size"><?php _e('Set the change of the font sizers in pixels.', 'acp');?></label><br />
							<input name="acp_fontsizer_size" type="number" value="<?php if( get_option( 'acp_fontsizer_size' ) ){echo get_option( 'acp_fontsizer_size' );}else{echo '2';} ?>" />
						</div>
						<div class="acp-field-wrap">
							<input name="acp_fontsizer_customtags" id="acp_fontsizer_customtags" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_fontsizer_customtags' ) ); ?> />
							<label for="acp_fontsizer_customtags"><?php _e('Use custom tags, classes & id\'s with the Font sizer.', 'acp');?></label>
						</div>
						<div id="acp-fontsizer-customtags" class="hidden">
							<label for="acp_fontsizer_tags"><?php _e('Write your custom tags, classes & id\'s for the Font sizer. separate items with a comma.', 'acp');?></label><br />
							<input name="acp_fontsizer_tags" type="text" value="<?php if( get_option( 'acp_fontsizer_tags' ) ){echo get_option( 'acp_fontsizer_tags' );} ?>" placeholder="default: p, h1, h2, h3"  />
						</div>
					</div>
				</section>
				
				<!-- Skiplinks -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Skiplinks', 'acp');?></h3>
					<div class="inside">
						<p><?php _e('Skiplinks are links which aid navigation around the current page. the user who navigate with skiplinks do it with the Tab button.', 'acp');?></p>
						<p class="info-text"><?php _e('Before you activate the skiplinks, you should check if your theme has already got Skiplinks (you can check it by pressing the Tab button when you first land on a page, the Skiplinks need to be the first links that will be focused to a keyboard user).', 'acp');?></p>
						<div class="acp-field-wrap">
							<input name="acp_skiplinks" id="acp_skiplinks" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks' ) ); ?> />
							<label for="acp_skiplinks"><?php _e('Enable Skiplinks', 'acp');?></label>
						</div>
						
						<section id="acp_skiplinks_active" class="hidden">
							<p class="info-text"><?php _e('After activating this option a new menu will be registered with your built-in "Menus" of WP. You then will need to create custom menu and add to it "Links" that points to the area you want to target to, for example if the Name of the Skiplink is: "Skip to Content", so the value of the link will probably be "#content".', 'acp');?></p>
							<div class="acp-field-wrap">
								<label for="acp_skiplinks_side"><?php _e('Skiplinks Side', 'acp');?></label><br />
								<select id="acp_skiplinks_side" name="acp_skiplinks_side">
									<option value="none" <?php if ( get_option('acp_skiplinks_side') == 'none' ) echo 'selected="selected"'; ?>><?php _e('Center (default)', 'acp'); ?></option>
									<option value="left" <?php if ( get_option('acp_skiplinks_side') == 'left' ) echo 'selected="selected"'; ?>><?php _e('Left', 'acp'); ?></option>
									<option value="right" <?php if ( get_option('acp_skiplinks_side') == 'right' ) echo 'selected="selected"'; ?>><?php _e('Right', 'acp'); ?></option>
								</select>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_skiplinks_home" id="acp_skiplinks_home" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks_home' ) ); ?> />
								<label for="acp_skiplinks_home"><?php _e('Use different links for Home page', 'acp');?></label>
								<p class="info-text acp_skiplinks_home-info"><?php _e('This option will add another menu to your built-in WP Menus there you should set the permalinks for your Home page.', 'acp');?></p>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_skiplinks_style" id="acp_skiplinks_style" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks_style' ) ); ?> />
								<label for="acp_skiplinks_style"><?php _e('Use your own style for the skiplinks', 'acp');?></label>
								<fieldset id="acp-skiplinks-styles">
									<div class="acp-field-wrap">
										<label for="acp_skiplinks_bg"><?php _e('Background color', 'acp');?></label><br />
										<input name="acp_skiplinks_bg" type="text" value="<?php if( get_option( 'acp_skiplinks_bg' ) ){echo get_option( 'acp_skiplinks_bg' );} ?>" class="meta-color" placeholder="default: #eeeeee"  />
									</div>
									<div class="acp-field-wrap">
										<label for="acp_skiplinks_textColor"><?php _e('Link color', 'acp');?></label><br />
										<input name="acp_skiplinks_textColor" type="text" value="<?php if( get_option( 'acp_skiplinks_textColor' ) ){echo get_option( 'acp_skiplinks_textColor' );} ?>" class="meta-color" />
									</div>
									<div class="acp-field-wrap">
										<input name="acp_skiplinks_linkUnderline" id="acp_skiplinks_linkUnderline" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks_linkUnderline' ) ); ?> />
										<label for="acp_skiplinks_linkUnderline"><?php _e('Disable link underline', 'acp');?></label>
									</div>
								</fieldset>
							</div>
						</section>
					</div>
				</section>
			
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Links', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<input name="acp_rolelink" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_rolelink' ) ); ?> />
							<label for="acp_rolelink"><?php _e('Add role="link" to all the &lt;a&gt; tag.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_removetarget" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_removetarget' ) ); ?> />
							<label for="acp_removetarget"><?php _e('Force Open links in current tab (Remove the "target" attribute from all links).', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_linksaria" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_linksaria' ) ); ?> />
							<label for="acp_linksaria"><?php _e('Change all title attributes on links to aria-label.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_focuslinks" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_focuslinks' ) ); ?> />
							<label for="acp_focuslinks"><?php _e('Add outline to all links on focus mode.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_underlines" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_underlines' ) ); ?> />
							<label for="acp_underlines"><?php _e('Force underline for links.', 'acp');?></label>
						</div>
					</div>
				</section>
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Images', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<input name="acp_imageforcealt" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_imageforcealt' ) ); ?> />
							<label for="acp_imageforcealt"><?php _e('Force using ALT on all images.', 'acp');?></label>
						</div>

						<div class="acp-field-acp_imagealt">
							<h4><?php _e('Replacement for the image ALT', 'acp'); ?></h4>
						    <label>
						        <input type="radio" name="acp_imagealt" value="none" <?php checked( 'none', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'None', 'acp' )?>
						    </label><br />
						    <label>
						        <input type="radio" name="acp_imagealt" value="title" <?php checked( 'title', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'Use attachment title as ALT for images with no alt', 'acp' )?>
						    </label><br />
						    <label>
								<input type="radio" name="acp_imagealt" value="desc" <?php checked( 'desc', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'Use attachment description as ALT for images with no alt', 'acp' )?>
						    </label>
						</div>
					</div>
				</section>
				<?php submit_button(); ?>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#acp_skiplinks').click(function() {
  		$('#acp_skiplinks_active').fadeToggle(400);
	});
	if ($('#acp_skiplinks:checked').val() !== undefined) {
		$('#acp_skiplinks_active').show();
	}
	
	$('#acp_skiplinks_home').click(function() {
  		$('.acp_skiplinks_home-info').fadeToggle(400);
	});
	if ($('#acp_skiplinks_home:checked').val() !== undefined) {
		$('.acp_skiplinks_home-info').show();
	}
	
	$('#acp_skiplinks_style').click(function() {
  		$('#acp-skiplinks-styles').fadeToggle(400);
	});
	if ($('#acp_skiplinks_style:checked').val() !== undefined) {
		$('#acp-skiplinks-styles').show();
	}
	
	$('#acp_contrast').click(function() {
  		$('#acp-contrast_options').fadeToggle(400);
	});
	if ($('#acp_contrast:checked').val() !== undefined) {
		$('#acp-contrast_options').show();
	}
	
	$('#acp_contrast_bright').click(function() {
  		$('#acp-bright-set').fadeToggle(400);
	});
	if ($('#acp_contrast_bright:checked').val() !== undefined) {
		$('#acp-bright-set').show();
	}
	
	$('#acp_contrast_dark').click(function() {
  		$('#acp-dark-set').fadeToggle(400);
	});
	if ($('#acp_contrast_dark:checked').val() !== undefined) {
		$('#acp-dark-set').show();
	}
	
	$('#acp_fontsizer_customtags').click(function() {
  		$('#acp-fontsizer-customtags').fadeToggle(400);
	});
	if ($('#acp_fontsizer_customtags:checked').val() !== undefined) {
		$('#acp-fontsizer-customtags').show();
	}
	
});
</script>
<?php
}

function acp_html_lang() {
	$curLang = substr(get_bloginfo( 'language' ), 0, 2);
?>
<script>
jQuery(window).load(function(){
	jQuery('html').attr('lang', '<?php echo $curLang; ?>');
});
</script>
<?php
}
if( get_option('acp_htmllang', false) ) {
	add_action( 'wp_footer', 'acp_html_lang' );
}

function acp_focus_links( $classes ) {
	$classes[] = 'acp-focus';
	return $classes;
}
if( get_option('acp_focuslinks', false) ) {
	add_filter( 'body_class', 'acp_focus_links' );
}

function acp_color_enqueue() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'meta-box-color-js', plugin_dir_url( __FILE__ ) . 'js/meta-box-color.js', array( 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'acp_color_enqueue' );


function acp_frontend_styles() {
	$output= '<style>';
	
	if( get_option( 'acp_skiplinks', false ) ) {
		$output .= 'ul#acp_skiplinks > li > a {';
		$output .= (get_option('acp_skiplinks_bg')) ? 'background-color:' . get_option( 'acp_skiplinks_bg' ) . ';' : '';
		$output .= (get_option('acp_skiplinks_textColor')) ? 'color:' . get_option( 'acp_skiplinks_textColor' ) . ';' : '';
		$output .= (get_option('acp_skiplinks_linkUnderline')) ? 'text-decoration: none !important': 'underline';
		$output .= '}';
	}
	$output .= '</style>';
	echo $output;
}
if( get_option( 'acp_skiplinks', false ) ) {
	add_action('wp_head','acp_frontend_styles');
}

