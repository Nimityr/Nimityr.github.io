<?php

Class AuthController extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('cookie');
    }

	public function registration(){
		$identifiant = $this->input->post("identifiant");
		$unsecure_password= $this->input->post("password");
      	$email = $this->input->post("email");
      
	  $password = password_hash($unsecure_password,PASSWORD_DEFAULT);
      $this->load->model('User_model');
      $err = $this->User_model->insert_new_user($identifiant, $password,$email);
			if ($err == 1){
				redirect('/Affichage/connect');
			} else {
				echo ('Ce identifiant existe déjà.');
			}
			$this->form_validation->set_error_delimiters('<div class="errorr">', '</div>');

  }

	public function checkConn() {

			$identifiant = $this->input->post("identifiant");
			$password = $this->input->post("password");
			$this->load->model('User_model');
			$hash = $this->User_model->check_connection($identifiant);
			$testidentifiant = $this->db->affected_rows();

			if (password_verify($password, $hash)==true) {
								$this->start_session($identifiant);
      } else if ($hash == 10) {
				echo 'Le identifiant n\'existe pas.';
			} else {
        echo 'Le mot de passe ne correspond pas au identifiant.';
      }
	}

	public function connect_form() {
		$this->connect_form();
		$this->form_validation->set_rules('identifiant', 'identifiant',
				'trim|required|alpha_dash|encode_php_tags|is_unique[Membre.identifiant]|callback_identifiant_check', 
				array('required' => 'You must provide a %s', 'is_unique' => 'Your identifiant is already used'));


		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
		array('required' => 'You must provide a %s'));
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		$this->form_validation->set_message('min_length', '{field} must have at least {param} characters.');

		$this->form_validation->set_error_delimiters('<div class="errorr">', '</div>');
		if ($this->form_validation->run() == FALSE){
            redirect('/Affichage/connect');
            echo "Veuillez remplir tous les champs";
        }else{
            $this->checkConn();
        }
	}

	public function start_session($identifiant){
		if (!isset($_SESSION)){
			session_start();
		}
			$prenom = $this->User_model->start_session($identifiant);
			$newdata = array('identifiant'  => $identifiant, 'logged_in' => TRUE);
			$this->session->set_userdata($newdata);
			redirect('/Affichage/interfaceFormulaires');
	}

	public function end_session() {
		session_unset();
		session_destroy();
		redirect('/Affichage/accueil');
	}

}

?>