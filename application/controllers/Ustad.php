<?php 
require_once 'Admin.php';

class Ustad extends Admin {
    public function __construct() {
        parent::__construct();
      
    }

    public function dashbord() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        } else {
            // Tampilkan halaman dashboard untuk Ustad
            $data['count'] = $this->db->count_all('materi_quran');
            $data['profile'] = $this->Super_admin->getdataAdmin();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_for_ustad', $data);
            $this->load->view('ustad/dashbord', $data);
        }
    }

    public function data_alquran() {
        if ($this->session->userdata('logged_in')) {
            // Tampilkan halaman data Alquran untuk Ustad
            $data['surah'] = $this->db->get('surah')->result_array();
            $this->load->view('ustad/data_alquran', $data);
        } else {
            redirect('auth');
        }
    }

   
}

?>