


     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url().'assets/bootstrap2/dist/img/user.png';?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $this->session->userdata('username') ?></h3>

                <p class="text-muted text-center"><?= $this->session->userdata('status');?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username</b><span style="padding-left: 20px;">:</span> <a class="float"><?= $this->session->userdata('username');?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Password</b><span style="padding-left: 20px;">:</span><a class="float"> <?= $this->session->userdata('password'); ?></a>
                  </li>
                    <?php if($get_respondent>0) { ?>
                  <li class="list-group-item">
                    <b>Division</b><span style="padding-left: 30px;">:</span><a class="float"> <?= $get_respondent['jabatan']; ?></a>
                  </li>
                  <?php }else{ ?>
                    <li class="list-group-item">
                      <b>Division</b><span style="padding-left: 30px;">:</span><a class="float"> -</a>
                    </li>

                    <?php } ?>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Change </b><i class="fa fa-pen"></i></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <?php if($get_respondent>0) { ?>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <?php }else{ ?>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings <span class="badge badge-warning right">3</span></a></li>

                    <?php } ?>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <?php
                 
                    foreach($planning as $row)
                    {
                        if($row['status']=='Submitted!')
                        {
                  ?>
                  <!-- Post -->
                  <div class="post">
                      <div class="alert alert-dismissible alert-info" style="background-color: darkturquoise;">
                        <div class="user-block" style="height: 50px;">
                          <span class="username">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           </span>
                           <table style="height: 60px;">
                            <tbody>
                              <tr>
                                <td>
                                  <b class="float-left" style="color: white;">Thank You!</b>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                <span style="float: left; font-size: small;">
                                  <p style="color: white;">Survey has been submitted!</p></span>
                                </td>
                              </tr>
                            </tbody>
                           </table>
                        </div>
                         <!-- /.user-block -->
                         <p style="color: white;">
                          Terimakasih atas partisipasi Anda telah meluangkan waktu untuk mengisi survey kami!
                          <a href="<?= base_url().'home'; ?>" class="small-box-footer"><i class="fas fa-check-circle"  style="color: green;"></i></a>
                        </p>
                        <br>

                      </div>
                      </div>
                      

                   <?php }else{ 
                            if (mdate($wakturealtime) >= $row['session_date'])
                            { 
                        ?>
                    

                 <?php  }else{ ?>
                   <!-- Post -->
                      <div class="post">
                          <div class="alert alert-dismissible alert-info" style="background-color: cadetblue;">
                            <div class="user-block" style="height: 50px;">
                              <span class="username">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              </span>
                              <table style="height: 60px;">
                                <tbody>
                                  <tr>
                                    <td>
                                      <b class="float-left" style="color: white;"><?= $row['planning']; ?></b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <span style="float: left; font-size: small;">
                                      <p style="color: white;">Session date - <?= date('d M Y', strtotime($row['session_date'])); ?></p></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.user-block -->
                                <p style="color: white;">
                                <?= $row['description'];
                                if($get_respondent>0){ 
                                ?>
                                <a href="<?= base_url().'survey/'.base64_encode($row['idPlann']); ?>" class="small-box-footer" style="color:aquamarine"> Submit <i class="fas fa-arrow-circle-right"  style="color: white;"></i></a>
                                <?php }else{ ?>
                                  <a class="small-box-footer" style="color:aquamarine"> Submit <i class="fas fa-arrow-circle-right"  style="color: white;"></i></a>
                            <?php } ?>
                            </p>
                            <br>

                          </div>
                          </div>

               <?php  } } }  ?>


                    </div>
                    <!-- /.post -->


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form action="<?= base_url().'home' ?>" method="POST" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="<?= $this->session->userdata('username'); ?>" id="inputName" placeholder="Userame">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                        <?php if($get_respondent>0) { ?>
                          <input type="text" class="form-control" name="fullname" value="<?= $get_respondent['nama_lengkap']; ?>" id="inputName" placeholder="Fullame">
                          <?php }else{ ?>
                            <input type="text" class="form-control" name="fullname" id="inputName" placeholder="Fullame">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password" id="inputSkills" value="<?= $this->session->userdata('password'); ?>" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                           <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                           <div class="select2-purple col-sm-10">
                             <select class="form-control select2" name="jenis_kelamin" multiple="multiple" style="width: 100%;">
                             <?php 
                             
                             if($get_respondent!=null) { ?>
                             <option>Laki-laki</option>
                             <option>Perempuan</option>
                              <?php
                              if($get_respondent['jenis_kelamin']=="Laki-laki"){ ?>
                                  <option selected>Laki-laki</option>
                              <?php }elseif($get_respondent['jenis_kelamin']=="Perempuan"){ ?>
                                <option selected>Perempuan</option>
                                  <?php }else ?>
                                  
                               
                             <?php  }else{ ?>
                              <option>Laki-laki</option>
                              <option>Perempuan</option>
                              <?php }?>
                             </select>
                           </div>
                         </div>
                      <div class="form-group row">
                           <label class="col-sm-2 col-form-label">Division</label>
                           <div class="select2-purple col-sm-10">
                             <select class="form-control select2" name="division" multiple="multiple" style="width: 100%;">
                             <?php 
                             foreach($division as $row)
                             {
                             if($get_respondent!=null) { ?>
                             <option value="<?=$row['id_division'] ?>"><?=$row['division'] ?></option>
                              <?php
                              if($get_respondent['jabatan']==$row['division']){ ?>
                                  <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                              <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                              <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                              <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                                <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                  <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                                <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                  <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                                <?php }elseif($get_respondent['jabatan']==$row['id_division']){ ?>
                                  <option value="<?=$row['id_division'] ?>" selected><?=$get_respondent['jabatan'] ?></option>
                                  <?php }else ?>
                                  
                               
                             <?php  }else{ ?>
                              <option value="<?=$row['id_division'] ?>"><?=$row['division'] ?></option>
                              <?php } }?>
                             </select>
                           </div>
                         </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                            <?php if($get_respondent>0) { ?>
                              <input type="checkbox" checked> I agree to the <a href="#">terms and conditions</a>
                              <?php }else{ ?>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                             <?php } ?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

