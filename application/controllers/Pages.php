<?php
 class Pages extends CI_Controller {
    public function __construct() {
       parent::__construct();
      $this->load->model('Super_admin');
    }
    public function materi() {
      $data['cards'] = $this->Super_admin->getdata('materi_islam');
      
      $this->load->view('pages/materi', $data);
    }
    public function about(){
      $this->load->view('pages/about');
    }
    public function baca() {
      $judul = $this->input->get('tittle');

      $this->db->select('materi_islam.*, surah.*'); // Memilih semua kolom dari tabel materi_islam dan surah
      $this->db->from('materi_islam');
      $this->db->join('surah', 'materi_islam.id_surah = surah.id_surah', 'left');
      $this->db->where('materi_islam.judul_materi', $judul);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
          $data['result'] = $query->result_array();
          $this->load->view('pages/baca', $data);
        } else {
          echo "Data tidak ada";
        }
      }
  }
?>
