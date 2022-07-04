 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="row">
      <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title p-2" >Survey : </h3>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <section class="content">
                <div class="row">
                <div class="col-md-12">
                <div class="box">
                <form action="<?= base_url().'survey-submit'; ?>"  method="post">  
                <div class="box-body">
                <table id="example2">
                  <thead>
                    
                  </thead>
                    <?php
                    // $no = $this->uri->segment('3') + 1;
                    $no =1;
                    $option=0;
                    $jum=1;
                    foreach($survey as $row)
                    {
                    $option++;
                    ?>
                    <tbody>
                        <tr">
                            <td><input type="hidden" name="id_planning" value="<?= $row->id_planning; ?>"> <p style="font-weight: bold ;"><?= $no++; ?>.</p> <input type="hidden" name="jumlah" value="<?= $jum++; ?>"> </td>
                            <td><input type="hidden" name="id_kuesioner[]" value="<?= $row->id_kuesioner;?>"><p style="font-weight: bold ;"><?= $row->label_kuesioner; ?></p></td>
                           
                            <tr>
                                <td style="padding-left: 20px;"> A.</td>
                                <td style="padding-left: 20px;"><input type="radio" name="option<?=$option?>" value="1"> <?= $row->question1; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px;">B.</td>
                                <td style="padding-left: 20px;"><input type="radio" name="option<?=$option?>" value="2"> <?= $row->question2; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px;">C.</td>
                                <td style="padding-left: 20px;"><input type="radio" name="option<?=$option?>" value="3"> <?= $row->question3; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px;">D.</td>
                                <td style="padding-left: 20px;"><input type="radio" name="option<?=$option?>" value="4"> <?= $row->question4; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px; ">E.</td>
                                <td style="padding-left: 20px;"><input type="radio" name="option<?=$option?>" value="5"> <?= $row->question5; ?></td>
                            </tr>
                            <!-- <tr>A.</tr> -->
                        </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
                
                <div class="box-footer clearfix">
                    
                </div>
                <div  style="padding-top: 110px;"></div>
             <div class="card-footer">
               <div class="d-flex justify-content-end">
                 <button type="submit" class="btn btn-primary">Submit</button>
               </div>
                    <!-- <?php
                    if($pagination==$cek)
                    {
                    ?>
                   <div class="col-md-3">
                          
                           <?= $this->pagination->create_links(); ?>
                       </div>
                
                   <?php }else{
                    ?>

                      <div class="col-md-3">
                           <?= $this->pagination->create_links(); ?>
                       </div>
                 <?php  } ?> -->
             </div>
             </form>
                </div>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col-md-12 -->
          
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
    <!-- <script src="https://pagination.js.org/dist/2.1.5/pagination.min.js">
    $('#demo').pagination({
        dataSource: [1, 2, 3, 4, 5, 6, 7],
        callback: function(data, pagination) {
            // template method of yourself
            var html = template(data);
            dataContainer.html(html);
        }})

    </script> -->

