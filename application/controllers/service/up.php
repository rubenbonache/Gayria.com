<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class up extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'number', 'custom'));
			$this->load->database();
			date_default_timezone_set('GMT');
			
	}

	function index()
	{
		

	}

	function send()
	{
		

		$id_user = $this->uri->segment(4);
	    $result = array();
	    $result['time'] = date('r');
	    $result['addr'] = substr_replace(gethostbyaddr($_SERVER['REMOTE_ADDR']), '******', 0, 6);
	    $result['agent'] = $_SERVER['HTTP_USER_AGENT'];
	    if (count($_GET)) {
	    $result['get'] = $_GET;
	    }
	    if (count($_POST)) {
	    $result['post'] = $_POST;
	    }
	    if (count($_FILES)) {
	    $result['files'] = $_FILES;
	    }
	    // we kill an old file to keep the size small
	    if (file_exists('./upload/script.log') && filesize('script.log') > 102400) {
	    unlink('script.log');
	    }
	    $log = @fopen('./upload/script.log', 'a');
	    if ($log) {
	    fputs($log, print_r($result, true) . "\n---\n");
	    fclose($log);
	    }
	    // Validation
	    $error = false;
	    if (!isset($_FILES['Filedata']) || !is_uploaded_file($_FILES['Filedata']['tmp_name'])) {
	    $error = 'Invalid Upload';
	    }
	   	
	   	$file_upload  = time().'_'.md5($this->session->userdata('id')).'.jpg';
	    move_uploaded_file($_FILES['Filedata']['tmp_name'], './upload/' . $file_upload);
	    

	   	redim_imagen("./upload/".$file_upload, "./upload/thumb_".$file_upload, 240, 180, 1);
	    $query = array(
										'id' 		=> '',
										'author' 	=> $id_user,
										'fecha' 	=> time(),
										'path' 		=> $file_upload,
										'thumb'		=> 'thumb_'.$file_upload,
										'active'	=> '0'
										);
						$this->db->insert('galeria', $query); 
						activity_add($this->session->userdata('id'), '3');

	    $return['src'] = './upload/' . $_FILES['Filedata']['name'];
	    if ($error){
	    $return = array(
	    'status' => '0',
	    'error' => $error
	    );
	    }else{
	    $return = array(
	    'status' => '1',
	    'name' => $_FILES['Filedata']['name']
	    );
	    // Our processing, we get a hash value from the file
	    $return['hash'] = md5_file($_FILES['Filedata']['tmp_name']);
	    // ... and if available, we get image data
	    $info = @getimagesize($_FILES['Filedata']['tmp_name']);
	    if ($info) {
	    $return['width'] = $info[0];
	    $return['height'] = $info[1];
	    $return['mime'] = $info['mime'];
	    }
	    }
	    // Output
	    if (isset($_REQUEST['response']) && $_REQUEST['response'] == 'xml') {
	    // header('Content-type: text/xml');
	    // Really dirty, use DOM and CDATA section!
	   	
	    echo '<response>';
	    foreach ($return as $key => $value) {
	    echo "<$key><![CDATA[$value]]></$key>";
	    }
	    echo '</response>';
	    } else {
	    // header('Content-type: application/json');
	    echo json_encode($return);
	    }

	}
}
?>