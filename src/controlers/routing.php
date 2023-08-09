<?php


class page_router
{
	private $url;

	public function __construct() {
		/* Asign the Current URI Path to $this->url */
		$this->url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	/* The default path for all the php files */
	public $pages_dir = './src/pages/';

	/* The list of routings URI path => Destination */
	public $route_list = [
		'/'          => 'home.php',
		'/home'      => 'home.php',
		'/account'   => 'account.php',
		'/user'      => 'user.php',
		'/market'    => 'market.php',
		'/trends'    => 'trends.php',
	];

	/* Redirect user to coresponding page */
	public function route_to_page() : void
	{
		if (isset($this->route_list[$this->url]))
		{

			require $this->pages_dir . $this->route_list[$this->url];

		} else {

			http_response_code(404);
			require $this->pages_dir . 'error_pages/404.php';

		}
	}
}