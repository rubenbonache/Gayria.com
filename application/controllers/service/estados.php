<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class estados extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'number', 'custom'));
			$this->load->database();
	}

	function index()
	{	

		
        $query = $this->db->query('SELECT * FROM estados WHERE relacion = "'.$this->input->post('id').'"');
        foreach ($query->result() as $value) {
          echo '<option value='.$value->id.'>'.$value->estado.'</option>';
        }
	}

	function id()
	{

	}
}