<?php


class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
public function index()
{
    // Cek apakah pengguna sudah login sebelumnya
    if ($this->session->userdata('logged_in')) {
        // Pengguna sudah login, lakukan tindakan yang sesuai
        redirect('admin/'); // Contoh: Redirect ke halaman dashboard
    }

    // Validasi form login
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    // Cek apakah form validasi berhasil
    if ($this->form_validation->run() == false) {
        // Form validasi gagal, tampilkan halaman login
        $this->load->view('Auth/login');
    } else {
        // Form validasi berhasil
        $this->login();
    }
}

private function login()
{
    // Proses autentikasi dengan database
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // Cek autentikasi dengan database (misalnya tabel admin)
    $user = $this->authenticate($email, $password);

    if ($user) {
        // Autentikasi berhasil, buat session
        $data = array(
            'user_id' => $user->id,
            'email' => $user->email,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($data);

        redirect('admin/'); 
        // Contoh: Redirect ke halaman dashboard setelah login berhasil
    } else {
        // Autentikasi gagal, tampilkan pesan error
        $data['error_message'] = 'Email atau password salah.';
        $this->load->view('Auth/login', $data);
    }
}

private function authenticate($email, $password)
{
    // Lakukan proses autentikasi dengan database (contoh sederhana)
    $user = $this->db->get_where('admin', array('email' => $email))->row();

    if ($user) {
        // Verifikasi password dengan hash yang ada dalam database
        if (password_verify($password, $user->password)) {
            return $user;
        }
    }

    return false;
}

public function logout()
{
    // Hapus session dan arahkan ke halaman login
    $this->session->sess_destroy();
    redirect('Auth/');
}

}
?>