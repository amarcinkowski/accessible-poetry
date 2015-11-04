<?php

function acp_rolelink_scripts() { ?>
<script type="text/javascript">
jQuery(window).load(function(){
	jQuery( document ).ready(function() {
    	jQuery('a').attr('role', 'link');
	});
});
</script>
<?php
}
if( get_option( 'acp_rolelink', false ) ) {
	add_action( 'wp_head', 'acp_rolelink_scripts');
}

/* Beautiful friend */