<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry');
        $this->load->helper(array('form', 'url'));

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
        //goto read;

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $filePath                = "";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            var_dump($error);exit;
        } else {
            $data     = array('upload_data' => $this->upload->data());
            $filePath = $data['upload_data']['full_path'];
        }

        read:
        //$filePath = "../../uploads/";
        //var_dump($this->input->post());
        $this->load->helper('php-excel-reader/excel_reader2');
        $this->load->helper('SpreadsheetReader');

        $uploadData  = array();
        $Spreadsheet = new SpreadsheetReader($filePath);
        $Sheets      = $Spreadsheet->Sheets();
        $letter      = range('A', 'Z');
        foreach ($Sheets as $Index => $Name) {
            $currentHospital = $Name;
            $currentCategory = "";
            $currentSubCat   = "";
            $Spreadsheet->ChangeSheet($Index);
            $i                    = 1;
            $currentSubCatIndexer = 0;
            $dumpBeginFlag        = false;
            $subcatDumpdata       = array();

            foreach ($Spreadsheet as $Key => $Row) {
                if (preg_match("/total/i", trim($Row[2]))) {
                    $dumpBeginFlag = false;
                }
                if ($dumpBeginFlag) {
                    goto dump;
                }
                //echo $i . " *** ";
                //print_r($Row);
                //echo "<hr>";
                $d = trim($Row[0]);
                if ($d == 'Name of Institution:') {
                    $currentHospital = $Row[1];
                }

                if (trim($Row[2]) != "" && trim($Row[0]) == "" && trim($Row[1]) == "" && trim($Row[3]) == "") {
                    $index2Content = trim($Row[2]);
                    if (substr($index2Content, 0, 2) == "$letter[$currentSubCatIndexer].") {
                        $currentSubCat = $index2Content;
                        $currentSubCatIndexer++;
                    } else
                    if (!preg_match("/total cases/i", $Row[2])) {
                        //THIS THE MAIN CATEGORY
                        $currentCategory = trim($Row[2]);
                        //CLEAR SUBCAT
                        $currentSubCat = "";

                    }

                }

                //THE DATA STREAM BLOCK
                if (preg_match("/patient/i", trim($Row[2]))) {
                    //echo "headers detect $Row[2]"; exit;
                    $dumpBeginFlag = true; //echo "DUM BEGIN ***<br>Hospital: $currentHospital<br> Categ: $currentCategory<br>Sub: $currentSubCat<br><br>";
                    $i++;
                    continue;
                } else {
                    $i++;
                }

                continue;

                dump:
                $j       = 0;
                $dataSet = array();
                while ($j <= sizeof($Row)) {
                    if (trim(@$Row[$j]) != "") {
                        //BUILD THE DATASET
                        array_push($dataSet, trim($Row[$j]));
                    }if (trim(@$Row[$j]) == "" && (sizeof($dataSet) > 1)) {
                        array_push($dataSet, '');
                    }
                    $j++;
                }
                if (sizeof($dataSet) > 2) {
                    //echo "$i **";
                    array_push($dataSet, $currentHospital);
                    array_push($dataSet, $currentCategory);
                    array_push($dataSet, $currentSubCat);
                    //var_dump($dataSet); echo "<hr>";
                    array_push($subcatDumpdata, $dataSet);
                    array_push($uploadData, $dataSet);
                }

                //echo sizeof($Row); echo "<br>";
                if ($i == 10) {
                    //exit;
                }
                $i++;
            }
        }

        $size =  sizeof($uploadData); //exit;
        foreach ($uploadData as $patientData) {
            //var_dump($patientData);exit;
            $data = array(
                'patientName' => @$patientData[0],
                'age'         => @$patientData[1],
                'gender'      => @$patientData[2],
                'dateOfBirth' => @$patientData[3],
                'icd'         => @$patientData[5],
                'diagnosis'   => @$patientData[4],
                'hospital'    => @$patientData[9],
                'month'       => @$patientData[6],
                'year'        => @$patientData[7],
                'category'    => @$patientData[10],
                'subcategory' => @$patientData[11],
            );
            $doInsert = $this->registry->insert('registry', $data);
            $link = site_url();
            if ($doInsert) {
                echo '
                    <script>
                    alert("SUCCESS\n'.$size.' records has been added.");
                    window.location.href= "'.$link.'";
                    </script>
                ';
            } else {
                echo "FAILED!";
            }
        }

    }

    public function createDataTable($definitions = null, $data = null, $filter = null)
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
