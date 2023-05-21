<?php 
class Auth extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
 
    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->view('Auth/login.php');
    }
    public function registrasi() {
        $this->load->view('Auth/registrasi.php');

    }

}

?>