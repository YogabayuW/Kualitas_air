<?php
    class M_riwayat extends CI_Model
    {
		public function getRiwayat()
        {
            $this->db->order_by("id_sensor", "desc");
            $query = $this->db->get('sensor');
            return $query;
        }

		// Hapus
		public function hapus($where, $table)
        {
            $this->db->delete($table, $where);
        }
    }
