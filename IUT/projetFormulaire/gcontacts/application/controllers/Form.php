<?php

class Form extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->database();
                $this->load->model('Form_model');
                $this->load->library('form_validation');

        }

        public function recuperer_formulaire(){
                $clef = $this->input->post('cle');
                $nbr_form = $this->Form_model->check_existing_form($clef);
                if(!$nbr_form){
                        redirect('Affichage/accueil');
                }else{
                        $questions = $this->Form_model->get_values($clef);
                        redirect('Affichage/afficher_form', $questions);
                }
        }

        public function creer_formulaire(){
            $quest = $this->input->post('questions[]');
            $titre = $this->input->post('titre');
            $desc = $this->input->post('description');
            $clef = $this->create_clef();

            $data = array(
                'clef' => $clef,
                'createur' => $this->session->identifiant,
                'description' => $desc,
                'titre' => $titre
            );

            $id_form = $this->Form_model->insert_new_formulaire($data);
            $nb_q = 0;
            foreach ($quest as $row) {
                $titreQ = $row['titre'];
                $aideQ = $row['aide'];
                $type = $row['type'];
                $typeQ = '';
                if($type === "Champ de texte"){
                        $typeQ = "textField";
                }else if($type === "Zone de texte"){
                        $typeQ = "textArea";
                }else if($type === "Choix multiples"){
                        $typeQ == "radioButton";
                }else if($type === "Cases à cocher"){
                        $typeQ = "boxButton";
                }else if($type === "Liste déroulante"){
                        $typeQ = "list";
                }
                $data_q = array(
                        'idForm' => $id_form,
                        'titre' => $titreQ,
                        'type' => $type,
                        'help' => $aideQ
                );

                $id_q = $this->Form_model->insert_new_question($data_q);
                
                $reponses = $this->input->post("questions[$nb_q][choix][]");
                // echo var_dump($reponses);
                foreach($reponses as $row){
                        echo var_dump($row);
                        if($type == "Choix multiples" || $type == "Cases à cocher" || $type == "Liste déroulante"){
                                $data_rep = array(
                                        'id_q' => $id_q,
                                        'reponse' => $row
                                );
                                
                                $this->Form_model->insert_new_answer($data_rep);
                        }
                }
                $nb_q++;
            }
            redirect('Affichage/menu_gestion_formulaire');
        }

        public function connexion(){
            $this->load->helper(array('form', 'url'));
            $this->load->database();
            $this->load->library('session');

            $this->load->library('form_validation');

            $this->load->view('templates/header');
            $this->load->view('connexion_user');
            $this->load->view('templates/footer');

            $this->form_validation->set_rules('identifiant', 'identifiant',
                    'trim|required|encode_php_tags|callback_identifiant_auth_check', 
                    array('required' => 'You must provide a %s', 'is_unique' => 'Your identifiant is already used'));

            $this->form_validation->set_rules('password', 'password', 
                    'trim|required|callback_password_auth_check',
                    array('required' => 'You must provide a %s'));

            $this->form_validation->set_message('password_auth_check', 'Password doesn\'t match the database');
            $this->form_validation->set_message('identifiant_auth_check', 'This identifiant doesn\'t exist');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if (!$this->form_validation->run())
            {
                    redirect('Affichage/connect');
            }else{
                    
                    $identifiant = $this->input->post('identifiant');
                    $password = $this->input->post('password');

                    $this->session->set_userdata(array('identifiant' => $identifiant, 'password' => $password));
                    redirect('Affichage/accueil');
            }
        }

        public function inscription(){
            $this->load->helper(array('form', 'url'));
            $this->load->database();
            $this->load->library('form_validation');
 

            $this->form_validation->set_rules('identifiant', 'identifiant',
                    'trim|required|alpha_dash|encode_php_tags|is_unique[Membre.identifiant]|callback_identifiant_check', 
                    array('required' => 'You must provide a %s', 'is_unique' => 'Your identifiant is already used'));


            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
            array('required' => 'You must provide a %s'));
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

            $this->form_validation->set_message('min_length', '{field} must have at least {param} characters.');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $identifiant = $this->input->post('identifiant');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            $data=array(
                    'identifiant'=>$requete = $this->db->get_where('Membre', array('identifiant' => $identifiant)),
                    'password'=>$requete = $this->db->get_where('Membre', array('password' => $password)),
                    'email'=>$requete = $this->db->get_where('Membre', array('email' => $email))
            );

            if (!$this->form_validation->run())
            {
                    $this->load->view('templates/header');
                    $this->load->view('ajouter_contact');
                    $this->load->view('templates/footer');
            }
            else
            {       

                    $identifiant = $_POST['identifiant'];
                    $password = password_hash($_POST['password'], 1);
                    $email = $_POST['email'];

                    $data = array('identifiant'=>$identifiant,'email'=>$email,'password'=>$password);
                    $this->db->insert('Membre', $data);

                    $this->load->model('model_contact');
                    $membre = $this->model_contact->get_contact();
                    $data=array('membre' => $membre);
                    redirect('Affichage/accueil');
            }
        }

        public function identifiant_check($str)
        {       
            $req = $this->db->query("SELECT * FROM Membre WHERE identifiant = '$str'");
            $num_row_q = $req->num_rows();
            if($num_row_q > 0){
                    $this->form_validation->set_message('identifiant_check', 'This identifiant is already used');
                    return FALSE;
            }
            else 
            {
                return TRUE;
            }
        }

        public function identifiant_auth_check($str)
        {       
            $req = $this->db->query("SELECT * FROM Membre WHERE identifiant = '$str'");
            $num_row_q = $req->num_rows();
            if($num_row_q === 1){
                    $identifiant = $str;
                    return TRUE;
            }
            else 
            {
                return FALSE;
            }
        }

        public function password_auth_check($str){
            $identifiant = set_value('identifiant');
            if($identifiant === NULL){
                    $this->form_validation->set_message('identifiant_check', 'Please enter a identifiant');
                    return FALSE;
            }else{
                    $req = $this->db->query("SELECT password FROM Membre WHERE identifiant='$identifiant'");
                //     $passwd;
                    foreach($req->result_array() as $row){
                        foreach($row as $roww){
                            $passwd = $roww;
                        }
                    }
                    if(password_verify($str,$passwd)){
                            return TRUE;
                    }else {
                            return FALSE;
                    }
            }
        }
        public function create_clef(){
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $longueurMax = strlen($char);
            $cle = '';
            for ($i = 0; $i < 20; $i++){
                $cle .= $char[rand(0, $longueurMax - 1)];
            }
            return $cle;
        }
}