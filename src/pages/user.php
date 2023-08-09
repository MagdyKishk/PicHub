<?php
	@session_start();

	if (!isset($_SESSION["user_data"]["logedin"]) && $_SESSION["user_data"]["logedin"] == "false") {
		header("location: /account");
	}

	$USER_DATA            = $_SESSION["user_data"];
	$profile_banner       = $USER_DATA["profile_banner"];
	$profile_pic          = $USER_DATA["profile_pic"];
	$username             = $USER_DATA["username"];
	$description          = $USER_DATA["description"];
	$facebook             = $USER_DATA["facebook"];
	$instagram            = $USER_DATA["instagram"];
	$twitter              = $USER_DATA["twitter"];
	$profile_pic_state    = $USER_DATA["profile_pic_state"];
	$profile_banner_state = $USER_DATA["profile_banner_state"];


	/* Page Configuration */
	$page_css    = './src/css/pages/user.css';
	$page_js     = './src/js/pages/user.js';
	$page_title  = $username;
	ob_start();
	require __DIR__ . '\content\user_con.php';
	$page_content = ob_get_clean();
	include __DIR__ . '/templates/base.php';