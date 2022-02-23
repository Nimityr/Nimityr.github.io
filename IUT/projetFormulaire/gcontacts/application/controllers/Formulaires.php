<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulaires extends CI_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
				$this->load->library('session');
				$this->load->helper('cookie');

    }
    
    public function creer_form() {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($char);
        $cle = '';
        for ($i = 0; $i < 20; $i++){
            $cle .= $char[rand(0, $longueurMax - 1)];
        }
           $titre = $this->input->post("titre");
           $lieu = $this->input->post("lieu");
           $descri = $this->input->post("descri");
           $login = $this->session->login;
           $this->load->model('Form_model');
           $sql = $this->Form_model->insert_new_formulaire($cle,$titre,$lieu,$descri,$login);
   
         redirect('/Affichage/menu_creation_formulaire');
       }

    public function add_question(){

    }

    public function set_title(){
      
    }

    public function afficher_detailForm(){
		$cle = $_GET['cle'];
		$this->load->model('Form_model');
		$owner= $this->Sondage_model->check_owner($cle);
		$login = $this->session->login;
		if ($owner==$login){
			redirect('/Affichage/detailSondageOwner?cle='.$cle);
		} else {
			redirect('/Affichage/detailSondageUser?cle='.$cle);
		}
	}

    public function acces_formulaire(){
        $cle = $this->input->post("cle");
        redirect('/Sondage/afficher_detailForm?cle='.$cle);
    }
}