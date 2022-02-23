<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_contact extends CI_Model {
	public function __construct(){
	$this->load->database();
	}
	public function set_contact($contact){
		$id = $contact['identifiant'];
		$data = array(
		//	'id'=>$id,
			'identifiant' => $contact['identifiant'],
			'email' => $contact['email'],
			'password' => $contact['password']
		);

		$this->db->where('id', $identifiant);
		return $this->db->update('Membre', $data);
		//return $this->db->replace('Membre',$data);

	}
public function get_contact_page($page,$total){
			$this->db->select('*')
				->from('Membre')
				->limit($total,$total*($page-1));
			$query = $this->db->get();
			return $query->result();
	}

	public function get_contact($id=null){
		if (isset($id)){
			$this->db->select('*')
				->from('Membre')
				->where('identifiant', $id)
				->limit(1);
			$query = $this->db->get();

			if($query->num_rows() == 1)
				return $query->row();
			else
				return false;
		}else{
			$this->db->select('*')
				->from('Membre');
			$query = $this->db->get();
			return $query->result();
		}
	}
	public function create_contact($data){
		return	$this->db->insert('Membre', $data);	

	}
	public function delete_contact($id){
		return $this->db
			->where('identifiant',$id)
			->delete("Membre");

	}
	public function check_password($password){
	$this->db->select('password')
		->from('Membre')
		->where('password',$password);
	$query = $this->db->get();
	return ($query->num_rows() <= 1); 

	}
}
