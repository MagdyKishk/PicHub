<?php
	/* Page Configuration */
	$page_css    = './src/css/pages/market.css';
	$page_js     = './src/js/pages/market.js';
	$page_title  = "market";
	ob_start();
	require __DIR__ . '\content\market_con.php';
	$page_content = ob_get_clean(); // Get and clear the buffered content
	include __DIR__ . '/templates/base.php';
?>
