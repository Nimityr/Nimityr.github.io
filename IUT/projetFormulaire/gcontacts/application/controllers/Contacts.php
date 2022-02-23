<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function view($id = null){
		// COMPLETEZ
	}
	public function edit($id){
		// COMPLETEZ
	}
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_contact');

		$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[Membre.email]');

		// on peut vérifier l'unicité d'un champ dans la base
		// pas vraiment indépendant du modéle :-)
		// il vaut mieux rajouter une contrainte d'unicité dans la bd.

		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('ajouter_contact');
			$this->load->view('templates/footer');

		}else{

			$identifiant = $this->input->post('identifiant');
			$password = $this->input->post('password');
			$email = $this->input->post('email');

			$data=array(
				'identifiant'=>$requete = $this->db->get_where('Membre', array('identifiant' => $identifiant)),
				'password'=>$requete = $this->db->get_where('Membre', array('identifiant' => $identifiant)),
				'email'=>$requete = $this->db->get_where('Membre', array('identifiant' => $identifiant))
			);

			if	($this->model_contact->create_contact($data)){
				$this->load->view('templates/header');
				$this->load->view('ajouter_success', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function delete($id){
		$this->load->database();
		$this->load->model('model_contact');
		if ($this->model_contact->delete_contact($id)){
			$this->load->view('templates/header');
			$this->load->view('supprimer_success');
			$this->load->view('templates/footer');
		}
	}

	public function index(){
		$this->load->helpers('form');
		$this->load->model('model_contact');
		$this->load->library('table');

		$membre = $this->model_contact->get_contact();
		$data=array('membre' => $membre);
		$this->load->view('templates/header');
		$this->load->view('liste_contact', $data);
		$this->load->view('templates/footer');
	}
}
