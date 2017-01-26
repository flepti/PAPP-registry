<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry');
        $this->load->library('javascript');
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
