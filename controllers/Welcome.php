<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
    // function __construct()
    // {
    //     parent::__construct();
    //     // cek login
  
    //     if ($this->session->userdata('login')== "sign_up") {
    //         $url = $this->uri->segment(3, 0);
    //         redirect(base_url($url));
    //     }
       
    // }
    
    function registrasi()
    {
        $validation     = $this->form_validation;
        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]|is_unique[users.username]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');

        if ($validation->run() == false) {
            $data['title'] = 'Sign-up';
            $this->load->view('register', $data);
        } else {
            $this->UserModels->add_user();
            echo "<script>alert('Success, Registration!');</script>";
            echo "<script>window.location='".site_url('sign-in')."'</script>";
        }
    }

	public function index()
	{       
            $data['title'] = 'Software Maturity Model';
            $this->load->view('index', $data);
	}

	public function sign_in()
    {
        $data['title'] = 'Login system';
        $this->load->view('login', $data);
    }

    function login()
    {
        
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run()==false)
        {
            redirect(base_url('sign_in'));
        }else{
           $this->_login();
        }
    }

    private function  _login()
    {
        $username      	= $this->input->post('username');
        $password   	= $this->input->post('password');
        $user       	= $this->db->get_where('users', ['username' => $username])->row_array();
        $verify         = password_verify($password, $user['password']);

        if ($user != null) {
            if ($verify) {
                $data = [
                    'id_user'      	=> $user['id_user'],
                    'username'      => $user['username'],
                    // 'email'         => $user['email'],
                    'password'      => $password,
                    'status'        => $user['status'],
                    'login'         => 'sign_up'
                ];
                $this->session->set_userdata($data);
                if($user['status']=='Administrator')
                {
                    echo "<script>alert('Login berhasil, welcome ".$this->session->userdata('username')."!');</script>";
                    echo "<script>window.location='".site_url('dashboard')."'</script>";

                }elseif($user['status']=='Respondent')
                {
                    echo "<script>alert('Login berhasil, welcome ".$this->session->userdata('username')."!');</script>";
                    echo "<script>window.location='".site_url('home')."'</script>";
                }else{
                    echo "<script>alert('Login berhasil, welcome ".$this->session->userdata('username')."!');</script>";
                    echo "<script>window.location='".site_url('surveyor')."'</script>";
                }
               
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong> Maaf Password Salah ! </strong></div>');
				redirect(base_url('sign-in'));
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong> Maaf, akun anda belum terdaftar. Silahkan hubungi pihak terkait, untuk registrasi akun terlebih dahulu! </strong></div>');
            redirect(base_url('sign-in'));
        }
    }


  
}
