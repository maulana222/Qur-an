<?php
 class Pages extends CI_Controller {
    

    public function materi() {
      $this->load->model('Super_admin');
      $data['article'] = $this->Super_admin->get_data_with_join();
      
      $this->load->view('pages/materi', $data);
    }
    public function about(){
      $this->load->view('pages/about');
    }
  }
?>
