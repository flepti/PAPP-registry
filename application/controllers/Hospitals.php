<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hospitals extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry');
    }
    public function index()
    {
        redirect();
    }
    public function view($var)
    {
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('hospital_view.php');
        $this->load->view('footer');
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
