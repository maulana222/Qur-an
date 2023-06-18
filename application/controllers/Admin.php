<?php 
class Admin extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model('Super_admin');
      $this->load->library('form_validation');
  }
  public function index() {
 if ($this->session->userdata('logged_in')) {
     if($this->session->userdata('status') === 'master'){
          $data['count'] = $this->db->count_all('materi_quran');
            $data['profile'] = $this->Super_admin->getdataAdmin();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/dashbord', $data);
     }elseif($this->session->userdata('status') === 'admin') {
            redirect('ustad/dashbord');
     }else{
        $data = 'user tidak di temukan';
     }
    }else {
        redirect('auth');
    } 
  }
  public function materi_Alquran() {
     $sesi = $this->session->userdata('status');
     $user = $this->session->userdata('username');
     if($sesi === 'master'){
    if($this->session->userdata('logged_in')) {
        $data['surahNames'] = $this->Super_admin->getSurahNames();
        $data['records'] = $this->Super_admin->get_data_with_join();
       $this->load->view('admin/materi_quran', $data);
    }else {
            redirect('auth');
    }
}elseif($sesi === 'admin') {
        if($this->session->userdata('logged_in')) {
        $data['surahNames'] = $this->Super_admin->getSurahNames();
        $data['records'] = $this->Super_admin->get_data_byuser($user);
       $this->load->view('ustad/materi_quran', $data);
    }else {
            redirect('auth');
    }
    }
  }

  public function surah() {
     if($this->session->userdata('logged_in')) {
        if($this->session->userdata('status') === 'master') {
             $data['surah'] = $this->db->get('surah')->result_array();
             $this->load->view('admin/surah', $data);
        }elseif ($this->session->userdata('status') === 'admin'){
            $data['surah'] = $this->db->get('surah')->result_array();
            $this->load->view('ustad/surah', $data);
        }

     }
     else {
            redirect('auth');
    }
}
  public function showayat($id) {
    if($this->session->userdata('logged_in')) {
   $this->load->library('Library_data_ayat');
   $quranData = $this->library_data_ayat->showAyat($id);
   
   $sesi = $this->session->userdata('status');
   if($sesi === 'master'){
     if (array_key_exists($id, $quranData) ) {
        $data['quran'] = $this->db->get('quran_id', $quranData[$id]['jumlahAyat'], $quranData[$id]['offset'])->result_array();
        $data['surah'] = $this->db->get_where('surah', ['arti_surah'], 1, $quranData[$id]['surahOffset'])->result_array();
        $data['bismillah'] = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
        $data['title'] = $quranData[$id]['title'];
       
        $this->load->view('Admin/ayat', $data);
        if($this->session->userdata('session_admin')) {
            redirect('Admin/surah');
        }
     }else {
            redirect('auth');
      }
   }elseif($sesi === 'admin') {
         if (array_key_exists($id, $quranData) ) {
        $data['quran'] = $this->db->get('quran_id', $quranData[$id]['jumlahAyat'], $quranData[$id]['offset'])->result_array();
        $data['surah'] = $this->db->get_where('surah', ['arti_surah'], 1, $quranData[$id]['surahOffset'])->result_array();
        $data['bismillah'] = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
        $data['title'] = $quranData[$id]['title'];
       
        $this->load->view('Ustad/ayat', $data);
        if($this->session->userdata('session_admin')) {
            redirect('Ustad/surah');
        }
   }
}
    }
}

public function create() {
    if($this->session->userdata('logged_in')) {
        // Validasi form input
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        //materi
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('surahList', 'Surah', 'required');
        $this->form_validation->set_rules('ayat', 'Ayat', 'required');
        $this->form_validation->set_rules('materi', 'Isi Materi', 'required');
        
        $table_name = $this->input->post('table');
    if ($this->form_validation->run() == false) {
        
        $data['surahNames'] = $this->Super_admin->getSurahNames();
        $this->load->view('Admin/materi_quran', $data);
    }   if($table_name === 'materi_quran') {
        // Upload gambar jika ada
        $gambar = '';
        if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != '') {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5048; // 5MB
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                // Tampilkan pesan error jika terjadi masalah saat upload gambar
                $data['error_message'] = $error;
                $data['surahNames'] = $this->Super_admin->getSurahNames();
                $this->load->view('errors/form', $data);
                return;
            }
        }
        $surahId = $this->input->post('surahList'); // Ubah variabel yang diambil dari form menjadi 'surahId'
        $data = array(
            'id_surah' => $surahId, // Gunakan variabel 'surahId' yang telah diubah
            'nomor_ayat' => $this->input->post('ayat'),
            'judul_materi' => $this->input->post('judul'),
            'gambar' => $gambar,
            'isi_materi' => $this->input->post('materi'),
            'tanggal' => date('Y-m-d'), // Menambahkan tanggal saat ini
            'oleh' =>  $this->input->post('user')
        );
        // Panggil model untuk menyimpan data ke database
        $this->Super_admin->createData($table_name, $data);
        redirect('Admin/materi_Alquran');
    }elseif ($table_name === 'admin'){
           $username  = $this->input->post('username');
           $pass =  $this->input->post('password');

            $dataadmin = array(
                'username' => $username,
                'email' => $this->input->post('email'),
                'password' =>  password_hash($pass, PASSWORD_DEFAULT),
                'status' => $this->input->post('status')
            );
             $this->Super_admin->createData($table_name, $dataadmin);
               
            redirect('Admin/data_admin');
        }

    }else {
            redirect('auth');
      }
}
 public function update($id) {
    // Logika untuk menampilkan formulir edit data
      if($this->session->userdata('logged_in')) {
    if ($this->input->post()) {
        // ...
        // Kode untuk pemrosesan data yang diubah
        $gambar = '';
        if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != '') {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5048; // 5MB
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                // Tampilkan pesan error jika terjadi masalah saat upload gambar
                $data['error_message'] = $error;
                $data['surahNames'] = $this->Super_admin->getSurahNames();
                $this->load->view('errors/form', $data);
                return;
            }
        }
        $surahId = $this->input->post('surahList');
        $data = array(
            'id_surah' => $surahId,
            'nomor_ayat' => $this->input->post('ayat'),
            'judul_materi' => $this->input->post('judul'),
            'gambar' => $gambar,
            'isi_materi' => $this->input->post('materi'),
            'tanggal' => date('Y-m-d')
        );

        $this->Super_admin->update_data($id, $data);
        redirect('admin/materi_Alquran');
    } else {
        $data['record'] = $this->Super_admin->get_data_by_id($id);
        $data['surahNames'] = $this->Super_admin->getSurahNames();
        $this->load->view('admin/updateMateri', $data);
    }
   }else {
            redirect('auth');
      }
}

   public function delate($id, $entity = '') {
    // Logika untuk menghapus data dari database
    if ($entity === 'materi_quran') {
        $this->Super_admin->delate_data('materi_quran', $id);
        redirect('admin/materi_Alquran');
    } elseif ($entity === 'admin') {
        $this->Super_admin->delate_data('admin', $id);
        redirect('admin/data_admin');
    } else {
        // Jika entitas tidak valid, lakukan penanganan kesalahan
        redirect('admin');
    }
}
  
     public function tafsir($no){
      
     $data['tafsir'] = $this->Quran_model->get_Tafsir($no);

     $this->load->view('admin/tafsir', $data);
    }

    public function data_admin() {

    $data['admin'] = $this->Super_admin->getdataAdmin();
    $this->load->view('admin/dataAdmin', $data);
}
}

?>