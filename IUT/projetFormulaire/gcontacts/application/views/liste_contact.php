<?php
$this->load->model('Model_contact');
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('form/inscription',array('method'=>'get','style'=>'text-align:right'));
echo form_submit('','S\'inscrire');
echo form_close();
$CI =& get_instance();
echo form_open('AuthController/connect_form',array('method'=>'get','style'=>'text-align:right'));
echo form_submit('','Se connecter');
echo form_close();
$CI =& get_instance();
echo form_open('AuthController/end_session',array('method'=>'get','style'=>'text-align:right'));
echo form_submit('','Se deconnecter');
echo form_close();
$CI =& get_instance();
$CI->load->library('table');

$CI->table->set_heading(array('identifiant', 'email', 'password',''));

$template = array(
	'table_open' => '<table class="membre">'
);

$CI->table->set_template($template);

/*foreach ($membre as $membre){
	$CI->table->add_row(
		$membre->identifiant,
		$membre->email,
		$membre->password,
		array(
			'data'=>anchor('contacts/delete/'.$membre->identifiant,
			'<i class="fa fa-times"></i>',
			array('class'=>'btn btn-danger'))." ".
			anchor('contacts/edit/'.$membre->identifiant,
				'<i class="fa fa-search"></i>',
				array('class'=>'btn btn-info')),
			'style'=>"text-align:right")
		);
}*/

//echo $CI->table->generate();
