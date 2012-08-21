<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class delete_queries extends CI_Model {


        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }
        
        function remove_image($item)
		{
			$query = mysql_query("SELECT * FROM galeria WHERE id = '".$item."'");
			while ($row = mysql_fetch_array($query))
			 {
				@unlink('./upload/'.$row["path"]);
				@unlink('./upload/'.$row["thumb"]); 
				mysql_query('DELETE FROM galeria WHERE id = "'.$item.'"');

				$error = array('delete' => $this->lang->line('img_delete'));
				$this->session->set_userdata($error);
				redirect('perfil/me/galeria');
			}
		}

		function remove_msg()
		{
			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('mensajeria');

			$error = array('delete' => $this->lang->line('msg_delete'));
			$this->session->set_userdata($error);
			redirect('perfil/me/mensajeria');
		}
}