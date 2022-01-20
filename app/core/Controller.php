<?php  
ini_set('display_errors', 0);
class controller
{
	protected $_status = 400, $_body = [], $_error = [];
	public function model($model)
	{
		require_once APP_ROOT . '/models/' . $model . '.php';
		return new $model();
	}
	public function view($view, $data = [])
	{
		$user = new User;
		$error = (object) error_get_last();
		if(!empty($error) && isset($error->message) && $error->message != '') require_once APP_ROOT . '/views/errors/error_page.php';
		 if(file_exists(APP_ROOT . '/views/' . str_replace('.', '/', $view) . '.php')){
			$data = json_decode(json_encode($data), FALSE);
			require_once APP_ROOT . '/views/' . str_replace('.', '/', $view) . '.php';
		}else require_once APP_ROOT . '/views/errors/404.php';
	}
	public function json($status, $error, $result)
	{
		$data = ['status' => $status, 'message' => (object)$error, 'response' => (object)$result];
		echo json_encode($data);
	}
}

?>