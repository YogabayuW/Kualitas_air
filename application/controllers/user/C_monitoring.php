<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/m_monitoring');
    }

    public function index()
    {
        $data['title'] = 'Monitoring Kualitas Air';

        // Ambil data dari tb_hasil
        // $x['datasuhu'] = $this->db->query("SELECT suhu FROM sensor ORDER BY id_sensor DESC")->row();
        $record = $this->db->query("SELECT * FROM sensor ORDER BY id_sensor ASC")->result();
        if (count($record) > 0) {
            foreach ($record as $k) {
                $suhu[] = $k->suhu;
                $tanggal[] = $k->tanggal;
            }
        } else {
            $suhu[] = "-";
            $tanggal[] = "-";
        }

        $data['suhu'] = json_encode($suhu);
        $data['date'] = json_encode($tanggal);

        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_navbar');
        $this->load->view('user/v_sidebar');
        $this->load->view('user/v_monitoring');
        $this->load->view('user/v_footer');
    }

    public function bacasuhu()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $get = $this->db->query("SELECT MAX(id_sensor) FROM sensor")->row_array();
        $satuan = 4;
        $id_akhir = $get['MAX(id_sensor)'];
        $id_awal = $id_akhir - $satuan;
        $suhu = $this->db->query("SELECT suhu FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");
        $tanggal = $this->db->query("SELECT tanggal FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");

        if ($suhu->num_rows() > 0) {
            foreach ($suhu->result_array() as $k) {
                $der[] = $k['suhu'];
            }
        } else {
            $der[] = 0;
        }

        if ($tanggal->num_rows() > 0) {
            foreach ($tanggal->result_array() as $w) {
                $tang[] = $w['tanggal'];
            }
        } else {
            $tang[] = 0;
        }

        $data['derajat'] = $der;
        $data['date'] = $tang;
        $this->load->view('user/chart_suhu', $data);
    }

    public function bacasalinitas()
    {
        // $data['title'] = 'Hitung Kualitas Air';
        $get = $this->db->query("SELECT MAX(id_sensor) FROM sensor")->row_array();
        $satuan = 4;
        $id_akhir = $get['MAX(id_sensor)'];
        $id_awal = $id_akhir - $satuan;
        $salinitas = $this->db->query("SELECT salinitas FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");
        $tanggal = $this->db->query("SELECT tanggal FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");

        if ($salinitas->num_rows() > 0) {
            foreach ($salinitas->result_array() as $k) {
                $der[] = $k['salinitas'];
            }
        } else {
            $der[] = 0;
        }
        if ($tanggal->num_rows() > 0) {
            foreach ($tanggal->result_array() as $w) {
                $tang[] = $w['tanggal'];
            }
        } else {
            $tang[] = 0;
        }

        $data['derajat'] = $der;
        $data['date'] = $tang;
        $this->load->view('user/chart_salinitas', $data);
    }
    public function bacaph()
    {
        // $data['title'] = 'Hitung Kualitas Air';
        $get = $this->db->query("SELECT MAX(id_sensor) FROM sensor")->row_array();
        $satuan = 4;
        $id_akhir = $get['MAX(id_sensor)'];
        $id_awal = $id_akhir - $satuan;
        $ph = $this->db->query("SELECT ph FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");
        $tanggal = $this->db->query("SELECT tanggal FROM sensor WHERE id_sensor>='$id_awal' AND id_sensor<='$id_akhir' ORDER BY id_sensor ASC");

        if ($ph->num_rows() > 0) {
            foreach ($ph->result_array() as $k) {
                $der[] = $k['ph'];
            }
        } else {
            $der[] = 0;
        }

        if ($tanggal->num_rows() > 0) {
            foreach ($tanggal->result_array() as $w) {
                $tang[] = $w['tanggal'];
            }
        } else {
            $tang[] = 0;
        }

        $data['derajat'] = $der;
        $data['date'] = $tang;
        $this->load->view('user/chart_ph', $data);
    }

    public function ceksuhu()
    {
        $data['title'] = 'Hitung Kualitas Air';
        // $recordSensor = $this->db->query("SELECT suhu FROM sensor ORDER BY id_sensor DESC")->row();
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == NULL) {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }


        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_ceksuhu', $data);
        // $this->load->view('user/v_footer');
    }

    public function ceksalinitas()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == null || $recordSensor == "") {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }

        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_ceksalinitas', $data);
        // $this->load->view('user/v_footer');
    }

    public function cekph()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == null || $recordSensor == "") {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }


        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_cekph', $data);
        // $this->load->view('user/v_footer');
    }

    public function fuzzyset()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == null || $recordSensor == "") {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }


        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_fuzzyset', $data);
    }

    public function grade()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == null || $recordSensor == "") {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }


        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_grade', $data);
    }
    public function hasil()
    {
        $data['title'] = 'Hitung Kualitas Air';
        $recordSensor = $this->m_monitoring->getDataSensor();
        if ($recordSensor == null || $recordSensor == "") {
            $data = array('data_sensor' => "-");
        } else {
            $data = array('data_sensor' => $recordSensor);
        }


        //Kirim ke tampilan ceksuhu
        // $this->load->view('user/v_header', $data);
        // $this->load->view('user/v_navbar');
        // $this->load->view('user/v_sidebar');
        $this->load->view('user/v_cekhasil', $data);
    }

    public function kirimdata()
    {
        //baca nilai suhu, salinitas, ph di segment 5,6,7
        $suhu = $this->uri->segment(4);
        $salinitas = $this->uri->segment(5);
        $ph = $this->uri->segment(6);
        $fuzzyset = $this->uri->segment(7);
        $hasil = $this->uri->segment(8);
        $grade = $this->uri->segment(9);

        //update ke tabel sensor
        $DataUpdate = array(
            'suhu' => $suhu,
            'salinitas' => $salinitas,
            'ph' => $ph,
            'fuzzy_set' => $fuzzyset,
            'hasil' => $hasil,
            'grade' => $grade,
        );

        //update data
        $this->m_monitoring->UpdateData($DataUpdate);
    }
}
