<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Question List</h3>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary"><a class="fa fa-plus" style="color: white;" data-toggle="modal"
                                    data-target="#modal-lg"> Add</a></div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Question1</th>
                                    <th>Question2</th>
                                    <th>Question3</th>
                                    <th>Question4</th>
                                    <th>Question5</th>
                                    <th style="text-align: center;">Criteria</th>
                                    <th style="text-align: center;">Planning</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                  $id = 1;
                    foreach($question as $row)
                    {  ?>
                                <tr>
                                    <td style="overflow: auto;"><?= $id++; ?>.</td>
                                    <td style="width: 300px;"><?= $row['label_kuesioner'];?></td>
                                    <td style="width: 500px;"><?= $row['question1'];?></td>
                                    <td style="width: 500px;"><?= $row['question2'];?></td>
                                    <td style="width: 500px;"><?= $row['question3'];?></td>
                                    <td style="width: 500px;"><?= $row['question4'];?></td>
                                    <td style="width: 500px;"><?= $row['question5'];?></td>
                                    <td style="width: 200px; text-align: center;"><?= $row['label'];?></td>
                                    <td style="width: 200px; text-align: center;"><?= $row['planning'];?></td>
                                    <td style="text-align: center;">
                                        <div class="btn btn-info"><a data-toggle="modal"
                                                data-target="#modalUpdate<?= $row['id_kuesioner'];?>-lg"
                                                style="color: white;"><i class="fa fa-edit"></i></a></div>
                                        <?= anchor('Admin/delete_kuesioner/'
                                    .$row['id_kuesioner'], '<button class="btn btn-danger"><i
                                    class="fa fa-trash" style="color: white;"></i></a>') ?>
                                        <!-- <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> -->
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
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Kuesioner</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('import'); ?>
                <div class="form-group col-md-12">
                    <label>Planning</label>
                    <div class="select2-purple">
                        <select class="select2" name="id_planning" multiple="multiple"
                            data-placeholder="Select a planning" data-dropdown-css-class="select2-purple"
                            style="width: 100%;">
                            <?php
                          foreach($planning as $row)
                          {
                            ?>
                            <option value="<?= $row['id_planning'] ?>"><?= $row['planning']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="excel" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file (xlsx, xls)</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- hiddengem -->
                <input type="hidden" name="add_hidden" value="add-whatever">
                <button type="submit" name="submit" value="upload" class="btn btn-primary">Save</button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php foreach($question as $row) { ?>
<!-- Updatemodal -->
<div class="modal fade" id="modalUpdate<?= $row['id_kuesioner'];?>-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Kuesioner</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('import'); ?>
                <div class="form-group col-md-12">
                    <label>Planning</label>
                    <div class="select2-purple">

                        <select class="select2" name="planning" multiple="multiple" selected="<?= $row['planning']; ?>"
                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                            < <?php
                          foreach($planning as $row1)
                          {
                            ?> <option value="<?= $row1['id_planning'] ?>"><?= $row1['planning']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Criteria</label>
                    <div class="select2-purple">
                        <select class="select2" name="labelcriteria" multiple="multiple"
                            data-placeholder="<?= $row['label']; ?>" data-dropdown-css-class="select2-purple"
                            style="width: 100%;">

                            <?php foreach($criteria as $row2) { ?>
                            <option value="<?= $row2['id_criteria'] ?>"><?= $row2['label']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInput">Label Kuesioner</label>
                    <input type="text" name="q6" class="form-control" value="<?= $row['label_kuesioner'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInput">Question1</label>
                    <input type="text" name="q1" class="form-control" value="<?= $row['question1'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInput">Question2</label>
                    <input type="text" name="q2" class="form-control" value="<?= $row['question2'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInput">Question3</label>
                    <input type="text" name="q3" class="form-control" value="<?= $row['question3'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInput">Question4</label>
                    <input type="text" name="q4" class="form-control" value="<?= $row['question4'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInput">Question5</label>
                    <input type="text" name="q5" class="form-control" value="<?= $row['question5'];?>">
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter project name"> -->
                </div>

            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- hiddengem -->
            <input type="hidden" name="update_hidden" value="update-whatever">
            <input type="hidden" name="id" class="form-control" value="<?=$row['id_kuesioner'] ?>">
            <button type="submit" name="submit" value="upload" class="btn btn-primary">Save</button>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->