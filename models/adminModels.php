<?php

use function PHPUnit\Framework\countOf;

class AdminModels extends CI_Model {

    public function get($table)
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }


    public function add_criteria()
    {
        $data   = [
            'criteria_name'          => $this->input->post('criteria'),
            'label'                  => $this->input->post('label')
        ];
        $this->db->insert('criteria', $data);
    }

    public function add_company()
    {
        $data   = [
            'company_name'          => $this->input->post('company_name')
        ];
        $this->db->insert('company', $data);
    }

    public function add_planning()
    {
        $data   = [
            'planning'            => $this->input->post('planning'),
            'description'         => $this->input->post('description'),
            'created_date'        => $this->input->post('created_date'),
            'session_date'        => $this->input->post('session_date'),
            'id_user'             => $this->session->userdata('id_user'),
            'id_company'          => $this->input->post('id_company')
        ];
        $this->db->insert('planning', $data);
    }

    public function update_planning($where, $table)
    {
        $data   = [
            'planning'            => $this->input->post('planning'),
            'description'         => $this->input->post('description'),
            'created_date'        => $this->input->post('created_date'),
            'session_date'        => $this->input->post('session_date'),
            'id_user'             => $this->session->userdata('id_user'),
            'id_company'          => $this->input->post('id_company')
        ];
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_criteria($where, $table)
    {
        $data   = [
            'criteria_name'          => $this->input->post('criteria'),
            'label'                  => $this->input->post('label')
        ];
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_company($where, $table)
    {
        $data   = [
            'company_name'          => $this->input->post('company_name')
        ];
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getCount($table)
    {
        $query = $this->db->query("SELECT COUNT(*) FROM options");
        return $query->result_array();
    }

    public function get_row($table)
    {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getJoin($table)
    {
        $this->db->select('id_planning,planning, description, created_date, session_date, company_name, username');
        $this->db->from($table);
        $this->db->join('company', 'planning.id_company=company.id_company');
        $this->db->join('users', 'planning.id_user=users.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('kuesioner', $data);
        }
    }


    public function getQuesioner($table)
    {
        $this->db->select('id_kuesioner,label_kuesioner, question1, question2, question3, question4, question5, label, planning');
        $this->db->from($table);
        $this->db->join('planning', 'kuesioner.id_planning=planning.id_planning');
        $this->db->join('criteria', 'kuesioner.id_criteria=criteria.id_criteria');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_survey($data)
    {
        $this->db->insert_batch('options', $data);
    }

    public function get_survey($id)
    {
        $array = [
            'id_planning' => $id
        ];
       $query = $this->db->get_where('kuesioner', $array);
       return $query->result();
    }

    public function get_com($id)
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, COUNT(criteria.id_criteria) AS jumlah,  
        SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS COM1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS COM2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS COM3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS COM4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS COM5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS COM6
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=1 AND kuesioner.id_planning=$id
           GROUP BY respondent")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;
                    //proses hitung COM1
                    $label = $row['label'];
                    $ht1 = ($row['COM1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung COM2
                    $ht2 = ($row['COM2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung COM3
                    $ht3 = ($row['COM3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung COM4
                    $ht4 = ($row['COM4'] + $ht4);
                    $total4 = ($ht4/$jumlah);

                    //proses hitung COM5
                    $ht5 = ($row['COM5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    //proses hitung COM6
                    $ht6 = ($row['COM6'] + $ht6);
                    $total6 = ($ht6/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total4, $total5, $total6]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);

                $array[] =array(
                'label' => $label,
                'COM1'  =>  number_format($total1, 2),
                'COM2'  =>  number_format($total2, 2),
                'COM3'  =>  number_format($total3, 2),
                'COM4'  =>  number_format($total4, 2),
                'COM5'  =>  number_format($total5, 2),
                'COM6'  =>  number_format($total6, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'COM1' => '',
                'COM2' => '',
                'COM3' => '',
                'COM4' => '',
                'COM5' => '',
                'COM6' => '',
                'total'=> ''
                );
            }
        return $array;
    }

    public function get_cvm()
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, COUNT(criteria.id_criteria) AS jumlah, 
        SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS CVM1, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS CVM2, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS CVM3, 
        --    SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS CVM4, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS CVM5, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS CVM6,
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS CVM7,
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS CVM8
           
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=2 
           GROUP BY respondent")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $ht7 =0;
            $ht8 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;

                    $label = $row['label'];
                    $ht1 = ($row['CVM1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung CVM2
                    $ht2 = ($row['CVM2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung CVM3
                    $ht3 = ($row['CVM3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung CVM4
                    // $ht4 = ($row['CVM4'] + $ht4);
                    // $total4 = ($ht4/$jumlah);

                    //proses hitung CVM5
                    $ht5 = ($row['CVM5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    //proses hitung CVM6
                    $ht6 = ($row['CVM6'] + $ht6);
                    $total6 = ($ht6/$jumlah);

                    //proses hitung CVM7
                    $ht7 = ($row['CVM7'] + $ht7);
                    $total7 = ($ht7/$jumlah);
                    
                    //proses hitung CVM8
                    $ht8 = ($row['CVM6'] + $ht8);
                    $total8 = ($ht8/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total5, $total6, $total7, $total8]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);
                $array[] =array(
                'label' => $label,
                'CVM1'  =>  number_format($total1, 2),
                'CVM2'  =>  number_format($total2, 2),
                'CVM3'  =>  number_format($total3, 2),
                // 'CVM4'  =>  number_format($total4, 2),
                'CVM5'  =>  number_format($total5, 2),
                'CVM6'  =>  number_format($total6, 2),
                'CVM7'  =>  number_format($total7, 2),
                'CVM8'  =>  number_format($total8, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'CVM1' => '',
                'CVM2' => '',
                'CVM3' => '',
                'CVM4' => '',
                'CVM5' => '',
                'CVM6' => '',
                'CVM7' => '',
                'CVM8' => '',
                'total'=> ''
                );
            }
        return $array;
    }

    public function get_gov()
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, COUNT(criteria.id_criteria) AS jumlah, 
        SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS GOV1, 
           SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS GOV2, 
           SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS GOV3, 
           SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS GOV4,  
           SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS GOV5, 
           SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS GOV6,
           SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS GOV7
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=3 
           GROUP BY respondent")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $ht7 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;

                    //proses hitung GOV1
                    $label = $row['label'];
                    $ht1 = ($row['GOV1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung GOV2
                    $ht2 = ($row['GOV2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung GOV3
                    $ht3 = ($row['GOV3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung GOV4
                    $ht4 = ($row['GOV4'] + $ht4);
                    $total4 = ($ht4/$jumlah);

                    //proses hitung GOV5
                    $ht5 = ($row['GOV5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    //proses hitung GOV6
                    $ht6 = ($row['GOV6'] + $ht6);
                    $total6 = ($ht6/$jumlah);

                    //proses hitung GOV7
                    $ht7 = ($row['GOV7'] + $ht7);
                    $total7 = ($ht7/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total4, $total5, $total6, $total7]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);
                $array[] =array(
                'label' => $label,
                'GOV1'  =>  number_format($total1, 2),
                'GOV2'  =>  number_format($total2, 2),
                'GOV3'  =>  number_format($total3, 2),
                'GOV4'  =>  number_format($total4, 2),
                'GOV5'  =>  number_format($total5, 2),
                'GOV6'  =>  number_format($total6, 2),
                'GOV7'  =>  number_format($total7, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'GOV1' => '',
                'GOV2' => '',
                'GOV3' => '',
                'GOV4' => '',
                'GOV5' => '',
                'GOV6' => '',
                'GOV7' => '',
                'GOV8' => '',
                'total'=> ''
                );
            }
        return $array;
    }

    public function get_par()
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, label, COUNT(criteria.id_criteria) AS jumlah, 
        SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS PAR1, 
           SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS PAR2, 
           SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS PAR3, 
           SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS PAR4,  
           SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS PAR5, 
           SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS PAR6
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=4 
           GROUP BY respondent;")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;

                    //proses hitung GOV1
                    $label = $row['label'];
                    $ht1 = ($row['PAR1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung PAR2
                    $ht2 = ($row['PAR2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung PAR3
                    $ht3 = ($row['PAR3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung PAR4
                    $ht4 = ($row['PAR4'] + $ht4);
                    $total4 = ($ht4/$jumlah);

                    //proses hitung PAR5
                    $ht5 = ($row['PAR5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    //proses hitung PAR6
                    $ht6 = ($row['PAR6'] + $ht6);
                    $total6 = ($ht6/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total4, $total5, $total6]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);
                $array[] =array(
                'label' => $label,
                'PAR1'  =>  number_format($total1, 2),
                'PAR2'  =>  number_format($total2, 2),
                'PAR3'  =>  number_format($total3, 2),
                'PAR4'  =>  number_format($total4, 2),
                'PAR5'  =>  number_format($total5, 2),
                'PAR6'  =>  number_format($total6, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'PAR1' => '',
                'PAR2' => '',
                'PAR3' => '',
                'PAR4' => '',
                'PAR5' => '',
                'PAR6' => '',
                'total'=> ''
                );
            }
        return $array;
    }

    public function get_sar()
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, COUNT(criteria.id_criteria) AS jumlah,
        SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS SAR1, 
           SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS SAR2, 
           SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS SAR3, 
           SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS SAR4,  
           SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS SAR5
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=5 
           GROUP BY respondent;")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;

                    //proses hitung GOV1
                    $label = $row['label'];
                    $ht1 = ($row['SAR1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung SAR2
                    $ht2 = ($row['SAR2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung SAR3
                    $ht3 = ($row['SAR3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung SAR4
                    $ht4 = ($row['SAR4'] + $ht4);
                    $total4 = ($ht4/$jumlah);

                    //proses hitung SAR5
                    $ht5 = ($row['SAR5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total4, $total5]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);
                $array[] =array(
                'label' => $label,
                'SAR1'  =>  number_format($total1, 2),
                'SAR2'  =>  number_format($total2, 2),
                'SAR3'  =>  number_format($total3, 2),
                'SAR4'  =>  number_format($total4, 2),
                'SAR5'  =>  number_format($total5, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'SAR1' => '',
                'SAR2' => '',
                'SAR3' => '',
                'SAR4' => '',
                'SAR5' => '',
                'total'=> ''
                );
            }
        return $array;
    }

    public function get_ski()
    {
        $query1 = $this->db->query("SELECT username AS respondent, label, COUNT(criteria.id_criteria) AS jumlah,
        SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS SKI1, 
           SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS SKI2, 
           SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS SKI3, 
           SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS SKI4,  
           SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS SKI5,
           SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS SKI6,
            SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS SKI7
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=6 
           GROUP BY respondent;")->result_array();

            $ht1 =0;
            $ht2 =0;
            $ht3 =0;
            $ht4 =0;
            $ht5 =0;
            $ht6 =0;
            $ht7 =0;
            $jumlah =0;
            if($query1!=null){
                foreach($query1 as $loop => $row )
                {
                    $jumlah++;

                    //proses hitung GOV1
                    $label = $row['label'];
                    $ht1 = ($row['SKI1'] + $ht1);
                    $total1 = ($ht1/$jumlah);

                    //proses hitung SKI2
                    $ht2 = ($row['SKI2'] + $ht2);
                    $total2 = ($ht2/$jumlah);

                    //proses hitung SKI3
                    $ht3 = ($row['SKI3'] + $ht3);
                    $total3 =($ht3/$jumlah);

                    //proses hitung SKI4
                    $ht4 = ($row['SKI4'] + $ht4);
                    $total4 = ($ht4/$jumlah);

                    //proses hitung SKI5
                    $ht5 = ($row['SKI5'] + $ht5);
                    $total5 = ($ht5/$jumlah);

                    //proses hitung SKI6
                    $ht6 = ($row['SKI6'] + $ht6);
                    $total6 = ($ht6/$jumlah);

                    //proses hitung SKI6
                    $ht7 = ($row['SKI7'] + $ht7);
                    $total7 = ($ht7/$jumlah);

                    $all       = array_sum([$total1, $total2, $total3, $total4, $total5, $total6, $total7]);
                    $count     = $row['jumlah'];
                }

                $total_all = number_format($all / $count, 2);
                $array[] =array(
                'label' => $label,
                'SKI1'  =>  number_format($total1, 2),
                'SKI2'  =>  number_format($total2, 2),
                'SKI3'  =>  number_format($total3, 2),
                'SKI4'  =>  number_format($total4, 2),
                'SKI5'  =>  number_format($total5, 2),
                'SKI6'  =>  number_format($total6, 2),
                'SKI7'  =>  number_format($total7, 2),
                'total' => $total_all
                );
            }else{
            $array[] =array(
                'label' => '-',
                'SKI1' => '',
                'SKI2' => '',
                'SKI3' => '',
                'SKI4' => '',
                'SKI5' => '',
                'SKI6' => '',
                'SKI7' => '',
                'total'=> ''
                );
            }
        return $array;
    }


    public function get_options($id)
    {
        $query =  $this->db->query("SELECT options.id_user, username 
        AS respondent, 
        SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
        SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
        SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
        SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
        SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
        SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6, 
        SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
        SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
        SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
        SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
        SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
        SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
        SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
        SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14, 
        SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS quesioner15, 
        SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS quesioner16, 
        SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS quesioner17, 
        SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS quesioner18, 
        SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS quesioner19, 
        SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS quesioner20, 
        SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS quesioner21, 
        SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS quesioner22, 
        SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS quesioner23, 
        SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS quesioner24, 
        SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS quesioner25, 
        SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS quesioner26, 
        SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS quesioner27,
        SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS quesioner28, 
        SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS quesioner29, 
        SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS quesioner30, 
        SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS quesioner31, 
        SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS quesioner32, 
        SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS quesioner33, 
        SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS quesioner34, 
        SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS quesioner35, 
        SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS quesioner36, 
        SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS quesioner37, 
        SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS quesioner38, 
        SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS quesioner39
        FROM options 
        JOIN users ON options.id_user=users.id_user 
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner 
        JOIN planning ON planning.id_planning=kuesioner.id_planning
        WHERE kuesioner.id_planning=$id
        GROUP BY respondent;
            ");
            return $query->result_array();
    }

    public function get_criteria1($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
        SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=1 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
     if($query!=null){
         foreach($query as $loop => $row )
         {
             $jumlah++;
    
             //proses hitung
             $label = $row['label'];
             $ht1 = ($row['rata_rata'] + $ht1);
             $total = $ht1/$jumlah;
         }
         $array[] =array(
            'label' => $label,
            'total' => $total
         );
     }else{
        $array[] =array(
            'label' => '-',
            'total' => '0'
         );
     }
        return $array;
    }

    public function get_criteria2($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
      
           SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
        --    SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=2 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
     if($query!=null){
        foreach($query as $loop => $row )
        {
            $jumlah++;
   
            //proses hitung
            $label = $row['label'];
            $ht1 = ($row['rata_rata'] + $ht1);
            $total = $ht1/$jumlah;
        }
        $array[] =array(
           'label' => $label,
           'total' => $total
        );
    }else{
       $array[] =array(
           'label' => '-',
           'total' => '0'
        );
    }
       return $array;
        return $array;
    }
    public function get_criteria3($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
         SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6, 
           SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
           SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14, 
           SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS quesioner15, 
           SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS quesioner16, 
           SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS quesioner17, 
           SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS quesioner18, 
           SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS quesioner19, 
           SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS quesioner20, 
           SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS quesioner21, 
           SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS quesioner22, 
           SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS quesioner23, 
           SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS quesioner24, 
           SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS quesioner25, 
           SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS quesioner26, 
           SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS quesioner27,
           SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS quesioner28, 
           SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS quesioner29, 
           SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS quesioner30, 
           SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS quesioner31, 
           SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS quesioner32, 
           SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS quesioner33, 
           SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS quesioner34, 
           SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS quesioner35, 
           SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS quesioner36, 
           SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS quesioner37, 
           SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS quesioner38, 
           SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS quesioner39
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=3 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
    if($query!=null){
         foreach($query as $loop => $row )
         {
             $jumlah++;
    
             //proses hitung
             $label = $row['label'];
             $ht1 = ($row['rata_rata'] + $ht1);
             $total = $ht1/$jumlah;
         }
         $array[] =array(
            'label' => $label,
            'total' => $total
         );
     }else{
        $array[] =array(
            'label' => '-',
            'total' => '0'
         );
     }
        return $array;
    }

    public function get_criteria4($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
         SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6, 
           SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
           SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14, 
           SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS quesioner15, 
           SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS quesioner16, 
           SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS quesioner17, 
           SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS quesioner18, 
           SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS quesioner19, 
           SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS quesioner20, 
           SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS quesioner21, 
           SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS quesioner22, 
           SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS quesioner23, 
           SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS quesioner24, 
           SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS quesioner25, 
           SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS quesioner26, 
           SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS quesioner27,
           SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS quesioner28, 
           SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS quesioner29, 
           SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS quesioner30, 
           SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS quesioner31, 
           SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS quesioner32, 
           SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS quesioner33, 
           SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS quesioner34, 
           SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS quesioner35, 
           SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS quesioner36, 
           SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS quesioner37, 
           SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS quesioner38, 
           SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS quesioner39
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=4 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
     if($query!=null){
         foreach($query as $loop => $row )
         {
             $jumlah++;
    
             //proses hitung
             $label = $row['label'];
             $ht1 = ($row['rata_rata'] + $ht1);
             $total = $ht1/$jumlah;
         }
         $array[] =array(
            'label' => $label,
            'total' => $total
         );
     }else{
        $array[] =array(
            'label' => '-',
            'total' => '0'
         );
     }
        return $array;
    }
    public function get_criteria5($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
         SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6, 
           SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
           SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14, 
           SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS quesioner15, 
           SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS quesioner16, 
           SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS quesioner17, 
           SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS quesioner18, 
           SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS quesioner19, 
           SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS quesioner20, 
           SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS quesioner21, 
           SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS quesioner22, 
           SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS quesioner23, 
           SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS quesioner24, 
           SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS quesioner25, 
           SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS quesioner26, 
           SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS quesioner27,
           SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS quesioner28, 
           SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS quesioner29, 
           SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS quesioner30, 
           SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS quesioner31, 
           SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS quesioner32, 
           SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS quesioner33, 
           SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS quesioner34, 
           SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS quesioner35, 
           SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS quesioner36, 
           SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS quesioner37, 
           SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS quesioner38, 
           SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS quesioner39
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=5 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
     if($query!=null){
        foreach($query as $loop => $row )
        {
            $jumlah++;
   
            //proses hitung
            $label = $row['label'];
            $ht1 = ($row['rata_rata'] + $ht1);
            $total = $ht1/$jumlah;
        }
        $array[] =array(
           'label' => $label,
           'total' => $total
        );
    }else{
       $array[] =array(
           'label' => '-',
           'total' => '0'
        );
    }
        return $array;
    }
    public function get_criteria6($id)
    {
        $query = $this->db->query("SELECT username AS respondent, AVG(options) AS rata_rata, label, 
         SUM(CASE WHEN options.id_kuesioner = '1' THEN options ELSE 0 END) AS quesioner1, 
           SUM(CASE WHEN options.id_kuesioner = '2' THEN options ELSE 0 END) AS quesioner2, 
           SUM(CASE WHEN options.id_kuesioner = '3' THEN options ELSE 0 END) AS quesioner3, 
           SUM(CASE WHEN options.id_kuesioner = '4' THEN options ELSE 0 END) AS quesioner4, 
           SUM(CASE WHEN options.id_kuesioner = '5' THEN options ELSE 0 END) AS quesioner5, 
           SUM(CASE WHEN options.id_kuesioner = '6' THEN options ELSE 0 END) AS quesioner6, 
           SUM(CASE WHEN options.id_kuesioner = '7' THEN options ELSE 0 END) AS quesioner7, 
           SUM(CASE WHEN options.id_kuesioner = '8' THEN options ELSE 0 END) AS quesioner8, 
           SUM(CASE WHEN options.id_kuesioner = '9' THEN options ELSE 0 END) AS quesioner9, 
           SUM(CASE WHEN options.id_kuesioner = '10' THEN options ELSE 0 END) AS quesioner10, 
           SUM(CASE WHEN options.id_kuesioner = '11' THEN options ELSE 0 END) AS quesioner11, 
           SUM(CASE WHEN options.id_kuesioner = '12' THEN options ELSE 0 END) AS quesioner12, 
           SUM(CASE WHEN options.id_kuesioner = '13' THEN options ELSE 0 END) AS quesioner13, 
           SUM(CASE WHEN options.id_kuesioner = '14' THEN options ELSE 0 END) AS quesioner14, 
           SUM(CASE WHEN options.id_kuesioner = '15' THEN options ELSE 0 END) AS quesioner15, 
           SUM(CASE WHEN options.id_kuesioner = '16' THEN options ELSE 0 END) AS quesioner16, 
           SUM(CASE WHEN options.id_kuesioner = '17' THEN options ELSE 0 END) AS quesioner17, 
           SUM(CASE WHEN options.id_kuesioner = '18' THEN options ELSE 0 END) AS quesioner18, 
           SUM(CASE WHEN options.id_kuesioner = '19' THEN options ELSE 0 END) AS quesioner19, 
           SUM(CASE WHEN options.id_kuesioner = '20' THEN options ELSE 0 END) AS quesioner20, 
           SUM(CASE WHEN options.id_kuesioner = '21' THEN options ELSE 0 END) AS quesioner21, 
           SUM(CASE WHEN options.id_kuesioner = '22' THEN options ELSE 0 END) AS quesioner22, 
           SUM(CASE WHEN options.id_kuesioner = '23' THEN options ELSE 0 END) AS quesioner23, 
           SUM(CASE WHEN options.id_kuesioner = '24' THEN options ELSE 0 END) AS quesioner24, 
           SUM(CASE WHEN options.id_kuesioner = '25' THEN options ELSE 0 END) AS quesioner25, 
           SUM(CASE WHEN options.id_kuesioner = '26' THEN options ELSE 0 END) AS quesioner26, 
           SUM(CASE WHEN options.id_kuesioner = '27' THEN options ELSE 0 END) AS quesioner27,
           SUM(CASE WHEN options.id_kuesioner = '28' THEN options ELSE 0 END) AS quesioner28, 
           SUM(CASE WHEN options.id_kuesioner = '29' THEN options ELSE 0 END) AS quesioner29, 
           SUM(CASE WHEN options.id_kuesioner = '30' THEN options ELSE 0 END) AS quesioner30, 
           SUM(CASE WHEN options.id_kuesioner = '31' THEN options ELSE 0 END) AS quesioner31, 
           SUM(CASE WHEN options.id_kuesioner = '32' THEN options ELSE 0 END) AS quesioner32, 
           SUM(CASE WHEN options.id_kuesioner = '33' THEN options ELSE 0 END) AS quesioner33, 
           SUM(CASE WHEN options.id_kuesioner = '34' THEN options ELSE 0 END) AS quesioner34, 
           SUM(CASE WHEN options.id_kuesioner = '35' THEN options ELSE 0 END) AS quesioner35, 
           SUM(CASE WHEN options.id_kuesioner = '36' THEN options ELSE 0 END) AS quesioner36, 
           SUM(CASE WHEN options.id_kuesioner = '37' THEN options ELSE 0 END) AS quesioner37, 
           SUM(CASE WHEN options.id_kuesioner = '38' THEN options ELSE 0 END) AS quesioner38, 
           SUM(CASE WHEN options.id_kuesioner = '39' THEN options ELSE 0 END) AS quesioner39
        FROM options
        JOIN kuesioner ON options.id_kuesioner=kuesioner.id_kuesioner
           JOIN criteria ON kuesioner.id_criteria=criteria.id_criteria
           JOIN planning ON planning.id_planning=kuesioner.id_planning
           JOIN users ON options.id_user=users.id_user 
           WHERE kuesioner.id_criteria=6 AND kuesioner.id_planning=$id
           GROUP BY respondent;
     ")->result_array();

     $ht1 =0;
     $jumlah =0;
     if($query!=null){
        foreach($query as $loop => $row )
        {
            $jumlah++;
   
            //proses hitung
            $label = $row['label'];
            $ht1 = ($row['rata_rata'] + $ht1);
            $total = $ht1/$jumlah;
        }
        $array[] =array(
           'label' => $label,
           'total' => $total
        );
    }else{
       $array[] =array(
           'label' => '-',
           'total' => '0'
        );
    }
        return $array;
    }
 

}