<!-- Main content -->
<section class="content">
      <div class="container-fluid">

      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quesioner Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open_multipart('import'); ?>
              <!-- <form id="quickForm" method="POST" action="<?= base_url().''; ?> " enctype="multipart/form-data">  -->
                <div class="card-body">
                  <div class="form-group col-md-6">
                           <label>Project</label>
                           <div class="select2-purple">
                             <select class="select2" name="id_planning" multiple="multiple" data-placeholder="Select a planning" data-dropdown-css-class="select2-purple" style="width: 100%;">
                             <?php
                          foreach($project as $row)
                          {

                            ?>
                             <option value="<?= $row['id_planning'] ?>"><?= $row['planning']; ?></option>

                          <?php } ?>
                             </select>
                           </div>
                         </div>
                    <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                     <div class="form-group col-md-6">
                      <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="excel"  class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div> 
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="upload" class="btn btn-primary">Submit</button>
                  <div class="btn btn-warning"><a href="<?= base_url().'quesioner'; ?>" style="color:white ;">Cancel</a></div>
                </div>
                <?= form_close(); ?>
               <!-- </form> -->
            </div>
            <!-- /.card -->
          
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->