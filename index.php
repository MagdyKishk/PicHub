<?php 
	require_once __DIR__ . '/src/controlers/routing.php';
	require_once __DIR__ . '/src/controlers/database.php';
	@session_start();
	if (isset($_SESSION["user_data"])) {
		$db = new db_manager();
		$db->refresh_user_data();
	}
	$router = new page_router;
	$router->route_to_page();