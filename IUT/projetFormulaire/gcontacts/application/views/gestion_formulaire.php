 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Vos formulaires</h1>
          <p class="mb-4">Vous pouvez depuis cette page consulter les informations concernant vos formulaire, les activer et désactiver et les supprime. Vous pouvez aussi conuslter leurs statistiques.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Description</th>
                      <th>ID</th>
                      <th>clé</th>
                      <th>Activité</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Titre</th>
                      <th>Description</th>
                      <th>ID</th>
                      <th>clé</th>
                      <th>Activité</th>
                    </tr>
                  </tfoot>
                  <tbody>
               		<?php 
					foreach ($forms as $row) {
						echo "<tr>";
						echo "<td>$row->titre</td>";
						echo "<td>$row->description</td>";
						echo "<td>$row->id</td>";
						echo "<td>$row->clef</td>";
						echo "<td>$row->active</td>";
						echo "</tr>";
					}
					?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
 


        <?php echo form_open('Affichage/afficher_stats'); ?>
		        <center><input required type="text" id="cle" class="champ" name="cle" placeholder="Clé d'un formulaire"></center><br>
            <center><button class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Accéder aux statistiques du formulaire correspondant</button><br><br></center>
			<?php echo form_close(); ?>
			
			<?php echo form_open('Affichage/desactivation'); ?>
            <center><input required type="text" id="cle" class="champ" name="cle" placeholder="Clé d'un formulaire"></center><br>
            <center><button class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Activer/Desactiver le formulaire correspondant</button><br><br></center>
            <?php echo form_close(); ?>

      <?php echo form_open('Affichage/supprimation'); ?>
            <center><input required type="text" id="cle" class="champ" name="cle" placeholder="Clé d'un formulaire"></center><br>
            <center><button class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Supprimer le formulaire correspondant</button><br><br></center>
            <?php echo form_close(); ?>

      <?php echo form_open('Affichage/menu_creation_formulaire'); ?>
            <center><button class='d-flex justify-content-center btn btn-sm btn-primary shadow-sm'>Creer un formulaire</button><br><br></center>
            <?php echo form_close(); ?>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Our Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
