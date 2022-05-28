<?php
    class M_monitoring extends CI_Model
    {
        public function getDataSensor()
        {
            $this->db->select('*');
            $this->db->from('sensor');
            $this->db->order_by('id_sensor', 'desc');
            $query = $this->db->get();
            // $query = $this->db->query("SELECT suhu FROM sensor ORDER BY id_sensor DESC");
            return $query->row();
        }

        public function bacaSensor()
        {
            $this->db->select('*');
            $this->db->from('sensor');
            $this->db->order_by('id_sensor', 'asc');
            $query = $this->db->get();
            // $query = $this->db->query("SELECT suhu FROM sensor ORDER BY id_sensor DESC");
            return $query;
        }

        public function UpdateData($DataUpdate)
        {
            $this->db->insert('sensor', $DataUpdate);  
        }
    }
?>