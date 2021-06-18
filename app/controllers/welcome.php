<?php 

class Welcome extends Controller 
{
	public function __construct()
	{
		$this->_db = DB::getInstance();
		$this->user = $this->model('User');
	}
	public function index()
	{
		$code = [
			'name' => 'FjFrame',
			'version' => 4,
		];
		echo $a;
		$this->view('welcome', compact('code'));
	}

	public function about($name = '', $age = '') {
		$this->view('test', compact('name', 'age')); 
	} 
	
}

?>