<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class queries extends CI_Model {

        var $user   = '';
        var $pass   = '';

        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }
        
        function login_query()
        {
            $query = $this->db->get_where('usuarios', array('email' => $_POST['email'], 'pass' => md5($_POST['pass'])));
            return $query->result();
        }

        function gallery_list()
        {
            $query = $this->db->get_where('galeria');
            return $query->result();
        }

        function get_user($item)
        {
            $query = $this->db->get_where('usuarios', array('id' => $item));
            return $query;
        }

        function insert_entry()
        {
            $this->title   = $_POST['title']; // please read the below note
            $this->content = $_POST['content'];
            $this->date    = time();

            $this->db->insert('entries', $this);
        }

        function update_entry()
        {
            $this->title   = $_POST['title'];
            $this->content = $_POST['content'];
            $this->date    = time();

            $this->db->update('entries', $this, array('id' => $_POST['id']));
        }
        
    }
?>