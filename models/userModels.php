<?php

use function PHPUnit\Framework\isEmpty;

class UserModels extends CI_Model {

    public function getQuesioner($id)
    {
        $array = [
            'id_planning' => $id
        ];
       $query = $this->db->get_where('kuesioner', $array);
       return $query->result();
    }

    function jumlah_data(){
		return $this->db->get('kuesioner')->num_rows();
	}

    function data($number,$offset){
		return  $this->db->get('kuesioner',$number,$offset)->result();		
	}

    public function addLog($data)
    {
        $this->db->insert('log',$data);
    }

    public function add_user()
    {
            $data   = [
                'username'          => $this->input->post('username'),
                'password'          => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status'            => 'Respondent'
            ];
            $this->db->insert('users', $data);
    }

    public function add_respondent()
    {
        $data   = [
            'nama_lengkap'      => $this->input->post('fullname'),
            'id_division'       => $this->input->post('division'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'id_user'           => $this->session->userdata('id_user')

        ];
        $this->db->insert('respondent', $data);
    }
    public function change_respondent($where, $table)
    {
        $data   = [
            'nama_lengkap'      => $this->input->post('fullname'),
            'id_division'       => $this->input->post('division'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'id_user'           => $this->session->userdata('id_user')

        ];
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function add_surveyor()
    {
        $data   = [
            'nama_lengkap'      => $this->input->post('fullname'),
            'id_division'       => $this->input->post('division'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'id_user'           => $this->session->userdata('id_user')

        ];
        $this->db->insert('surveyor', $data);
    }

    public function get_company()
    {
        $query = $this->db->get('company')->result_array();
        return $query;
    }

    public function get_planning()
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT planning, description, session_date, company_name
            FROM planning JOIN company
            ON planning.id_company = company.id_company
            WHERE planning.id_user = $id
        ")->result_array();

        return $query;
    }

    public function change_surveyor($where, $table)
    {
        $data   = [
            'nama_lengkap'      => $this->input->post('fullname'),
            'id_division'       => $this->input->post('division'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'id_user'           => $this->session->userdata('id_user')

        ];
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_division()
    {
        $query = $this->db->get('division');
        return $query->result_array();
    }

    
    public function get_respondent()
    {
        $id    = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT nama_lengkap, jenis_kelamin, division AS jabatan, username, password, status
        FROM users 
        JOIN respondent
            ON users.id_user = respondent.id_user
        JOIN division
            ON division.id_division = respondent.id_division
        WHERE respondent.id_user=$id");
        return $query->row_array();
    }

    public function get_surveyor()
    {
        $id    = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT nama_lengkap, jenis_kelamin, division AS jabatan, username, password, status
        FROM users 
        JOIN surveyor
            ON users.id_user = surveyor.id_user
        JOIN division
            ON division.id_division = surveyor.id_division
        WHERE surveyor.id_user=$id");
        return $query->row_array();
    }
    
    public function get_log($id, $planning)
    {
        
        $query = $this->db->query("SELECT kuesioner.id_planning AS idPlann, 
        planning, created_date, session_date, description
        FROM planning 
        JOIN kuesioner 
        ON kuesioner.id_planning = planning.id_planning 
        WHERE NOT EXISTS(SELECT * FROM log WHERE log.id_user=$id AND log.id_planning=$planning)
        GROUP BY kuesioner.id_planning");
        return $query->row_array();
    }

    public function get_kuesioner($id)
    {
        $query = $this->db->query("SELECT id_kuesioner, kuesioner.id_planning, planning, created_date, session_date, label_kuesioner,
        question1, question2, question3, question4, question5, id_criteria, kuesioner.id_planning 
        FROM planning 
        JOIN kuesioner ON kuesioner.id_planning = planning.id_planning
        WHERE kuesioner.id_planning=$id");
        return $query->result();
    }
}