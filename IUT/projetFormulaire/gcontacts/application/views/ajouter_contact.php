<title>SB Admin 2 - Register</title>

<body class="bg-gradient-primary">

  <div class="container">

  	<?php echo form_open('form/inscription',array()); ?>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<?php echo form_error('identifiant'); ?>
                    <input type="text" class="form-control form-control-user" name="identifiant" value="<?php echo set_value('identifiant'); ?>" size="50" placeholder="Identifiant" >
                  </div>
                </div>
                <div class="form-group">
                	<?php echo form_error('email'); ?>
                  <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control form-control-user" placeholder="Email Address" size="50">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<?php echo form_error('password'); ?>
                    <input type="password"  name="password" value="" size="50" class="form-control form-control-user" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                  	<?php echo form_error('passconf'); ?>
                    <input type="password" name="passconf" value="" size="50" class="form-control form-control-user" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="_mts">
				<button id="envoyer" name="envoyer" class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Créer</button>
			</div>

              </form>
              <hr>
              <br><br><br><br><br>
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>