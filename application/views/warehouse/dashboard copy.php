<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Table -->
            <div class="card mt-2">
                <h2 class="text-center">Warehouse Department</h2>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Material Name</th>
                                <th scope="col">Requested Quantity</th>
                                <th scope="col">Description of usage</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data_material as $dm) :
                            ?>
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
                                    <?php if ($dm->status == 0) { ?>
                                        <td class="text-center">Waiting Approval</td>
                                    <?php } elseif ($dm->status == 1) { ?>
                                        <td class="text-center"><i class="fa fa-check-square" style="font-size:25px;color:green"></i>
                                        </td>
                                        <!-- <td>Approval</td> -->
                                    <?php } else { ?>
                                        <td class="text-center"><i class="fa fa-times" aria-hidden="true" style="font-size:25px;color:red"></i></td>
                                        <!-- <td>Reject</td> -->
                                    <?php } ?>
                                    <td class="text-center">
                                        <button type="button" id="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#edit<?= $dm->id ?>">
                                            <i class="nav-icon fas fa-edit"></i> Edit</button>
                                        <button type="button" id="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#approve<?= $dm->id ?>">
                                            <i class="nav-icon fas fa-check"></i> Approve</button>
                                        <a href="<?= base_url() . 'index.php/Warehouse/delete?id=' . $dm->id ?>" class="btn btn-danger btn-sm mb-1 hapus"><i class="nav-icon fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($data_material as $dm) : ?>
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
                    <form action="<?php echo base_url("index.php/Warehouse/edit"); ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $datetime = new DateTime();
                                ?>
                                <input type="text" class="form-control" name="id" id="" value="<?= $dm->id ?>" hidden>
                                <input type="text" class="form-control" name="updated_date" value="<?= $datetime->format('d-m-Y h:i A') ?>" hidden>
                                <input type="text" class="form-control" name="updated_by" value="<?= $this->session->username ?>" hidden>

                                <div class="form-group">
                                    <label for="">Material Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="material_name" id="Material_Name" value="<?= $dm->material_name ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Requested Quantity</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="requested_quantity" id="Requested_Quantity" value="<?= $dm->requested_quantity ?>" required>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal -->

<!-- Modal Approval Data -->
<?php foreach ($data_material as $dm) : ?>
    <div class="modal fade" id="approve<?= $dm->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approval Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url("index.php/Warehouse/approval"); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $datetime = new DateTime();
                                ?>
                                <input type="text" class="form-control" name="approved_date" value="<?= $datetime->format('d-m-Y h:i A') ?>" hidden>
                                <input type="text" class="form-control" name="approved_by" value="<?= $this->session->username ?>" hidden>
                                <input type="text" class="form-control" name="id" id="Material_Name" value="<?= $dm->id ?>" hidden>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div class="input-group">
                                        <select name="status" id="" class="select-control select2">
                                            <option value="">-- Select --</option>
                                            <option value="1">Approval</option>
                                            <option value="2">Reject</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Description additional</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea type="text" class="form-control" name="description_additional" id="description_additional"></textarea>
                                    </div>
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
<?php endforeach; ?>
<!-- End Modal -->
</script>