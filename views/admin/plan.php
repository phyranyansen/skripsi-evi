<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary"><a class="fa fa-plus" style="color: white;" data-toggle="modal"
                                    data-target="#modal-lg"> Add</a></div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th style="overflow: hidden;">Description</th>
                                    <th style="text-align: center;">Session</th>
                                    <th>Company</th>
                                    <th>Created By</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                  $id =1;
                    foreach($plan as $row)
                    {
                    ?>
                                <tr>
                                    <td><?= $id++; ?>.</td>
                                    <td><?= $row['planning']; ?></td>
                                    <td style="width: 150px; overflow: hidden;"><?= $row['description']; ?></td>
                                    <td style="width: 180px;"><?= $row['created_date'];?> - <?= $row['session_date']; ?>
                                    </td>

                                    <td><?= $row['company_name'];?></td>
                                    <td><?= $row['username'];?></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger">65%</span></td>
                                    <td style="text-align: center;">
                                    <div class="btn btn-info"><a data-toggle="modal" data-target="#modalUpdate<?= $row['id_planning'];?>-lg" 
                                     style="color: white;"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="btn btn-info"><a href="<?= base_url('hasil-survey/').$row['id_planning'];?>"
                                                style="color: white;"><i class="fa fa-eye"></i></a></div>
                                        <?= anchor('Admin/delete_plan/'
                                    .$row['id_planning'], '<button class="btn btn-danger"><i
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
            <!-- /.col-md-12 -->

        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->


<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Planning</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="quickForm" action="<?= base_url().'plan'; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInput">Planning</label>
                        <input type="text" name="planning" class="form-control" placeholder="Enter project name">
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <div class="select2-purple">
                            <select class="select2" name="id_company" multiple="multiple"
                                data-placeholder="Select a Company" data-dropdown-css-class="select2-purple"
                                style="width: 100%;">
                                <?php
                              foreach($company as $row)
                              {
                             ?>
                                <option value="<?= $row['id_company'];?>"><?= $row['company_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="row col-md-8">
                        <label for="exampleInput">Session</label>
                        <div class="col-md-3">
                            <div class="form-group" style="width: 150px;">
                                <input type="date" name="created_date" class="form-control" id="birthday">
                            </div>
                        </div>
                        <p style="margin-left: 10%">To</p>
                        <div class="col-md-3">
                            <div class="form-group" style="width: 150px;">
                                <input type="date" name="session_date" class="form-control">
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<!-- /.modalUpdate -->
<?php foreach($plan as $row)
{?>
<div class="modal fade" id="modalUpdate<?= $row['id_planning'];?>-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Update Planning</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="quickForm" action="<?= base_url().'plan'; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInput">Planning</label>
                        <input type="text" name="planning" class="form-control" value="<?= $row['planning']; ?>">
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <div class="select2-purple">
                            <select class="select2" name="id_company" multiple="multiple"
                                data-placeholder="<?= $row['company_name'];?>" data-dropdown-css-class="select2-purple"
                                style="width: 100%;">
                                <?php
                              foreach($company as $row1)
                              {
                             ?>
                                <option value="<?= $row1['id_company'];?>"><?= $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea input class="form-control" name="description" rows="3"
                            placeholder="<?= $row['description'];?>"></textarea>
                    </div>
                    <div class="row col-md-8">
                        <label for="exampleInput">Session</label>
                        <div class="col-md-3">
                            <div class="form-group" style="width: 150px;">
                                <input type="date" name="created_date" class="form-control" id="birthday">
                            </div>
                        </div>
                        <p style="margin-left: 10%">To</p>
                        <div class="col-md-3">
                            <div class="form-group" style="width: 150px;">
                                <input type="date" name="session_date" class="form-control">
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- hiddengem -->
                <input type="hidden" name="update_hidden" value="update-whatever">
                <input type="hidden" name="id" class="form-control" value="<?=$row['id_planning'] ?>">
                <!-- /.hiddengem -->
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->