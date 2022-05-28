<?php

class M_berandaU extends CI_Model
{
    public function get_beranda()
    {
        // $sql = $this->db->get('sensor');
    }

    public function get_rule()
    {
       return $this->db->get('tb_rule');
    }

    public function get_suhu()
    {
       return $this->db->get('tb_suhu');
    }

    public function get_ph()
    {
        return $this->db->get('tb_ph');
    }

    public function get_tds()
    {
        return $this->db->get('tb_tds');
    }
}

?>