<?php 
namespace Tsi\Atividade3e4\controller;

use Tsi\Atividade3e4\controller\api\Controller as ApiController;
// use tsi\atividade_3e4\controller\web\Controller as WebController;

class Route
{
	private static $query;
	public static function resolve(Array $routes)
	{

		$url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  	parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query_params);

  	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	    $_POST = array_merge($_POST, $query_params);
  	}
		self::$query = explode('/', $url_path);

		error_log("Query array: \n".print_r(self::$query, TRUE));
		
		$type = 'web';
		if(self::$query[0]=="api"){
			array_shift(self::$query);
			$type='api';
		}

		// $controller = ($type == 'web')? WebController::class : ApiController::class;
		
		$controller = ApiController::class;
		$class = null;
		$method = null;
		$param = null;

		error_log("Route: $url_path");
		
		if (self::$query) {
			$class_name = self::$query[0];
			if (count(self::$query) > 1) {
				$method = self::$query[1];
				$param = (count(self::$query) > 2) ? self::$query[2] : null;
			}

			if (isset($routes[$type][$class_name])) {
				error_log("routes config: ".print_r($routes,true));
				$class = new $routes[$type][$class_name];
				if ($class instanceof $controller) {
					if ($method && method_exists($class, $method)) {
						if ($param) {
							$class->$method($param);
						} else {
							$class->$method();
						}
					} else {
						if (method_exists($class, 'index')){
							error_log("Class: ".print_r($class,true));
							$class->index();
						}
						else $class = null;
					}
				}
			}
		}
		if (!$class) header('HTTP/1.0 404 Not Found');
	}
}