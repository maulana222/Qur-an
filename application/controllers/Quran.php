<?php
  class Quran extends CI_Controller {

    public function index() {
      
        $data['surah'] = $this->Quran_model->get_data();
        
        $this->load->view('al-quran', $data);
    }


    
    public function Surah($id){


    $quranData = [
        1 => ['jumlahAyat' => 7, 'offset' => 1, 'surahOffset' => 0, 'title' => 'Al Fatihah'],
        2 => ['jumlahAyat' => 286, 'offset' => 7, 'surahOffset' => 1, 'title' => 'Al Baqarah'],
        3 => ['jumlahAyat' => 200, 'offset' => 293, 'surahOffset' => 2, 'title' => 'Ali Imran'],
        4 => ['jumlahAyat' => 176, 'offset' => 493, 'surahOffset' => 3, 'title' => 'An Nisa'],
        5 => ['jumlahAyat' => 120, 'offset' => 669, 'surahOffset' => 4, 'title' => 'Al Maidah'],
        6 => ['jumlahAyat' => 165, 'offset' => 789, 'surahOffset' => 5, 'title' => 'Al An`am'],
        7 => ['jumlahAyat' => 206, 'offset' => 954, 'surahOffset' => 6, 'title' => 'Al A`raf'],
        8 => ['jumlahAyat' => 75, 'offset' => 1160, 'surahOffset' =>  7, 'title' => 'Al Anfal'],
        9 => ['jumlahAyat' => 129, 'offset' => 1235, 'surahOffset' => 8, 'title' => 'At Taubah'],
       10 => ['jumlahAyat' => 109, 'offset' => 1364 , 'surahOffset' => 9, 'title' => 'Yunus'],
        11 => ['jumlahAyat' => 123, 'offset' => 1473 , 'surahOffset' => 10, 'title' => 'Hud'],
        12 => ['jumlahAyat' => 111, 'offset' => 1596 , 'surahOffset' => 11, 'title' => 'Yusuf'],
        13 => ['jumlahAyat' => 43, 'offset' => 1707 , 'surahOffset' => 12, 'title' => 'Ar Ra`d'],
        14 => ['jumlahAyat' => 52, 'offset' => 1750 , 'surahOffset' => 13, 'title' => 'Ibrahim'],
        15 => ['jumlahAyat' => 99, 'offset' => 1802 , 'surahOffset' => 14, 'title' => 'Al Hijr'],
        16 => ['jumlahAyat' => 128, 'offset' => 1901 , 'surahOffset' => 15, 'title' => 'An Nahl'],
        17 => ['jumlahAyat' => 111, 'offset' => 2029 , 'surahOffset' => 16, 'title' => 'Al Isra'],
        18 => ['jumlahAyat' => 110, 'offset' => 2140 , 'surahOffset' => 17, 'title' => 'Al Kahf'],
        19 => ['jumlahAyat' => 98, 'offset' => 2250 , 'surahOffset' => 18, 'title' => 'Maryam'],
        20 => ['jumlahAyat' => 135, 'offset' => 2348 , 'surahOffset' => 19, 'title' => 'Ta-Ha'],
        21 => ['jumlahAyat' => 112, 'offset' => 2483 , 'surahOffset' => 20, 'title' => 'Al Anbiya'],
        22 => ['jumlahAyat' => 78, 'offset' => 2595 , 'surahOffset' => 21, 'title' => 'Al Hajj'],
        23 => ['jumlahAyat' => 118, 'offset' => 2673 , 'surahOffset' => 22, 'title' => 'Al Mu`minun'],
        24 => ['jumlahAyat' => 64, 'offset' => 2791 , 'surahOffset' => 23, 'title' => 'An Nur'],
        25 => ['jumlahAyat' => 77, 'offset' => 2855 , 'surahOffset' => 24, 'title' => 'Al Furqan'],
        26 => ['jumlahAyat' => 227, 'offset' => 2932 , 'surahOffset' => 25, 'title' => 'Asy Syu`ara'],
        27 => ['jumlahAyat' => 93, 'offset' => 3159 , 'surahOffset' => 26, 'title' => 'An Naml'],
        28 => ['jumlahAyat' => 88, 'offset' => 3252 , 'surahOffset' => 27, 'title' => 'Al Qasas'],
        29 => ['jumlahAyat' => 69, 'offset' => 3340 , 'surahOffset' => 28, 'title' => 'Al Ankabut'],
        30 => ['jumlahAyat' => 60, 'offset' => 3409 , 'surahOffset' => 29, 'title' => 'Ar Rum'],
        31 => ['jumlahAyat' => 34, 'offset' => 3469 , 'surahOffset' => 30, 'title' => 'Luqman'],
        32 => ['jumlahAyat' => 30, 'offset' => 3503 , 'surahOffset' => 31, 'title' => 'As Sajdah'],
        33 => ['jumlahAyat' => 73, 'offset' => 3533 , 'surahOffset' => 32, 'title' => 'Al Ahzab'],
        34 => ['jumlahAyat' => 54, 'offset' => 3606 , 'surahOffset' => 33, 'title' => 'Saba'],
        35 => ['jumlahAyat' => 45, 'offset' => 3660 , 'surahOffset' => 34, 'title' => 'Fatir'],
        36 => ['jumlahAyat' => 83, 'offset' => 3705 , 'surahOffset' => 35, 'title' => 'Yasin'],
        37 => ['jumlahAyat' => 182, 'offset' => 3788 , 'surahOffset' => 36, 'title' => 'As Saffat'],
        38 => ['jumlahAyat' => 88, 'offset' => 3970 , 'surahOffset' => 37, 'title' => 'Sad'],
        39 => ['jumlahAyat' => 75, 'offset' => 4058 , 'surahOffset' => 38, 'title' => 'Az Zumar'],
        40 => ['jumlahAyat' => 85, 'offset' => 4133 , 'surahOffset' => 39, 'title' => 'Ghafir'],
        41 => ['jumlahAyat' => 54, 'offset' => 4218 , 'surahOffset' => 40, 'title' => 'Fussilat'],
        42 => ['jumlahAyat' => 53, 'offset' => 4272 , 'surahOffset' => 41, 'title' => 'Asy Syura'],
        43 => ['jumlahAyat' => 89, 'offset' => 4325 , 'surahOffset' => 42, 'title' => 'Az Zukhruf'],
        44 => ['jumlahAyat' => 59, 'offset' => 4414 , 'surahOffset' => 43, 'title' => 'Ad Dukhan'],
        45 => ['jumlahAyat' => 37, 'offset' => 4473 , 'surahOffset' => 44, 'title' => 'Al Jasiyah'],
        46 => ['jumlahAyat' => 35, 'offset' => 4510 , 'surahOffset' => 45, 'title' => 'Al Ahqaf'],
        47 => ['jumlahAyat' => 38, 'offset' => 4545 , 'surahOffset' => 46, 'title' => 'Muhammad'],
        48 => ['jumlahAyat' => 29, 'offset' => 4583 , 'surahOffset' => 47, 'title' => 'Al Fath'],
        49 => ['jumlahAyat' => 18, 'offset' => 4612 , 'surahOffset' => 48, 'title' => 'Al Hujurat'],
        50 => ['jumlahAyat' => 45, 'offset' => 4630 , 'surahOffset' => 49, 'title' => 'Qaf'],
        51 => ['jumlahAyat' => 60, 'offset' => 4675 , 'surahOffset' => 50, 'title' => 'Az Zariyat'],
        52 => ['jumlahAyat' => 49, 'offset' => 4735 , 'surahOffset' => 51, 'title' => 'At Tur'],
        53 => ['jumlahAyat' => 62, 'offset' => 4784 , 'surahOffset' => 52, 'title' => 'An Najm'],
        54 => ['jumlahAyat' => 55, 'offset' => 4846 , 'surahOffset' => 53, 'title' => 'Al Qamar'],
        55 => ['jumlahAyat' => 78, 'offset' => 4901 , 'surahOffset' => 54, 'title' => 'Ar Rahman'],
        56 => ['jumlahAyat' => 96, 'offset' => 4979 , 'surahOffset' => 55, 'title' => 'Al Waqiah'],
        57 => ['jumlahAyat' => 29, 'offset' => 5075 , 'surahOffset' => 56, 'title' => 'Al Hadid'],
        58 => ['jumlahAyat' => 22, 'offset' => 5104 , 'surahOffset' => 57, 'title' => 'Al Mujadilah'],
        59 => ['jumlahAyat' => 24, 'offset' => 5126 , 'surahOffset' => 58, 'title' => 'Al Hasyr'],
        60 => ['jumlahAyat' => 13, 'offset' => 5150 , 'surahOffset' => 59, 'title' => 'Al Mumtahanah'],
        61 => ['jumlahAyat' => 14, 'offset' => 5163 , 'surahOffset' => 60, 'title' => 'As Saff'],
        62 => ['jumlahAyat' => 11, 'offset' => 5177 , 'surahOffset' => 61, 'title' => 'Al Jumu`ah'],
        63 => ['jumlahAyat' => 11, 'offset' => 5188 , 'surahOffset' => 62, 'title' => 'Al Munafiqun'],
        64 => ['jumlahAyat' => 18, 'offset' => 5199 , 'surahOffset' => 63, 'title' => 'At Taghabun'],
        65 => ['jumlahAyat' => 12, 'offset' => 5217 , 'surahOffset' => 64, 'title' => 'At Talaq'],
        66 => ['jumlahAyat' => 12, 'offset' => 5229 , 'surahOffset' => 65, 'title' => 'At Tahrim'],
        67 => ['jumlahAyat' => 30, 'offset' => 5241 , 'surahOffset' => 66, 'title' => 'Al Mulk'],
        68 => ['jumlahAyat' => 52, 'offset' => 5271 , 'surahOffset' => 67, 'title' => 'Al Qalam'],
        69 => ['jumlahAyat' => 52, 'offset' => 5323 , 'surahOffset' => 68, 'title' => 'Al Haqqah'],
        70 => ['jumlahAyat' => 44, 'offset' => 5375 , 'surahOffset' => 69, 'title' => 'Al Ma`arij'],
        71 => ['jumlahAyat' => 28, 'offset' => 5419 , 'surahOffset' => 70, 'title' => 'Nuh'],
        72 => ['jumlahAyat' => 28, 'offset' => 5447 , 'surahOffset' => 71, 'title' => 'Al Jinn'],
        73 => ['jumlahAyat' => 20, 'offset' => 5475 , 'surahOffset' => 72, 'title' => 'Al Muzammil'],
        74 => ['jumlahAyat' => 56, 'offset' => 5495 , 'surahOffset' => 73, 'title' => 'Al Muddassir'],
        75 => ['jumlahAyat' => 40, 'offset' => 5551 , 'surahOffset' => 74, 'title' => 'Al Qiyamah'],
        76 => ['jumlahAyat' => 31, 'offset' => 5591 , 'surahOffset' => 75, 'title' => 'Al Insan'],
        77 => ['jumlahAyat' => 50, 'offset' => 5622 , 'surahOffset' => 76, 'title' => 'Al Mursalat'],
        78 => ['jumlahAyat' => 40, 'offset' => 5672 , 'surahOffset' => 77, 'title' => 'An Naba'],
        79 => ['jumlahAyat' => 46, 'offset' => 5712 , 'surahOffset' => 78, 'title' => 'An Nazi`at'],
        80 => ['jumlahAyat' => 42, 'offset' => 5758 , 'surahOffset' => 79, 'title' => 'Abasa'],
        81 => ['jumlahAyat' => 29, 'offset' => 5800 , 'surahOffset' => 80, 'title' => 'At Takwir'],
        82 => ['jumlahAyat' => 19, 'offset' => 5829 , 'surahOffset' => 81, 'title' => 'Al Infitar'],
        83 => ['jumlahAyat' => 36, 'offset' => 5848 , 'surahOffset' => 82, 'title' => 'Al Muthaffifiin'],
        84 => ['jumlahAyat' => 25, 'offset' => 5884 , 'surahOffset' => 83, 'title' => 'Al Insyiqaq'],
        85 => ['jumlahAyat' => 22, 'offset' => 5909 , 'surahOffset' => 84, 'title' => 'Al Buruj'],
        86 => ['jumlahAyat' => 17, 'offset' => 5931 , 'surahOffset' => 85, 'title' => 'At Thariq'],
        87 => ['jumlahAyat' => 19, 'offset' => 5948 , 'surahOffset' => 86, 'title' => 'Al A`la'],
        88 => ['jumlahAyat' => 26, 'offset' => 5967 , 'surahOffset' => 87, 'title' => 'Al Ghasyiyah'],
        89 => ['jumlahAyat' => 30, 'offset' => 5993 , 'surahOffset' => 88, 'title' => 'Al Fajr'],
        90 => ['jumlahAyat' => 20, 'offset' => 6023 , 'surahOffset' => 89, 'title' => 'Al Balad'],
        91 => ['jumlahAyat' => 15, 'offset' => 6043 , 'surahOffset' => 90, 'title' => 'Asy Syams'],
        92 => ['jumlahAyat' => 21, 'offset' => 6058 , 'surahOffset' => 91, 'title' => 'Al Lail'],
        93 => ['jumlahAyat' => 11, 'offset' => 6079 , 'surahOffset' => 92, 'title' => 'Ad Duha'],
        94 => ['jumlahAyat' => 8, 'offset' => 6090 , 'surahOffset' => 93, 'title' => 'Al Insyirah'],
        95 => ['jumlahAyat' => 8, 'offset' => 6098 , 'surahOffset' => 94, 'title' => 'At Tin'],
        96 => ['jumlahAyat' => 19, 'offset' => 6106 , 'surahOffset' => 95, 'title' => 'Al Alaq'],
        97 => ['jumlahAyat' => 5, 'offset' => 6125 , 'surahOffset' => 96, 'title' => 'Al Qadr'],
        98 => ['jumlahAyat' => 8, 'offset' => 6130 , 'surahOffset' => 97, 'title' => 'Al Bayyinah'],
        99 => ['jumlahAyat' => 8, 'offset' => 6138 , 'surahOffset' => 98, 'title' => 'Az Zalzalah'],
        100 => ['jumlahAyat' => 11, 'offset' => 6146 , 'surahOffset' => 99, 'title' => 'Al Adiyat'],
        101 => ['jumlahAyat' => 11, 'offset' => 6157 , 'surahOffset' => 100, 'title' => 'Al Qari`ah'],
        102 => ['jumlahAyat' => 8, 'offset' => 6168 , 'surahOffset' => 101, 'title' => 'At Takasur'],
        103 => ['jumlahAyat' => 3, 'offset' => 6176 , 'surahOffset' => 102, 'title' => 'Al Asr'],
        104 => ['jumlahAyat' => 9, 'offset' => 6179 , 'surahOffset' => 103, 'title' => 'Al Humazah'],
        105 => ['jumlahAyat' => 5, 'offset' => 6188 , 'surahOffset' => 104, 'title' => 'Al Fil'],
        106 => ['jumlahAyat' => 4, 'offset' => 6193 , 'surahOffset' => 105, 'title' => 'Quraisy'],
        107 => ['jumlahAyat' => 7, 'offset' => 6197 , 'surahOffset' => 106, 'title' => 'Al Ma`un'],
        108 => ['jumlahAyat' => 3, 'offset' => 6204 , 'surahOffset' => 107, 'title' => 'Al Kausar'],
        109 => ['jumlahAyat' => 6, 'offset' => 6207 , 'surahOffset' => 108, 'title' => 'Al Kafirun'],
        110 => ['jumlahAyat' => 3, 'offset' => 6213 , 'surahOffset' => 109, 'title' => 'An Nasr'],
        111 => ['jumlahAyat' => 5, 'offset' => 6216 , 'surahOffset' => 110, 'title' => 'Al Lahab'],
        112 => ['jumlahAyat' => 4, 'offset' => 6221 , 'surahOffset' => 111, 'title' => 'Al Ikhlas'],
        113 => ['jumlahAyat' => 5, 'offset' => 6225 , 'surahOffset' => 112, 'title' => 'Al Falaq'],
        114 => ['jumlahAyat' => 6, 'offset' => 6230 , 'surahOffset' => 113, 'title' => 'An Nas'],
    ];
    if (array_key_exists($id, $quranData)) {
        $data['quran'] = $this->db->get('quran_id', $quranData[$id]['jumlahAyat'], $quranData[$id]['offset'])->result_array();
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