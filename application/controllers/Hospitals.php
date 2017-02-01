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
        $keyword = $var;
        switch ($keyword) {
            case 'makatimed':   
                $keyword = 'makati';
                break;
            case 'chonghua':
                $keyword = 'chong';
                break;
            case 'pcmc':
                $keyword = 'pcmc';
                break;
            case 'phc':
                $keyword = 'phc';
                break;
            case 'pgh':
                $keyword = 'pgh';
                break;
            case 'stlukes':
                $keyword = 'luke';
                break;
            case 'usth':
                $keyword = 'ust';
                break;
            case 'others':
                $keyword = 'others';
                break;
            
            default:
                # code...
                break;
        }
        $resultData = $this->registry->dumpHospitalData($keyword);
        $data = array(
            'dumpData' => $resultData,
            'hName'=> $keyword,
            'matches'=>sizeof($resultData)
            );
        $this->load->view('hospital_view.php', $data);
        $this->load->view('footer');
    }
    public function filter()
    {
        $this->load->view('header');
        $this->load->view('nav');
        $hName = $this->input->post('hName');
        $keyword = $this->input->post('hSearch');
        $resultData = $this->registry->filterByH($hName, $keyword);
        $data = array(
            'dumpData' => $resultData,
            'hName' => $hName,
            'matches' => sizeof($resultData)
            );
        $this->load->view('hospital_view.php', $data);
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
