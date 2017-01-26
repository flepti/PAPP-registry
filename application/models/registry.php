<?php
class Registry extends CI_Model
{

    public function dump($args = null)
    {
        $query = $this->db->query("SELECT * FROM registry $args");
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

}
