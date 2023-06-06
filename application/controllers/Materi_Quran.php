<?php
 class Materi_Quran extends CI_Controller {
    

    public function index() {
      
      $data['article'] = $this->db->get('materi_quran')->result_array();
      
      $this->load->view('pages/materi', $data);
        
    }
  }
?>
