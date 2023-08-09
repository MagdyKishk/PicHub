<?php
	/* Page Configuration */
	$page_css    = './src/css/pages/account.css';
	$page_js     = './src/js/pages/account.js';
	$page_title  = "account";
	ob_start();
	require __DIR__ . '\content\account_con.php';
	$page_content = ob_get_clean(); // Get and clear the buffered content
	include __DIR__ . '/templates/base.php';
?>
