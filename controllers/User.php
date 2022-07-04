<?php

use function PHPUnit\Framework\isEmpty;

class User extends CI_Controller {

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
        }elseif($this->session->userdata('status')=='Surveyor'){
            $url = $this->uri->segment(3, 0);
            redirect(base_url($url));
        }  
    }

    public function index()
    {
         $idUser               = $this->session->userdata('id_user');

            //query1
            $query = $this->db->query('SELECT kuesioner.id_planning AS idPlann, 
            planning, created_date, session_date, description
            FROM planning 
            JOIN kuesioner 
            ON kuesioner.id_planning = planning.id_planning GROUP BY kuesioner.id_planning')->result_array();
       
            //query2
           
            $query_planning       = $this->db->query("SELECT kuesioner.id_planning AS idPlann, 
            planning, created_date, session_date, description
            FROM planning 
            JOIN kuesioner 
            ON kuesioner.id_planning = planning.id_planning 
            JOIN log ON log.id_planning = planning.id_planning
            WHERE log.id_user = $idUser
            GROUP BY kuesioner.id_planning;")->result_array();

        $get_planning1=array();
        $get_planning2=array();
        $get = array();
        foreach($query as $row1) 
        {
            foreach($query_planning as $row2)
            {
                if($row1['idPlann']==$row2['idPlann'])
                {
                   $get_planning1[] = array(
                    'idPlann'   => $row2['idPlann'],
                    'planning'      => $row2['planning'],
                    'created_date'  => $row2['created_date'],
                    'session_date'  => $row2['session_date'],
                    'description'   => $row2['description'],
                    'status'        => 'Submitted!'
                   );
                }else{
                    $get_planning2[] = array(
                        'idPlann'       => $row1['idPlann'],
                        'planning'      => $row1['planning'],
                        'created_date'  => $row1['created_date'],
                        'session_date'  => $row1['session_date'],
                        'description'   => $row1['description'],
                        'status'        => 'Not submit!'
                       );
                }

            }

            if($query_planning==null)
            {
                $get[] = array(
                    'idPlann'       => $row1['idPlann'],
                    'planning'      => $row1['planning'],
                    'created_date'  => $row1['created_date'],
                    'session_date'  => $row1['session_date'],
                    'description'   => $row1['description'],
                    'status'        => 'Not submit!'
                   );
            }else{
               $get = array_merge($get_planning1, $get_planning2);
            }
        }
        
       

        $data['get_respondent'] = $this->UserModels->get_respondent();
        $data['division']       = $this->UserModels->get_division();


        $validation     = $this->form_validation;
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('division', 'division', 'required');
        $this->form_validation->set_rules('fullname', 'fullname', 'required');

        if ($validation->run() == false) {
            $data['planning']     = $get;
            $data['title']        = 'Dashboard';
            $data['page']         = 'Dashboard';
            $this->load->helper('date');
            $data['wakturealtime'] = "%Y-%m-%d %h:%i:%s %A";
            echo mdate();
           
            $this->load->view('templates/user/header', $data);
            $this->load->view('user/dashboard', $data);
            $this->load->view('templates/user/footer');
           
        } else {
            $id = $this->session->userdata('id_user');
            $cek = $this->db->query("SELECT * FROM respondent WHERE id_user=$id")->result_array();
            if($cek!=null)
            {
                // update/change user
                $where = array('id_user' => $id);
                $this->UserModels->change_respondent($where, 'respondent');
                echo "<script>window.location='".site_url('home')."'; alert('Success, data has been changed!');</script>";
            }else{
             $this->UserModels->add_respondent();
             echo "<script>window.location='".site_url('home')."'; alert('Success, data has been submited!');</script>";
            }
        }

       
    }

    public function info()
    {
        $survey          = $this->UserModels->getSurvey();
        $idUser          = $this->session->userdata('id_user');
        $data['cek']     = $this->db->query("SELECT id_planning AS plann, COUNT(id_planning) AS jumlah FROM log WHERE id_user='$idUser' ORDER BY id_planning")->row_array();
        
        $data['info']         = $survey;
        $data['title']        = 'Info';
        $data['page']         = 'Info';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('user/info', $data);
        $this->load->view('templates/user/sidebar');
        $this->load->view('templates/admin/footer');
    }

    public function survey()
    {
        // $this->load->library('pagination');
        // $jumlah_data = $this->UserModels->jumlah_data();
		// $this->load->library('pagination');
        // $config['base_url'] = base_url().'user/survey/';
        // $config['total_rows'] = $jumlah_data;
        // $config['per_page'] = 10;
       
        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav></div>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';

        // $data['cek']       =   $config['last_link'];
        // $data['pagination'] = $this->pagination->create_links();

        // $this->pagination->initialize($config);
		// $from = $this->uri->segment(3);
		// $data['survey'] = $this->UserModels->data($config['per_page'],$from);

        // $idUser         = $this->session->userdata('id_user');
        // $user       	= $this->db->get_where('log', ['id_user' => $idUser])->row_array();
        $uri            = $this->uri->segment(2);
        $id             = base64_decode($uri);
        $data['title']  = 'Survey';
        $data['survey'] = $this->UserModels->get_kuesioner($id);
        $data['page']   = 'Survey';
        $this->load->view('templates/user/header', $data);
        $this->load->view('user/survey', $data);
        $this->load->view('templates/user/footer');
    }


    public function add_quesioner()
    {
        $data = array();

        for($i=0; $i<=$_POST['jumlah']; $i++)
        {
            $option = $i+1;
            if($i>$_POST['jumlah'] || $option>$_POST['jumlah'])
            {
                break;
            }else{
                $this->form_validation->set_rules('option'.$option.'', 'option'.$option.'', 'required');
                if($this->form_validation->run() == false)
                {
                    $this->session->set_flashdata('pesan', '<script>alert
                    ("Please, select full option!");</script>');
                        redirect(base_url('survey'));
                }else{
                    $data[]=array(
                        'options'        => $_POST['option'.$option.''],
                        'id_kuesioner'   => $_POST['id_kuesioner'][$i],
                        'id_user'        => $this->session->userdata('id_user')
                    );
                    
                }
            }

        }
          
        $timestamp           = Date("Y-m-d H:i:s");
        $idUser              = $this->session->userdata('id_user');
        $save = [
            'time'          => $timestamp,
            'id_planning'   => $this->input->post('id_planning'),
            'id_user'       => $idUser
        ];
        
        $simpan = $this->AdminModels->add_survey($data);
       if($simpan){
        $this->session->set_flashdata('pesan', '<script>alert
        ("Survey can not save, Error!");</script>');
            redirect(base_url('home'));
       }else{
        $this->UserModels->addLog($save);
        $this->session->set_flashdata('pesan', '<script>alert
          ("Survey has submitted, thanks!");</script>');
          redirect(base_url('home'));
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