<!-- Main content -->
<section class="content">
      <div class="container-fluid">

      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Planning Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?= base_url().''; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Planning</label>
                    <input type="text" name="planning" class="form-control" placeholder="Enter project name">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                  </div>
                  <div class="form-group">
                           <label>Company</label>
                           <div class="select2-purple">
                             <select class="select2" name="company" multiple="multiple" data-placeholder="Select a Company" data-dropdown-css-class="select2-purple" style="width: 100%;">
                             <?php
                          foreach($company as $row)
                          {

                            ?>
                             <option><?= $row['company_name']; ?></option>

                          <?php } ?>
                             </select>
                           </div>
                         </div>
                       
                   <!-- textarea -->
                   <div class="form-group">
                           <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    <div class="row col-md-8">
                    <label for="exampleInput">Session</label>
                    <div class="col-md-3">
                      <div class="form-group" style="width: 150px;">
                        <input type="date" name="session1" class="form-control" id="birthday">
                      </div>
                    </div>
                    <p style="padding-left: 8.0; padding-right: 8.0;">To</p>
                    <div class="col-md-3">
                      <div class="form-group" style="width: 150px;">
                        <input type="date" name="session2" class="form-control">
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <div class="btn btn-warning"><a href="<?= base_url().'plan'; ?>" style="color:white ;">Cancel</a></div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->