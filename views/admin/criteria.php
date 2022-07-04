 <!-- Main content -->

 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <?= $this->session->flashdata('pesan'); ?>
                         <div class="d-flex justify-content-end">
                             <div class="btn btn-primary"><a class="fa fa-plus" style="color: white;"
                                     data-toggle="modal" data-target="#modal-sm"> Add</a></div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table id="example2" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th style="text-align:center ;">#</th>
                                     <th>Criteria Name</th>
                                     <th>Criteria Label</th>
                                     <th style="text-align: center;">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                $id=1;
                foreach($criteria as $row)
                {
                ?>
                                 <tr>
                                     <td style="text-align:center ;"><?= $id++; ?>.</td>
                                     <td><?= $row['criteria_name'];?></td>
                                     <td><?= $row['label'];?></td>
                                     <td style="text-align: center;">
                                         <div class="btn btn-info"><a data-toggle="modal"
                                                 data-target="#modalUpdate<?= $row['id_criteria'];?>-sm"
                                                 style="color: white;"><i class="fa fa-edit"></i></a></div>
                                         <?= anchor('Admin/delete_criteria/'
                                    .$row['id_criteria'], '<button class="btn btn-danger"><i
                                    class="fa fa-trash" style="color: white;"></i></a>') ?>
                                     </td>
                                 </tr>
                                 <?php } ?>
                             </tbody>
                             <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                         </table>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>

         </div>
         <!-- /.row -->
     </div>
 </section>
 <!-- /.content -->

 <div class="modal fade" id="modal-sm">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title">Add Criteria</p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url().'criteria'; ?>" method="post">
                     <div class="form-group">
                         <label for="exampleInput">Name</label>
                         <input type="text" name="criteria" class="form-control" placeholder="Enter Criteria name">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
                     <div class="form-group">
                         <label for="exampleInput">Label</label>
                         <input type="text" name="label" class="form-control" placeholder="Enter Label">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Close</button>
                 <!-- hiddengem -->
                 <input type="hidden" name="add_hidden" value="add-whatever">

                 <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <!-- .Updatemodal -->
 <?php foreach($criteria as $row)
{?>
 <div class="modal fade" id="modalUpdate<?= $row['id_criteria'];?>-sm">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title">Update Criteria</p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url().'criteria'; ?>" method="post">
                     <div class="form-group">
                         <label for="exampleInput">Name</label>
                         <input type="text" name="criteria" class="form-control" value="<?= $row['criteria_name'];?>">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
                     <div class="form-group">
                         <label for="exampleInput">Label</label>
                         <input type="text" name="label" class="form-control" value="<?= $row['criteria_name'];?>">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Close</button>
                 <!-- hiddengem -->
                 <input type="hidden" name="update_hidden" value="update-whatever">
                 <input type="hidden" name="id" class="form-control" value="<?=$row['id_criteria'] ?>">
                 <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <?php } ?>
 <!-- /.modal -->