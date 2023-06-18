<?php
  class Quran extends CI_Controller {
    public function index() {
      
        $data['surah'] = $this->Quran_model->get_data('surah');
        
        $this->load->view('al-quran', $data);
    }
    public function Surah($id){
    
       $this->load->library('Library_data_ayat');
       $quranData = $this->library_data_ayat->showAyat($id);

       if (array_key_exists($id, $quranData)) {

         $data['quran'] = $this->db->get('quran_id', $quranData[$id]['jumlahAyat'], $quranData[$id]['offset'])->result_array();
         $data['audio'] = $this->db->get_where('murottal', ['id_surah' => $id] )->result_array();
        $data['surah'] = $this->db->get_where('surah', ['arti_surah'], 1, $quranData[$id]['surahOffset'])->result_array();
        $data['bismillah'] = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
        $data['title'] = $quranData[$id]['title'];
        
        $this->load->view('Al-Quran/quran', $data);
    }
  }
    public function search() {  
      //ambil data dari keybord

			    $data['keywords'] = $this->input->post('keyword');
          
          $data['result'] = $this->Quran_model->searchKeywords($data['keywords']);

          $this->load->view('Al-Quran/search', $data);
  }
 
  public function tafsir($no){
      
     $data['tafsir'] = $this->Quran_model->get_Tafsir($no);

     $this->load->view('Al-Quran/tafsir', $data);
  }
}
?>  