<?php


class Survey extends CI_Controller {
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

  

}