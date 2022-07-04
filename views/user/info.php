<!-- Main content -->
<section class="content">
      <div class="container-fluid">

      <div class="row">
      <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title p-2" >Survey :</h3>
               
              </div>
              <div class="card-body">
              <table class="table table-sm col-md-8">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th colspan="5">Task</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $id =1;
                  foreach($info as $row)
                  {
                        if($row['id_planning']!=$cek['plann'])
                        {
                          $lastday1 = date('d M Y', strtotime('-1 day', strtotime($row['session_date'])));
                          $lastday2 = date('d M Y', strtotime('-2 day', strtotime($row['session_date'])));
                          $lastday3 = date('d M Y', strtotime('-3 day', strtotime($row['session_date'])));
                          $now      = date('d M Y');
                          $now1     = date('d M Y', strtotime('+1 day'));
                          $now2     = date('d M Y', strtotime('+2 day'));
                          $now3     = date('d M Y', strtotime('+3 day'));
                          $nextweek = date('d M Y', strtotime('+7 day', strtotime($row['session_date'])));
                          if($now1==$lastday1 || $now2==$lastday2 || $now3==$lastday3)
                          {
                    ?>
                     <tr style="color:coral">
                      <td><?= $id++; ?>.</td>
                      <td><?= $row['planning']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td><?= date('d M Y', strtotime($row['session_date'])); ?></td>
                      <td>limit times</td>
                      <td><a href="<?= base_url().'survey'; ?>">Click <i class="fas fa-arrow-circle-right"></i></a></td>
                    </tr>
                       
                    <?php }else if($now>$row['session_date']){ ?>
                      <tr>
                      <td><?= $id++; ?>.</td>
                      <td><?= $row['planning']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td> <?= date('d M Y', strtotime($row['session_date'])); ?></td>
                      <td>Expired</td>
                      <td>Click <i class="fas fa-arrow-circle-right"></i></td>
                    </tr>
                    <?php }else{ ?>
                      <tr>
                      <td><?= $id++; ?>.</td>
                      <td><?= $row['planning']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td> <?= date('d M Y', strtotime($row['session_date'])); ?></td>
                      <td><a href="<?= base_url().'survey'; ?>">Click <i class="fas fa-arrow-circle-right"></i></a></td>
                    </tr>
                   <?php }
                  }else{
                             
                        ?>
                    <tr style="color: cadetblue;">
                      <td><?= $id++; ?>.</td>
                      <td><?= $row['planning']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td> <?= date('d M Y', strtotime($row['session_date'])); ?></td>
                      <td><p style="font-weight: 100;"><span style="color: green;"><i class="fas fa-check-circle"></i></span> submitted</p></td>
                    </tr>

                   <?php } }?>
                  </tbody>
                 
                </table>
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