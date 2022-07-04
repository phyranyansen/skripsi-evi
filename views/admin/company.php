 <!-- Main content -->
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Criteria List</h3>
                         <div class="d-flex justify-content-end">
                             <div class="btn btn-primary"><a class="fa fa-plus" style="color: white;"
                                     class="btn btn-default" data-toggle="modal" data-target="#modal-sm"> Add</a></div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table id="example2" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th style="text-align:center; width: 50px;">#</th>
                                     <th>Company Name</th>
                                     <th style="text-align: center; width: 200px;">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                $id=1;
                foreach($company as $row)
                {
                ?>
                                 <tr>
                                     <td style="text-align:center ;"><?= $id++; ?>.</td>
                                     <td><?= $row['company_name'];?></td>
                                     <td style="text-align: center;">
                                         <div class="btn btn-info"><a data-toggle="modal"
                                                 data-target="#modalUpdate<?= $row['id_company'];?>-sm"
                                                 style="color: white;"><i class="fa fa-edit"></i></a></div>
                                         <?= anchor('Admin/delete_company/'
                                    .$row['id_company'], '<button class="btn btn-danger"><i
                                    class="fa fa-trash" style="color: white;"></i></a>') ?>
                                     </td>
                                 </tr>
                                 <?php } ?>
                             </tbody>
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
 <div class="modal fade" id="modal-success">
     <div class="modal-dialog">
         <div class="modal-content bg-success">
             <div class="modal-header">
                 <h4 class="modal-title">Success Modal</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>One fine body&hellip;</p>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-outline-light">Save changes</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <div class="modal fade" id="modal-sm">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title">Add Company</p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url().'company'; ?>" method="post">
                     <div class="form-group">
                         <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <!-- hiddengem -->
                 <input type="hidden" name="add_hidden" value="add-whatever">
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <!-- Updatemodal -->
 <?php foreach($company as $row) {?>
 <div class="modal fade" id="modalUpdate<?= $row['id_company'];?>-sm">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title">Update Company</p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url().'company'; ?>" method="post">
                     <div class="form-group">
                         <input type="text" name="company_name" class="form-control"
                             value="<?= $row['company_name'];?>">
                         <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                     </div>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <!-- hiddengem -->
                 <input type="hidden" name="update_hidden" value="update-whatever">
                 <input type="hidden" name="id" class="form-control" value="<?=$row['id_company'] ?>">
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <?php } ?>
 <!-- /.Updatemodal -->