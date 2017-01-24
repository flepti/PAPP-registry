<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
        {
                parent::__construct();
                $this->load->model('registry');
        }
	public function index()
	{

		//$this->registry();
		//$this->load->view('welcome_message');

		//$zecho =$this->registry->dump();
		//var_dump($zecho);

		$icd = "A002";
		$desc = "This is an entry 2 update";

		$data = array(
			'icd' => $icd,
			'description' => $desc
			);

		$updateData = array(
			'id' => '2',
			'icd' => $icd,
			'description' => $desc
			);

		// $insert = $this->registry->insert('registry', $data);
		// //var_dump($insert); exit;
		// if ($insert) {
		// 	echo "INSERTS SUCCESSFUL!";
		// }else{
		// 	echo "FAILED!";
		// }

		$update = $this->registry->update('registry', $updateData);
		if ($update) {
			echo "SUCCESSFUL!";
		}else{
			echo "FAILED!";
		}

	}
}
