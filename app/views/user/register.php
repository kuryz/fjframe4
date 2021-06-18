

<body class="bg-gradient-primary">

  <div class="container">
  	<div class="col-md-6 offset-md-3">
  		
    <div class="card o-hidden border-0 shadow-lg my-5">
    	<?php 
  			if (Input::exists()) {
				if(Token::check(Input::get('token'))){
					$validate = new Validate();
					$validation = $validate->check($_POST, array(
						'first_name' => array(
							'required' => true,
							'min' => 4
						),
						'last_name' => array(
							'required' => true,
							'min' => 4
						),
						'email' => array(
							'required' => true,
							'unique' => 'users'
						),
						'password' => array(
							'required' => true,
							'min' => 6
						),
						'password_confirmation' => array(
							'required' => true,
							'matches' => 'password'
						)
					));
					if (!$validation->passed()) {
						foreach ($validation->errors() as $error):
							echo Alert::message($error,4);
						endforeach;
					}else{
						Auth::postregister();
					}
				}
			}
  		?>
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="first_name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="last_name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                  </div>
                </div>
                <input type="hidden" name="token" value="<?=Token::generate();?>">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="javascript:void(0)" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="javascript:void(0)" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
              </div>
              <div class="text-center">
                <a class="small" href="login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
  </div>
  <script type="text/javascript">
	setTimeout(function(){ $('.alert').fadeOut('slow') }, 4000);
</script>