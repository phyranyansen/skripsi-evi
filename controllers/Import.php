<?php
defined('BASEPATH') or exit('No direct script access allowed');

//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
// require_once 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Import extends CI_Controller
{

    
    public function index()
    {
        //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls'; //siapkan format file
            $config['file_name']        = 'doc' . time(); //rename file yang diupload

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                //fetch data upload
                $file   = $this->upload->data();

                // $reader = ReaderEntityFactory::createReaderFromFile('./temp_doc/');
                $reader = ReaderEntityFactory::createXLSXReader(); //buat xlsx reader
                $reader->open('./temp_doc/' . $file['file_name']); //open file xlsx yang baru saja diunggah

                //looping pembacaat sheet dalam file        
                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;

                    //siapkan variabel array kosong untuk menampung variabel array data
                    $save   = array();

                    //looping pembacaan row dalam sheet
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {
                            //ambil cell
                            $cells = $row->getCells();

                            $data = array(
                                'id_kuesioner'           => $cells[0],
                                'label_kuesioner'        => $cells[1],
                                'question1'              => $cells[2],
                                'question2'              => $cells[3],
                                'question3'              => $cells[4],
                                'question4'              => $cells[5],
                                'question5'              => $cells[6],
                                'id_criteria'            => $cells[7],
                                'id_planning'            => $_POST['id_planning']
                            );

                            //tambahkan array $data ke $save
                            array_push($save, $data);
                        }

                        $numRow++;
                    }
                    //simpan data ke database
                    $this->AdminModels->simpan($save);

                    //tutup spout reader
                    $reader->close();

                    //hapus file yang sudah diupload
                    unlink('temp_doc/' . $file['file_name']);

                    //tampilkan pesan success dan redirect ulang ke index controller import
                    echo    '<script type="text/javascript">
                               alert(\'Data berhasil disimpan\');
                               window.location.replace("' . base_url('kuesioner') . '");
                           </script>';
                }
            } else {
                echo "Error :" . $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                echo    '<script type="text/javascript">
                alert(\'Error data gagal diupload!\');
                window.location.replace("' . base_url('kuesioner') . '");
            </script>';
            }
        }

        
    }


  
}
