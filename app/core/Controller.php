<?php  

class controller
{
	public function model($model)
	{
		require_once APP_ROOT . '/models/' . $model . '.php';
		return new $model();
	}
	public function view($view, $data = [])
	{
		$error = error_get_last();	
		if($error) require_once APP_ROOT . '/views/errors/syntax_error_page.php';
		if(file_exists(APP_ROOT . '/views/' . str_replace('.', '/', $view) . '.php')){
			$data = json_decode(json_encode($data), FALSE);
			require_once APP_ROOT . '/views/' . str_replace('.', '/', $view) . '.php';
		}else require_once APP_ROOT . '/views/errors/404.php';
	}
	public function json($data = [])
	{
		echo json_encode($data);
	}
}

?>