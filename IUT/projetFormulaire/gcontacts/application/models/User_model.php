<?php

class User_model extends CI_Model{

    public function insert_new_user($identifiant,$password,$email){
        $this->load->database();

        $test = $this->db->query("SELECT identifiant FROM Membre WHERE identifiant='".$identifiant."';");
        if ($test->num_rows() == 0) {
          $query = $this->db->query("Insert into Membre values ('".$identifiant."','".$password."','".$email."');");
          return $query;
        } else {
          return 10;
        }
    }

    public function check_connection($identifiant){
        $this->load->database();
        $query = $this->db->query("SELECT password FROM User WHERE identifiant='".$identifiant."';");
        if ($query->num_rows() > 0) {
          $row = $query->row();
          return $row->password;
        } else {
          return 10;
        }
    }

  public function start_session($identifiant){
      $this->load->database();
      $query = $this->db->query("SELECT prenom FROM User WHERE identifiant='".$identifiant."';");
      $row = $query->row();
      return $row->prenom;
    }
}
?>
