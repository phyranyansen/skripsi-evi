<?php

class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // cek login
  
        if ($this->session->userdata('login') != "sign_up") {
            redirect(base_url());
        }elseif($this->session->userdata('status')=='Respondent')
        {
            $url = $this->uri->segment(3, 0);
            redirect(base_url($url));
        }
       
    }

    public function index()
    {
        
        // $data['ready']   = $this->admin_model->jumlah_data();
        // $data['terjual']   = $this->admin_model->jumlah_data_jenis();
        $data['title'] = 'Dashboard';
        $data['page']   = 'Dashboard';
        $this->load->view('templates/admin/head', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/footer');

    }

    public function kuesioner()
    {
        $data['title']       = 'Kuesioner';
        $data['page']        = 'Kuesioner';
        $data['criteria']    = $this->AdminModels->get('criteria');
        $data['planning']    = $this->AdminModels->get('planning');
        $data['question']    = $this->AdminModels->getQuesioner('kuesioner');
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/kuesioner', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/footer');
    }

    public function criteria()
    {
       
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('criteria', 'Criteria', 'required');
        $this->form_validation->set_rules('label', 'Company', 'required');

        if ($validation->run() == false) {
            $data['title']       = 'Criteria';
            $data['page']        = 'Criteria';
            $data['criteria']    = $this->AdminModels->get('criteria');
            $this->load->view('templates/admin/head', $data);
            $this->load->view('admin/criteria', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/footer');
        } elseif($this->input->post('add_hidden')){
            $this->AdminModels->add_criteria();
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success col-md-6" style"text-align:center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success,</strong> Data has been added!.
            </div>');
				redirect(base_url('criteria'));
        } elseif ($this->input->post('update_hidden'))  {
            $id = $this->input->post('id');
            $where = array('id_criteria' => $id);
            $this->AdminModels->update_criteria($where, 'criteria');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success col-md-6" style"text-align:center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success,</strong> Data has been updated!.
            </div>');
				redirect(base_url('criteria'));
        }
        
    }
    public function plan()
    {
      
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('planning', 'Planning', 'required');
        $this->form_validation->set_rules('id_company', 'Company', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('created_date', 'Created Date', 'required');
        $this->form_validation->set_rules('session_date', 'Session Date', 'required');

        if ($validation->run() == false) {
            $data['title']       = 'Planning';
            $data['page']        = 'Planning';
            $data['plan']        = $this->AdminModels->getJoin('planning');
            $data['company']     = $this->AdminModels->get('company');
            $this->load->view('templates/admin/head', $data);
            $this->load->view('admin/plan', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/footer');
        } elseif ($this->input->post('add_hidden'))  {
            $this->AdminModels->add_planning();
            echo "<script>alert('Success, Plan has been submited!');</script>";
            echo "<script>window.location='".site_url('plan')."'</script>";
        } elseif ($this->input->post('update_hidden'))  {
            
            $id = $this->input->post('id');
            $where = array('id_planning' => $id);
            $this->AdminModels->update_planning($where, 'planning');
            echo "<script>alert('Success,Update has been submited!');</script>";
            echo "<script>window.location='".site_url('plan')."'</script>";
        }
    }
    public function delete_plan($id)
    {
        $where = array('id_planning' => $id);
        $this->AdminModels->hapus_data($where, 'planning');
        echo "<script>alert('Success,Plan has been delete!');</script>";
        echo "<script>window.location='".site_url('plan')."'</script>";
    }
    public function delete_criteria($id)
    {
        $where = array('id_criteria' => $id);
        $this->AdminModels->hapus_data($where, 'criteria');
        echo "<script>alert('Success,Criteria has been delete!');</script>";
        echo "<script>window.location='".site_url('criteria')."'</script>";
    }
    public function delete_company($id)
    {
        $where = array('id_company' => $id);
        $this->AdminModels->hapus_data($where, 'company');
        echo "<script>alert('Success,Data has been delete!');</script>";
        echo "<script>window.location='".site_url('company')."'</script>";
    }
    public function delete_kuesioner($id)
    {
        $where = array('id_kuesioner' => $id);
        $this->AdminModels->hapus_data($where, 'kuesioner');
        echo "<script>alert('Success,Data has been delete!');</script>";
        echo "<script>window.location='".site_url('kuesioner')."'</script>";
    }

    public function company()
    {
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        if ($validation->run() == false) {
            $data['title']       = 'Company';
            $data['page']        = 'Company';
            $data['company']    = $this->AdminModels->get('company');
            $this->load->view('templates/admin/head', $data);
            $this->load->view('admin/company', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/footer');
        } elseif ($this->input->post('add_hidden')) {
            $this->AdminModels->add_company();
            echo "<script>alert('Success, has been submited!');</script>";
            echo "<script>window.location='".site_url('company')."'</script>";
        }elseif ($this->input->post('update_hidden'))  {
            $id = $this->input->post('id');
            $where = array('id_company' => $id);
            $this->AdminModels->update_company($where, 'company');
            echo "<script>alert('Success,Update has been submited!');</script>";
            echo "<script>window.location='".site_url('company')."'</script>";
        }

        
    }



    public function survey()
    {
           $id = $this->uri->segment(2, 0);
        //TABLE Analisa data per-Criteria
        $com     = $this->AdminModels->get_com($id);
        $cvm     = $this->AdminModels->get_cvm();
        $gov     = $this->AdminModels->get_gov();
        $par     = $this->AdminModels->get_par();
        $sar     = $this->AdminModels->get_sar();
        $ski     = $this->AdminModels->get_ski();

        
     
        //TABLE Hasil Tingkat Kematangan Secara Keseluruhan
        $criteria1     = $this->AdminModels->get_criteria1($id);
        $criteria2     = $this->AdminModels->get_criteria2($id);
        $criteria3     = $this->AdminModels->get_criteria3($id);
        $criteria4     = $this->AdminModels->get_criteria4($id);
        $criteria5     = $this->AdminModels->get_criteria5($id);
        $criteria6     = $this->AdminModels->get_criteria6($id);
        $join_array    = array_merge($criteria1, $criteria2, $criteria3, $criteria4, $criteria5, $criteria6);
        $all = 0;
        foreach($join_array as $row)
        {
            $all       = $row['total']+$all;
            $total_all = number_format($all / 6, 2);

            $array[] =array(
                'label'      => $row['label'],
                'total'      => number_format($row['total'], 2),
                'kematangan' => floor($row['total'])
            );

            $label[]= $row['label'];
            $total[]= number_format($row['total'], 2);
        }

        //send to chart
        $data['json_label'] = json_encode($label);
        $data['json_data']  = json_encode($total);
       
        //view
        $data['criteria']    = $array;
        $data['total_keseluruhan'] = $total_all;
        $data['title']       = 'Survey';
        $data['page']        = 'Hasil Survey';
        $data['com']         = $com;
        $data['cvm']         = $cvm;
        $data['gov']         = $gov;
        $data['par']         = $par;
        $data['sar']         = $sar;
        $data['ski']         = $ski;
        $data['project']     = $this->AdminModels->get_options($id);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/survey', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/footer', $data);
        return $array;
    }


    public function json_survey()
    {
        $data = $this->survey();
        foreach($data as $row => $key)
        {

            $array[] = array($key['total']);
        }
        echo json_encode($array);
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