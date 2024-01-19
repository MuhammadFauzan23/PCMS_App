<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center"><?= $this->session->role ?> Department</h2>
            <div class="card mt-3">
                <div class="card-body">
                    <?php foreach ($data_material as $dm) : ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="username" placeholder="Username" value="<?= $dm->username ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <label for="">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="updated_date" value="<?= $dm->created_date ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <label for="">Material Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-barcode	"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="id" id="Material_Name" value="<?= $dm->material_number ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- ------------------------ -->
                    <hr>
                    <!-- ------------------------ -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Material Name</th>
                                        <th scope="col">Requested Quantity</th>
                                        <th scope="col">Description of usage</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                foreach ($data_material_detail as $dm) : ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $dm->material_name ?></td>
                                            <td><?= $dm->requested_quantity ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-secondary" data-toggle="modal" data-target="#remark1<?= $dm->id ?>">
                                                    <i class="fab fa-airbnb fa-1x"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="remark1<?= $dm->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3>Catatan / Note</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 20px;"><?= $dm->description_usage ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td>
                                                <?php if ($dm->status == 2) { ?>
                                                    <button type="button" id="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#edit<?= $dm->id ?>">
                                                        <i class="nav-icon fas fa-edit"></i> Edit</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($data_material_detail as $dm) : ?>
    <div class="modal fade" id="edit<?= $dm->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url("index.php/Production/edit_after_reject"); ?>" method="post">
                        <input type="text" class="form-control" name="id" id="" value="<?= $dm->id ?>" hidden>
                        <input type="text" class="form-control" name="material_number" id="" value="<?= $dm->material_number ?>" hidden>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Material Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="material_name" id="Material_Name" value="<?= $dm->material_name ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Requested Quantity</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="requested_quantity" id="Requested_Quantity" value="<?= $dm->requested_quantity ?>">
                                        <input type="text" class="form-control" name="requested_quantity2" id="Requested_Quantity" value="<?= $dm->requested_quantity ?>" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Description of usage</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="description_usage" id="Description_of_usage" value="<?= $dm->description_usage ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal -->