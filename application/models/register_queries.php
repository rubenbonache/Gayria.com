<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class register_queries extends CI_Model {


        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }
    }

    function esMail($item)
    {
    	$query = $this->db->get_where('usuarios', array('email' => $item));
    	return $query->result();
    }
    
    function register_user()
    {

        $usuario = array('id'=>'','user'=>'none','pass'=>md5($this->input->post('password1')),'fecha'=>time(),'status'=>'2','fotoperfil'=>0,'name'=>$this->input->post('nombre'),'apellido'=>$this->input->post('apellidos'),'fnacimiento'=>json_decode($this->input->post('fnacimiento')),'email'=>$this->input->post('email'),'soy'=>0,'orientacion'=>0,'pais'=>$this->input->post('pais'),'estado'=>$this->input->post('estado'),'idiomas'=>'','frasedia'=>'','look'=>0,'raza'=>0,'estatura'=>0,'peso'=>0,'complexion'=>0,'ojos'=>0,'pelo'=>0,'vello'=>0,'largopolla'=>0,'grosopolla'=>0,'circunci'=>0,'piercing'=>0,'tatus'=>0,'armario'=>0,'situacion'=>0,'actitud'=>0,'busco'=>0,'quebusco'=>'','tabaco'=>0,'alcohol'=>0,'drogas'=>0,'aficiones'=>'','fidelidad'=>0,'rol'=>0,'sexosegur'=>0,'tipochico'=>'','fetiches'=>'','psexuales'=>'');


        $this->db->insert('usuarios', $usuario);

    }

?>