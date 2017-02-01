<?php
class Registry extends CI_Model
{

    public function dump($args = null)
    {
        $query = $this->db->query("SELECT * FROM registry $args");
        $data  = $query->result_array();
        return $data;
    }

    public function filterByH($hospital = null, $args = null)
    {
        if ($args != null) {
            $args = "AND icd like '$args' OR diagnosis like '%$args%' OR category like '%$args%' OR subcategory like '%$args%' OR age like '%$args%' OR patientName like '%$args%'";
        }
        $query = $this->db->query("SELECT * FROM registry WHERE hospital like '%$hospital%' $args");
        $data  = $query->result_array();
        return $data;
    }

    public function insert($table = "registry", $data = null)
    {
        $insert = $this->db->insert($table, $data);
        if ($insert) {
            return true;
        }return false;

    }

    public function update($table = "registry", $data = null)
    {
        $update = $this->db->replace($table, $data);
        if ($update) {
            return true; 
        }return false;
    }
    public function search($keyword = null, $args = null)
    {
        $query = $this->db->query("SELECT icd, category, subcategory, diagnosis, patientName, dateOfBirth, hospital FROM registry WHERE icd like '%$keyword%' OR diagnosis like '%$keyword%' OR category like '%$keyword%' OR subcategory like '%$keyword%' $args");
        $data  = $query->result_array();
        return $data;
    }
    public function dumpHospitalData($hospital)
    {
        $query = $this->db->query("SELECT * FROM registry WHERE hospital like '%$hospital%' ORDER BY category, subcategory");
        $data  = $query->result_array();
        return $data;
    }

}
