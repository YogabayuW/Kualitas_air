<?php
class C_riwayat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['auth'])){
			redirect('admin/C_auth');
		}

		$this->load->model('admin/m_riwayat');
	}

    public function index()
	{
		$data['title'] = 'Data Riwayat Hasil';

		// Mengambil data hasil
		$data['riwayat'] = $this->m_riwayat->getHasil()->result();
		$data['user'] = $this->db->get_where('tb_admin', ['id_admin' => $_SESSION['id_admin']])->row_array();
		
		$this->load->view('admin/template_adm/v_header', $data);
		$this->load->view('admin/template_adm/v_navbar');
		$this->load->view('admin/template_adm/v_sidebar', $data);
		$this->load->view('admin/hasil/v_riwayat', $data);
		$this->load->view('admin/template_adm/v_footer');
	}
    

	public function hapus()
    {
        $id_sensor = $this->input->post('delete_id', TRUE);
		$where = array(
            'id_sensor' => $id_sensor
        );
		$this->m_riwayat->hapus($where, 'sensor');
		$this->session->set_flashdata('message', 'dataDelete');
		redirect('admin/C_riwayat');
    }

	public function clear()
    {
		$riwayat = $this->m_riwayat->getHasil()->result();
		foreach ($riwayat as $h){
			$id_sensor = $h->id_sensor;
			$where = array(
				'id_sensor' => $id_sensor
			);
			$this->m_riwayat->hapus($where, 'sensor');
		}
		
		$this->session->set_flashdata('message', 'dataDelete');
		redirect('admin/C_riwayat');
    }
}
