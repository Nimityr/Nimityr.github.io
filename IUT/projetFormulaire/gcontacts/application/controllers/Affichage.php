<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affichage extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('Form_model');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('cookie');
    }

    public function index(){
        $this->header();
        $this->load->view('accueil');
        $this->load->view('templates/footer');
    }    

    public function reponses_send(){
        $reps = $this->input->post("rep");
        foreach($reps as $key => $row){

            foreach($row as $roww){

                $data = array(
                    'id' => $roww,
                    'id_quest' => $key
                );
                $this->Form_model->insert_answer_user($data);
            }
        }
        $this->header();
        $this->load->view('accueil', array('reps' => $reps));
        $this->load->view('templates/footer');
    }

    public function connect() {
        $this->load->view('templates/header');
        $this->load->view('connexion_user');
        $this->load->view('templates/footer');
    }

    public function registration(){
        $this->load->view('templates/header');
        $this->form_validation->set_error_delimiters('<div class="errorr">', '</div>');
        $this->load->view('ajouter_contact');
        $this->load->view('templates/footer');
    }

    public function desactivation(){
        $clef = $this->input->post('cle');
        $this->header();
        
        $data = $this->Form_model->desactivation($clef);
        
        redirect('Affichage/accueil');
    }

    public function supprimation(){
        $clef = $this->input->post('cle');
        $this->header();
        
        $data = $this->Form_model->delete_formulaire($clef);
        redirect('Affichage/accueil');
    }

    public function afficher_stats(){
        $clef = $this->input->post('cle');
        $this->header();
        $data = $this->Form_model->get_form($clef);
        foreach($data as $formulaire){
            $titre = $formulaire;
            $id_form = $formulaire->id;
        }
        $data = $this->Form_model->get_questions($id_form);

        foreach($data as $row){
            $id_q = $row->idQ;
            $question = array(
                'titre' => $row->titre,
                'id' => $row->idQ
            );
            $this->load->view('reponses_success', array('question' => $question['titre']));

            $all_reps = array();
            $reps = $this->Form_model->get_answers_with_id($id_q);
            $nb_reps = $this->Form_model->get_nb_answers_q($id_q);
            $nombre_rep = 0;
            foreach($nb_reps as $reponze){
                $nombre_rep++;
            }
            $i=0;
            foreach($reps as $reponses){
                $id_r = $reponses->idR;
                $reponses = $reponses->reponse;
                $nb_reps_reps = $this->Form_model->get_nb_answers_r($id_r);
                $nb_reps_per_id = array();
                $diff_id = $this->Form_model->get_nb_answers_r_distinct($id_r);
                $diff_id_true = array();

                foreach($diff_id as $rowww){
                    $nb = 0;
                    array_push($diff_id_true,"$rowww->id_rep_user");
                    foreach($nb_reps_reps as $roar){
                        
                        if($roar->id_rep_user == $rowww->id_rep_user){
                            $nb++;
                        }
                        
                    }
                    $this->load->view('statistiques',array(
                        'reponse' => array(
                            'id_r' => $this->Form_model->get_reponse_libelle($roar->id_rep_user),
                            'nb_r' => $nb
                        ),
                        'nb_rep' => $nombre_rep
                    )
                    );
                }

                
                $i++;
            }
        }
        
        $this->load->view('templates/footer');
    }

    public function afficher_form(){
        $clef = $this->input->post('cle');

        $this->header();
        $data = $this->Form_model->get_form($clef);

        if(empty($data) ){
            echo 'saucisse';
            redirect('Affichage/accueil');
        }

        foreach($data as $formulaire){
            $titre = $formulaire;
            $id_form = $formulaire->id;
            if($formulaire->active == "0"){
                redirect('Affichage/accueil');
            }
        }
        $data = $this->Form_model->get_questions($id_form);
        $all_questions = array();
        foreach($data as $row){
            $id_q = $row->idQ;
            $question = array(
                'titre' => $row->titre,
                'type' => $row->type,
                'help' => $row->help,
                'id' => $row->idQ
            );

            $all_reps = array();
            $reps = $this->Form_model->get_answers($id_q);
            foreach($reps as $reponses){
                $reponses = $reponses->reponse;
                array_push($all_reps,$reponses);
            }

            $valeurs = array('question' => $question,'reponse' => $all_reps);
            array_push($all_questions,$valeurs);
        }

        $this->load->view('form_affichage', array('titre' => $titre, 'question' => $all_questions));
        $this->load->view('templates/footer');
    }

    public function menu_creation_formulaire(){
        $this->header();
        $this->load->view('menu_creation_formulaire');
        $this->load->view('templates/footer');
    }

    public function menu_ajout_question(){
        $this->header();
        $this->load->view('menu_creation_question');
        $this->load->view('templates/footer');
    }

    public function reponse_sondage(){
        $this->header();
        $this->load->view('reponse_sondage');
        $this->load->view('templates/footer');
    }

    public function menu_gestion_formulaire(){
        $this->load->model('Form_model');
        $req = $this->Form_model->afficher_formulaire_user();
        $this->header();
        $this->load->view('gestion_formulaire', array('forms' => $req));
        $this->load->view('templates/footer');
    }

    public function header(){
		if(isset($_SESSION['identifiant'])) {
            $this->load->view('templates/header');
			$this->load->view('templates/header_connected');
		}
		else {
            $this->load->view('templates/header');
			$this->load->view('templates/header_unconnected');
		}
    }
    
    public function accueil() {
		$this->header();
        $this->load->view('accueil');
        $this->load->view('templates/footer');
	}


}