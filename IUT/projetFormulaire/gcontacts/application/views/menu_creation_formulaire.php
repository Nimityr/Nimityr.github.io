<?php
echo validation_errors(); 

echo form_open('form/creer_formulaire'); 
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
            <h1 class="h3 mb-0 text-gray-800">Création</h1>
            <p class="mb-4">Vous pouvez depuis cette page créer votre propre formulaire. Vous avez à votre disposition 5 types de questions, vous pouvez aussi ajouter une aide pour complementer votre réponse.</p>
        

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-6">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Titre </div>
                      <div class="form-group">
                      <input type="input" name="titre" placeholder="Titre formulaire..." class="form-control form-control-user" aria-describedby="emailHelp">
                    </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Description </div>
                      <div class="form-group">
                      <textarea type="input" name="description" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Description..."></textarea>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
            <br> <br>
           <div class="card border-left-success shadow h-100 py-2">
                

                <div id="questions"></div>

    <center><input type="button" name="ajouter" onclick="ajouterQuestion('questions', 'true')" value="Ajouter question"></center>

    <hr> <center><input type="submit"  name="submit" class="d-flex justify-content-center btn btn-sm btn-primary shadow-sm" value="Valider formulaire"></center>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script type="text/javascript">
let compteur_question = 0;
let compteur_option = 0;
let type = [];

window.onload =ajouterQuestion('questions', false);

function ajouterQuestion(nomDiv, supprimable)
{   
    /* On ajoute le type de la question au tableau de types */
    type.push(1);

    /* On crée la div contenant la question */
    let nouvelle_div_question = document.createElement('div');
    nouvelle_div_question.setAttribute("id", "question" + compteur_question)

    if (supprimable)
    {
        contenu_question = "</br>Titre : <input type='text' name='questions[" + compteur_question + "][titre]' placeholder='Question sans titre'>\
                                        <input type='button' name='supprimer_question' onclick='supprimerQuestion(" + compteur_question + ")' value='Supprimer question'>\
                                        </br>Aide : <input type='text' name='questions[" + compteur_question + "][aide]' placeholder='Indication'>\
                                        <select name='questions[" + compteur_question + "][type]' onchange='changerType(event, " + compteur_question + ")'>\
                                            <option>Champ de texte</option>\
                                            <option>Zone de texte</option>\
                                            <option>Choix multiples</option>\
                                            <option>Cases à cocher</option>\
                                            <option>Liste déroulante</option>\
                                        </select>";
    }
    else
    {
        contenu_question = "</br>Titre : <input type='text' name='questions[" + compteur_question + "][titre]' placeholder='Question sans titre'>\
                                </br>Aide : <input type='text' name='questions[" + compteur_question + "][aide]' placeholder='Indication'>\
                                <select name='questions[" + compteur_question + "][type]' onchange='changerType(event, " + compteur_question + ")'>\
                                    <option>Champ de texte</option>\
                                    <option>Zone de texte</option>\
                                    <option>Choix multiples</option>\
                                    <option>Cases à cocher</option>\
                                    <option>Liste déroulante</option>\
                                </select>";
    }
    nouvelle_div_question.innerHTML = contenu_question;

    /* On crée une div qui contient le bouton qui gère la création d'options, afin de pouvoir le cibler et faciliter sa suppression ou sa création */
    let div_bouton_ajouter_option = document.createElement('span');
    div_bouton_ajouter_option.setAttribute("id", "bouton_ajouter_option" + compteur_question);
    nouvelle_div_question.appendChild(div_bouton_ajouter_option);

    document.getElementById(nomDiv).appendChild(nouvelle_div_question);

    let nouvelle_div_choix = document.createElement('div');
    nouvelle_div_choix.setAttribute("id", "choix" + compteur_question);
    nouvelle_div_question.appendChild(nouvelle_div_choix);

    compteur_question++;
}

function supprimerQuestion(numQuestion)
{
    document.getElementById("question" + numQuestion).remove();
}

function ajouterOption(numQuestion, supprimable)
{
    let nouvelle_div_option = document.createElement('div');
    nouvelle_div_option.setAttribute("id", "option" + compteur_option);
    if (supprimable)
    {
        nouvelle_div_option.innerHTML = "</br>Choix : <input type='text' name='questions[" + numQuestion + "][choix][]' placeholder='Option'>\
                                        <input type='button' name='supprimer_option' onclick='supprimerOption(" + compteur_option + ")' value='-'>";
    }
    else
    {
        nouvelle_div_option.innerHTML = "</br>Choix : <input type='text' name='questions[" + numQuestion + "][choix][]' placeholder='Option'>";
    }
    document.getElementById("choix" + numQuestion).appendChild(nouvelle_div_option);
    compteur_option++;
}

function supprimerOption(numOption)
{
    document.getElementById("option" + numOption).remove();
}

function changerType(e, numQuestion)
{
    choix_type = e.target.value ;

    /* On réinitialise les options de la question si son type passe à Champ de texte ou à Zone de texte */
    if(choix_type == "Champ de texte")
    {
        if (type[numQuestion] > 2)
        {
            document.getElementById("bouton_ajouter_option" + numQuestion).innerHTML = "";
            document.getElementById("choix" + numQuestion).innerHTML = "";
        }

        type[numQuestion] = 1;
    }
    else if(choix_type == "Zone de texte")
    {
        if (type[numQuestion] > 2)
        {
            document.getElementById("bouton_ajouter_option" + numQuestion).innerHTML = "";
            document.getElementById("choix" + numQuestion).innerHTML = "";
        }

        type[numQuestion] = 2;
    }
    else if(choix_type == "Choix multiples")
    {
        if (type[numQuestion] < 3)
        {
            document.getElementById("bouton_ajouter_option" + numQuestion).innerHTML = "<input type='button' name='ajouter_option' onclick='ajouterOption(" + numQuestion + ", true)' value='+'>";
            ajouterOption(numQuestion);
        }
        type[numQuestion] = 3;
    }
    else if(choix_type == "Cases à cocher")
    {
        if (type[numQuestion] < 3)
        {
            document.getElementById("bouton_ajouter_option" + numQuestion).innerHTML = "<input type='button' name='ajouter_option' onclick='ajouterOption(" + numQuestion + ", true)' value='+'>";
            ajouterOption(numQuestion);
        }
        type[numQuestion] = 4;
    }
    else if(choix_type == "Liste déroulante")
    {
        if (type[numQuestion] < 3)
        {
            document.getElementById("bouton_ajouter_option" + numQuestion).innerHTML = "<input type='button' name='ajouter_option' onclick='ajouterOption(" + numQuestion + ", true)' value='+'>";
            ajouterOption(numQuestion);
        }
        type[numQuestion] = 5;
    }
}
</script>

