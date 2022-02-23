<!--     <?php if(isset($_SESSION['identifiant'])) $ident=$_SESSION['identifiant']; else $ident = ""; ?>
 -->
          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h2 mb-0 text-gray-800"> Bienvenue sur notre site de Gestion de formulaire en ligne </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Accésder au formulaire</a>
          </div>
          <br><br><br><br><br><br><br> -->
          <!-- Topbar Search
          <form class="d-sm-flex align-items-center justify-content-center mb-4">
            <div class="input-group"> -->

<!--             <?php echo form_open('Affichage/afficher_form'); ?>
 -->              <!-- <input type="text" id="cle" name="cle" class="champ form-control bg-light border-1 small" placeholder="Entrez une clé de formulaire..." >
              
                <br>
                <center><button class="d-flex justify-content-center btn btn-sm btn-primary shadow-sm">
                  <i class="fas fa-download fa-sm text-white-50"></i> Accéder au formulaire correspondant</button></center> -->
                <!-- <?php echo form_close(); ?> -->
              
           <!--  </div>
          </form>
          <br><br><br><br><br><br><br> -->
           

          <!--  -->



<div class="row">
        <div class="col-md-12">
          <div class="banner text-center">

            <?php if(isset($_SESSION['identifiant'])) $ident=$_SESSION['identifiant']; else $ident = ""; ?>
            <h1><br />Bienvenue sur notre site de Gestion de formulaire en ligne <?php echo $ident; ?></h1>
            <h2>Escale Forms<br /><br /><br /><br /></h2>
            
            <?php echo form_open('Affichage/afficher_form'); ?>
		      <input type="text" id="cle" class="champ" name="cle" placeholder="Clé d'un sondage"><hr>

            <center><button class="d-flex justify-content-center btn btn-sm btn-primary shadow-sm">Accéder au formulaire correspondant</button><br><br></center>
            <?php echo form_close(); ?>

            <?php if(isset($this->session->identifiant)){
               echo form_open('Affichage/menu_creation_formulaire');
                  echo "<center><button class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Creer un formulaire</button><br><br></center>";
               echo form_close();
            } 
              ?>
        </div>
        </div>
      </div>
    </div>
  </div>