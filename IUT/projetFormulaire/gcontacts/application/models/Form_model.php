<?php

class Form_model extends CI_Model{

    public function Formulaire_name($identifiant){
      $this->load->database();
      $query = $this->db->query("SELECT titre, clef FROM Formulaire WHERE createur='".$identifiant."';");
      return $query->result();
    }

    public function check_existing_form($clef){
      $query = $this->db->select('*')->from('Formulaire')->where('clef', $clef);
      return $query;
    }

    public function get_form($clef){
      $query = $this->db->query("SELECT active,id,titre,description,clef FROM Formulaire WHERE clef='$clef'");
      return $query->result();
    }

    public function get_questions($id_form){
      $query = $this->db->query("SELECT idQ, titre, type, help FROM Question WHERE idForm='$id_form'");
      return $query->result();
    }

    public function get_answers($id_q){
      $this->load->database();
      $query = $this->db->query("SELECT reponse FROM ReponsesPossibles WHERE id_q='$id_q'");
      return $query->result();
    }

    public function get_reponse_libelle($id_r){
      $query = $this->db->query("SELECT reponse FROM ReponsesPossibles WHERE idR='$id_r'");
      return $query->result();
    }

    public function get_answers_with_id($id_q){
      $this->load->database();
      $query = $this->db->query("SELECT idR,reponse FROM ReponsesPossibles WHERE id_q='$id_q'");
      return $query->result();
    }

    public function get_nb_answers_q($id_q){
      $query = $this->db->query("SELECT * FROM ReponsesUtilisateur WHERE id_quest=$id_q");
      return $query->result();
    }

    public function get_nb_answers_r($id_r){
      $query = $this->db->query("SELECT * FROM ReponsesUtilisateur WHERE id_rep_user=$id_r");
      return $query->result();
    }

    public function get_nb_answers_r_distinct($id_r){
      $query = $this->db->query("SELECT DISTINCT id_rep_user FROM ReponsesUtilisateur WHERE id_rep_user=$id_r");
      return $query->result();
    }

    // public function get_values($clef){
    //   if($clef == NULL){
    //     redirect('Affichage/accueil');
    //   }
    //   $query = $this->db->query( "SELECT id,active,description,titre FROM Formulaire WHERE clef='$clef'" );
    //   $result = $query->result();
    //   foreach($result as $row){
    //     if($row->active != 1){
    //       redirect('Affichage/accueil');
    //     }else{
    //       $titre_form = $row->titre;
    //       $descri_form = $row->description;
    //       $quest_query = $this->db->query("SELECT * FROM Question WHERE idForm='$row->id'");
    //       $question = array('question' => array());

    //       foreach($quest_query->result() as $quest_rows){
    //         $ligne_Q = array(
    //           'titre' => $quest_rows->titre,
    //           'type' => $quest_rows->type,
    //           'help' => $quest_rows->help,
    //           'reponse' => array()
    //         );

    //         if($ligne_Q['type'] == "Choix multiples" || $ligne_Q['type'] == "Cases à cocher" || $ligne_Q['type'] == "Liste déroulante"){
    //           $query_rep = $this->db->query("SELECT * FROM ReponsesPossibles WHERE id_q='$quest_rows->idQ'");
    //           $reponses = array();

    //           foreach($query_rep->result() as $row_reps){
    //             $ligne_rep = array(
    //               'reponse' => $row_reps->reponse
    //             );
    //             array_push( $reponses , $ligne_rep);
    //           }
    //           array_push ($ligne_Q['reponse'], $reponses);
    //         }
            
    //         array_push($question, $ligne_Q);

    //         if($ligne_Q['type'] == "Choix multiples" || $ligne_Q['type'] == "Cases à cocher" || $ligne_Q['type'] == "Liste déroulante"){
    //           array_push($ligne_Q['reponse'], $reponses);
    //         }
            
    //       }
    //     }
    //     return $question;
    //   }
    // }

    public function desactivation($clef){
      $id = $this->session->identifiant;
      $query = $this->db->query("SELECT active FROM Formulaire WHERE (createur='$id' AND clef='$clef');");
      $result = $query->result();

      foreach ($result as $value) {
        echo $value->active;
        if($value->active == 0){
          $active = 1;
        }else{
          $active = 0;
        }
        $this->db->query("UPDATE Formulaire SET active='$active' WHERE clef='$clef'");
      }
    }

    public function insert_new_formulaire($data){
      $this->load->database();
      $query = $this->db->insert('Formulaire',$data);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }

    public function insert_answer_user($data /*= array('id' => 'default_id', 'id_quest' => 'default_id_quest')*/){
      $truc = $data['id'];
      $machin = $data['id_quest'];
      $query = $this->db->query("SELECT idR FROM ReponsesPossibles WHERE reponse='$truc' AND id_q=$machin");
      $result = $query->result();
      foreach($result as $row){
        $reponses_envoyees = array(
          'id_rep_user' => $row->idR,
          'id_quest' => $machin
        );
        $this->db->insert('ReponsesUtilisateur', $reponses_envoyees);
      }
      // redirect('Affichage/menu_gestion_formulaire');
    }

    public function insert_new_question($data){
      $this->load->database();
      $this->db->insert('Question',$data);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }

    public function insert_new_answer($data){
      $this->load->database();
      $this->db->insert('ReponsesPossibles',$data);
    }

    public function detail_formulaire($clef) {
      $this->load->database();
      $query = $this->db->query("SELECT titre, lieu, descri FROM Formulaire WHERE clef='".$clef."';");
      return $query->result();
    }

    public function check_owner($clef){
      $this->load->database();
      $query = $this->db->query("SELECT login FROM Formulaire WHERE clef='".$clef."';");
      $row = $query->row();
      return $row->login;
    }

    public function delete_formulaire($clef){
      $this->load->database();
      $id = $this->session->identifiant;
      $query = $this->db->query("DELETE FROM Formulaire WHERE clef='$clef' AND createur='$id';");
    }

    public function afficher_formulaire_user(){
      $this->load->database();
      $login = $this->session->identifiant;

      $query = $this->db->select( 'id,clef,active,description,titre' )
               ->from( 'Formulaire' )
               ->where( 'createur', $login )
               ->get();   

      return $query->result();
    }

    public function afficher_questions_form($id_form){
      $this->load->database();
      $query = $this->db->query("SELECT * FROM Question WHERE idForm='$id_form';");

      return $query->result();
    }

    public function afficher_reponses_form($id_quest){
      $this->load->database();
      $query = $this->db->query("SELECT * FROM ReponsesPossibles WHERE idQ='$id_quest';");

      return $query->result();
    }

    
}
?>
