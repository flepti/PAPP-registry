<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry');
        $this->load->library('javascript');
        $this->load->helper('form');
        $this->load->model('registry');
    }
    public function index()
    {

        //$this->registry();
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('welcome_message');
        $this->load->view('footer');

        //$zecho =$this->registry->dump();
        //var_dump($zecho);
    }
    
    public function search()
    {
    	if (!isset(($this->input->post())['registrySearch'])) {
    		redirect();
    	}
        $keyword    = ($this->input->post())['registrySearch'];
        $resultData = $this->registry->search($keyword);
        $match = sizeof($resultData);
        $data       = array(
        	"match" => $match,
            "search_result" => $resultData,
        );
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('search_result', $data);
    }

    public function insert()
    {
        $icd  = "B001";
        $desc = "B zero one";
        $data = array(
            'icd'         => $icd,
            'description' => $desc,
        );
        $doInsert = $this->registry->insert('registry', $data);
        if ($doInsert) {
            echo "SUCCESS!";
        } else {
            echo "FAILED!";
        }
    }
}
