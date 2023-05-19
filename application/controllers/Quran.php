<?php
  class Quran extends CI_Controller {

    public function index() {
      
        $data['surah'] = $this->Quran_model->get_data();
        
        $this->load->view('al-quran', $data);
    }
    public function Surah($id){

    $data['detail'] = $this->Quran_model->getAyat($id);

    $quranData = [
        1 => ['jumlahAyat' => 7, 'offset' => 0, 'surahOffset' => 0, 'title' => 'Al Fatihah'],
        2 => ['jumlahAyat' => 286, 'offset' => 7, 'surahOffset' => 1, 'title' => 'Al Baqarah'],
        3 => ['jumlahAyat' => 200, 'offset' => 293, 'surahOffset' => 2, 'title' => 'Ali Imran'],
        4 => ['jumlahAyat' => 176, 'offset' => 493, 'surahOffset' => 3, 'title' => 'An Nisa'],
        5 => ['jumlahAyat' => 120, 'offset' => 669, 'surahOffset' => 4, 'title' => 'Al Maidah'],
        6 => ['jumlahAyat' => 165, 'offset' => 789, 'surahOffset' => 5, 'title' => 'Al An`am'],
        7 => ['jumlahAyat' => 206, 'offset' => 954, 'surahOffset' => 6, 'title' => 'Al A`raf'],
        8 => ['jumlahAyat' => 75, 'offset' => 1160, 'surahOffset' => , 'title' => 'Al Anfal'],
        9 => ['jumlahAyat' => 129, 'offset' => 1235, 'surahOffset' => 10, 'title' => 'At Taubah'],
    ];
   

    if (array_key_exists($id, $quranData)) {
        $data['quran'] = $this->db->get('quran_id', $quranData[$id]['jumlahAyat'], $quranData[$id]['offset'])->result_array();
        $data['surah'] = $this->db->get_where('surah', ['arti_surah'], 1, $quranData[$id]['surahOffset'])->result_array();
        $data['bismillah'] = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
        $data['title'] = $quranData[$id]['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('Al-Quran/quran', $data);
        $this->load->view('templates/footer', $data);
    }
  }
    public function search() {
      //ambil data dari keybord

			    $data['keywords'] = $this->input->post('keyword');
          $data['result'] = $this->Quran_model->searchKeywords($data['keywords']);

          $this->load->view('Al-Quran/search', $data);
  }


}
?>  