<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Form -->
            <h2 class="text-center"><?= $this->session->role ?> Department</h2>
            <form method="POST" action="<?php echo base_url("index.php/Production/save_temporary"); ?>">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">No Material</label>
                        <div class="form-group">
                            <div class="input-group">
                                <?php foreach ($terakhir as $t) { ?>
                                    <input type="text" class="form-control" name="no_material" id="" placeholder="" value="<?= $t->last_number ?>" readonly>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $datetime = new DateTime();
                        ?>
                        <div class="form-group">
                            <label for="">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="created_by" value="<?= $this->session->username ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="created_date" value="<?= $datetime->format('Y-m-d') ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $datetime = new DateTime();
                        ?>
                        <div class="form-group">
                            <label for="">Material Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="material_name" id="Material_Name" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Requested Quantity</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="requested_quantity" id="Requested_Quantity" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Description of usage</label>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control mr-1" name="description_usage" id="Description_of_usage" placeholder="" required>
                                <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Form -->
            <!-- Table -->
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
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data_material_temporary as $dmd) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $dmd->material_name ?></td>
                                    <td><?= $dmd->requested_quantity ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary" data-toggle="modal" data-target="#remark1<?= $dmd->id ?>">
                                            <i class="fab fa-airbnb fa-1x"></i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="remark1<?= $dmd->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Catatan / Note</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="font-size: 20px;"><?= $dmd->description_usage ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="text-center">
                                        <button type="button" id="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#edit<?= $dmd->id ?>">
                                            <i class="nav-icon fas fa-edit"></i> Edit</button>
                                        <a href="<?= base_url() . 'index.php/Production/delete_temporary?id=' . $dmd->id ?>" class="btn btn-danger btn-sm mb-1 hapus"><i class="nav-icon fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-left">
                    <a href="<?= base_url('index.php/production/transferdata') ?>" class="btn btn-success rilis"><i class="nav-icon fas fa-save"></i> Save all</a>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($data_material_temporary as $dmd) : ?>
    <div class="modal fade" id="edit<?= $dmd->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url("index.php/Production/edit_temporary"); ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Material Name</label>
                                    <div class="input-group">
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $datetime = new DateTime();
                                        ?>
                                        <input type="text" class="form-control" name="updated_date" value="<?= $datetime->format('Y-m-d') ?>" hidden>
                                        <input type="text" class="form-control" name="id" id="Material_Name" value="<?= $dmd->id ?>" hidden>
                                        <input type="text" class="form-control" name="material_name" id="Material_Name" value="<?= $dmd->material_name ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Requested Quantity</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="requested_quantity" id="Requested_Quantity" value="<?= $dmd->requested_quantity ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Description of usage</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="description_usage" id="Description_of_usage" value="<?= $dmd->description_usage ?>" required>
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