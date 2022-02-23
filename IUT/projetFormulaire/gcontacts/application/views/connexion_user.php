<title>SB Admin 2 - Login</title>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <?php echo form_open('form/connexion',array()); ?>
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                    <?php echo form_error('identifiant'); ?>
                      <input type="text" name="identifiant" value="<?php echo set_value('identifiant'); ?>" size="50" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrez votre login...">
                    </div>
                    <div class="form-group">
                    <?php echo form_error('password'); ?>
                      <input type="password" name="password" value="" placeholder="Password" size="50" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button id="envoyer" name="envoyer" class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>