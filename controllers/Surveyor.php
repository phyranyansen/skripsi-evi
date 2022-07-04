<?php 


class Surveyor extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        // cek login
  
        if ($this->session->userdata('login') != "sign_up") {
            redirect(base_url());
        }elseif($this->session->userdata('status')=='Administrator')
        {
            $url = $this->uri->segment(3, 0);
            redirect(base_url($url));
        }elseif($this->session->userdata('status')=='Respondent'){
            $url = $this->uri->segment(3, 0);
            redirect(base_url($url));
        }  
    }

    public function index()
    {

        $validation     = $this->form_validation;
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('division', 'division', 'required');
        $this->form_validation->set_rules('fullname', 'fullname', 'required');


        if ($validation->run() == false) {
            
            $data['get_respondent'] = $this->UserModels->get_surveyor();
            $data['division']       = $this->UserModels->get_division();
            $data['planning']       = $this->UserModels->get_planning();
            $data['title']        = 'Dashboard';
            $data['page']         = 'Dashboard';
            $this->load->helper('date');
            $data['wakturealtime'] = "%Y-%m-%d %h:%i:%s %A";
            echo mdate();

            $this->load->view('templates/user/header', $data);
            $this->load->view('surveyor/dashboard', $data);
            $this->load->view('templates/user/footer');

        } else {
            
            $id = $this->session->userdata('id_user');
            $cek = $this->db->query("SELECT * FROM surveyor WHERE id_user=$id")->result_array();
            if($cek!=null)
            {
                // update/change user
                $where = array('id_user' => $id);
                $this->UserModels->change_surveyor($where, 'surveyor');
                echo "<script>window.location='".site_url('surveyor')."'; alert('Success, data has been changed!');</script>";
            }else{
                // update/change user
                $this->UserModels->add_surveyor();
                echo "<script>window.location='".site_url('surveyor')."'; alert('Success, data has been submited!');</script>";
            }
        }
    }

    public function plann()
    {
      
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('planning', 'Planning', 'required');
        $this->form_validation->set_rules('id_company', 'Company', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('created_date', 'Created Date', 'required');
        $this->form_validation->set_rules('session_date', 'Session Date', 'required');

        if ($validation->run() == false) {
            $data['get_respondent'] = $this->UserModels->get_surveyor();
            $data['division']       = $this->UserModels->get_division();
            $data['company']        = $this->UserModels->get_company();
            $data['planning']       = $this->UserModels->get_planning();
            $data['title']        = 'Dashboard';
            $data['page']         = 'Dashboard';
            $this->load->helper('date');
            $data['wakturealtime'] = "%Y-%m-%d %h:%i:%s %A";
            echo mdate();

            $this->load->view('templates/user/header', $data);
            $this->load->view('surveyor/dashboard', $data);
            $this->load->view('templates/user/footer');
        } else {
            $this->AdminModels->add_planning();
            echo "<script>alert('Success, Plan has been submited!');</script>";
            echo "<script>window.location='".site_url('surveyor')."'</script>";
        }
    }


//logout
function logout()
{
    $this->session->sess_destroy();
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('password');
    $this->session->unset_userdata('login');
    $this->session->unset_userdata('status');
    redirect(base_url());
}

}