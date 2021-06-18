<?php

class Auth extends Controller
{
	public function __construct()
	{
		$this->user = $this->model('User');
		$this->file = $this->model('File');
		$this->_db = DB::getInstance();
	}
	public function register($name = '')
	{
		return $this->view('user/register');
	}

	public function postregister()
	{
		$user = new User();
		$salt = Hash::salty(32);
		try {
			$user->create(array(
				'email' => Input::get('email'),
				'password' => Hash::makeHash(Input::get('password'), $salt),
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'groupp' => 6,
			));

			Session::flash('login', 'You have been registered and can now log in!');
			Redirect::to('login');
		} catch (Exception $e) {
			die($e->getMessage());
		}
		//return $this->view('user/register');
	}
	public function trainerRegister()
	{
		$this->view('user/apply');
	}
	public function postTrainerRegister()
	{
		$file = Input::hasFile('resume');
		$ext = $this->file->fileExt($file);
		try {
			if($ext == 'application/pdf' || $ext == 'application/msword'){
				$path = 'uploads/gallery/'.date("Y"). '/' . date("m").'/';
				$resume = $this->file->move_to($file,$path);
				$this->_db->insert('users',array(
					'email' => Input::get('email'),
					'first_name' => Input::get('first_name'),
					'last_name' => Input::get('last_name'),
					'groupp' => 5,
					'apply' => 1,
					'resume' => $path.$resume,
				));

				Session::flash('home', 'Sent! You will receive an email on invitation.');
				Redirect::to('./');
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function login()
	{
		return $this->view('user.login');
	}

	public function postLogin()
	{
		$user = new User();
      	$remember = (Input::get('remember') === 'on') ? true : false;
      	$login = $user->login(Input::get('email'), Input::get('password'), $remember);
      	//print_r($login);
       	if ($login) {
        	Redirect::to(SITE_ROOT);
		}else{
			Session::flash('login', 'An error occured');
			Redirect::to('login');
		}
	}

	public function logout()
	{
		if($this->user->data()) $this->user->logout();
		Redirect::to(SITE_URL);
	}
}
?>