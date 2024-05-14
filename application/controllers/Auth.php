<?php
class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
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
                'role' => $user->role,
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
    $user = $this->db->get_where('users', array('username' => $username))->row();
	var_dump($user);
    if ($user) {
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
 
    public function Daftar() {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'required');
        $this->form_validation->set_rules('pass2', 'Repeat Password', 'required|matches[pass1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('Auth/registrasi');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password1 = $this->input->post('pass1');
            $password2 = $this->input->post('pass2');
            $status = 'ustad'; // Set status sebagai admin

            // Validasi password
            if ($password1 !== $password2) {
                // Jika password tidak cocok, tampilkan pesan error atau lakukan penanganan yang sesuai
                $this->session->set_flashdata('message', 'Password tidak cocok');
                redirect('Auth/Daftar');
            }

            $resetToken = $this->generateResetToken();

            // Simpan data ke tabel
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password1, PASSWORD_DEFAULT), // Encrypt password sebelum disimpan
                'role' => $status,
                'reset_token' => $resetToken
            );

            $this->db->insert('users', $data); 

			return redirect('Auth');
                                    
        }
    }

    private function generateResetToken()
    {
        // Implementasikan logika untuk menghasilkan token reset password, misalnya menggunakan library atau fungsi bawaan PHP
        // Contoh sederhana menggunakan md5 dan timestamp
        $timestamp = time();
        $randomString = uniqid();
        $token = md5($timestamp . $randomString);

        return $token;
    }

     private function sendEmail($token, $type, $email)
{
    
            $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'sandbox.smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_user' => '0362c461686a79',
        'smtp_pass' => '95570c1c9b976a',
        'crlf' => "\r\n",
        'newline' => "\r\n"
        );

    $this->email->initialize($config);

    $this->email->from('ergialipfalah@gmail.com', 'Maulana Ergi');
    $this->email->to($email);

   if($type == 'verify') {
            $this->email->subject('Verification Your Account');
            $this->email->message('Click this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated Account</a>');
        } else if($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset password : <a href="'. base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if($this->email->send()){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
}

   public function lupaPassword() {
    if ($this->input->post()) {
        $email = $this->input->post('email');

        // Generate token for password reset
        $token = bin2hex(random_bytes(32));

        // Save the token and email to the database
        $this->db->set('reset_token', $token);
        $this->db->where('email', $email);
        $this->db->update('admin');

        // Send password reset email
        $this->sendEmail($token, 'forgot', $this->input->post('email'));

        // Display success message or redirect to a success page
        $data['message'] = 'Email with password reset instructions has been sent.';
        $this->load->view('Auth/forgot-password', $data);
    } else {
        $this->load->view('Auth/forgot-password');
    }
}
}
?>
