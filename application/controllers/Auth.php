<?php
class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        // Cek apakah pengguna sudah login sebelum
        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
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

    private function login() {
    // Proses autentikasi dengan database
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Cek autentikasi dengan database (misalnya tabel admin)
    $user = $this->authenticate($username, $password);

    if ($user) {
            $data = array(
                'user_id' => $user->id,
                'username' => $user->username,
                'status' => $user->status,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            redirect('admin');
    } else {
        // Autentikasi gagal, tampilkan pesan error
        $data['error_message'] = 'Username atau password salah.';
        $this->load->view('Auth/login', $data);
    }
}

private function authenticate($username, $password) {
    // Lakukan proses autentikasi dengan database (contoh sederhana)
    $user = $this->db->get_where('admin', array('username' => $username))->row();

    if ($user) {
        // Verifikasi password dengan hash yang ada dalam database
        if (password_verify($password, $user->password)) {
            return $user;
        }
    }

    return false;
}
    public function logout() {
        // Hapus session dan arahkan ke halaman login
        $this->session->unset_userdata('logged_in');
        redirect('Auth');
    }
    public function lupapassword(){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'maeralfa98895@gmail.com',
            'smtp_'
        ];
    }
}
?>
