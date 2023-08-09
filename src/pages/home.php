<?php
	/* Page Configuration */
	$page_css    = './src/css/pages/home.css';
	$page_js     = './src/js/pages/home.js';
	$page_title  = "home";
	ob_start();
	require __DIR__ . '\content\home_con.php';
	$page_content = ob_get_clean(); // Get and clear the buffered content
	include __DIR__ . '/templates/base.php';
?>
