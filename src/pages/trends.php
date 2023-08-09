<?php
	/* Page Configuration */
	$page_css    = './src/css/pages/trends.css';
	$page_js     = './src/js/pages/trends.js';
	$page_title  = "trends";
	ob_start();
	require __DIR__ . '\content\trends_con.php';
	$page_content = ob_get_clean(); // Get and clear the buffered content
	include __DIR__ . '/templates/base.php';
?>
