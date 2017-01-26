<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry');
    }
    public function index()
    {
        $define = array(
            'icd'         => 'ICD',
            'description' => 'Description',
            'ret'         => 'Time',
        );
        echo $this->createDataTable($define, "WHERE icd like '%0%'");

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

    public function createDataTable($definitions = null, $filter = null)
    {
        $data = $this->registry->dump(@$filter);
        $temp = "<table border = '1'>";
        $temp .= "<tr>";
        foreach ($definitions as $key => $value) {
            $temp .= "<td>$value</td>";
        }
        $temp .= "</tr>";
        foreach ($data as $record => $indivRecord) {
            $temp .= "<tr>";
            foreach ($indivRecord as $key => $value) {
                if (isset($definitions[$key])) {
                    $temp .= "<td>$value</td>";
                }
            }
            $temp .= "</tr>";
        }

        $temp .= "</table>";
        return $temp;
    }
}
