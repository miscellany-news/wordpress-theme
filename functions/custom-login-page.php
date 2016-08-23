<?php
add_action("login_head", "themiscellanynews_login_head");

function themiscellanynews_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/images/logo-icon.png') no-repeat scroll center top transparent;
    background-size: 90px 90px;
    border-radius: 10px;
		height: 90px;
		width: 90px;
    outline: none;
    border: none;
    box-shadow: none;
	}
	</style>
	";
}

function themiscellanynews_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'themiscellanynews_login_logo_url' );

?>
