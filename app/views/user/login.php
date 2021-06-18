
<body class="bg-gradient-primary">
 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-4">

        <div class="card my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-3">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                  </div>
                  <?php 
        					if (Input::exists()) {
        						if(Token::check(Input::get('token'))){
        							$validate = new Validate();
        							$validation = $validate->check($_POST, array(
        								'email' => array(
        									'required' => true
        								),
        								'password' => array(
        									'required' => true,
        									'min' => 6
        								)
        							));
        							if (!$validation->passed()) {
        								foreach ($validation->errors() as $error):
        									echo Alert::message($error,4);
        								endforeach;
        							}else{
        								Auth::postLogin();
        							}
        						}
        					}
					
                  if (Session::exists('login')):
        						echo Session::flash('login');
        					endif;
                  //echo Hash::salt2(32);
                  ?>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="hidden" name="token" value="<?=Token::generate();?>">
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    
                  <div class="text-center">
                    <a class="small" href="register">Create an Account!</a>
                  </div>
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