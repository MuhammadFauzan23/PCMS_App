<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Table -->
            <div class="card mt-2">
                <h2 class="text-center"><?= $this->session->role ?> Department</h2>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Material Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data_material as $dm) :
                            ?>
                                <tr>
                                    <td scope="row"><?= $i++; ?></td>
                                    <td><?= $dm->material_number ?></td>
                                    <?php if ($dm->status == 0) { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-warning">Waiting Approval</button></td>
                                    <?php } elseif ($dm->status == 1) { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-success">Approved</button></td>
                                    <?php } else { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-danger">Reject</button></td>
                                    <?php } ?>
                                    <td class="text-center"><?= $dm->username ?></td>
                                    <td>
                                        <p class="text-center"><?= $dm->remark ?></p>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm->status == 0) { ?>
                                            <a href="<?= base_url() . 'index.php/warehouse/material_detail?materialID=' . $dm->material_number ?>" id="" class="btn btn-primary btn-sm mb-1"><i class="nav-icon fas fa-eye"></i> View</a>
                                            <a href="<?= base_url() . 'index.php/Warehouse/approval_menyeluruh?materialID=' . $dm->material_number ?>" id="" class="btn btn-success btn-sm mb-1 approve" data-toggle="modal" data-target="#approve<?= $dm->id ?>">
                                                <i class="nav-icon fas fa-check"></i> Approve</a>
                                            <button type="button" id="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#reject<?= $dm->material_number ?>">
                                                <i class="nav-icon fas fa-times"></i> Reject</button>
                                        <?php } elseif ($dm->status == 1) { ?>
                                            <a href="<?= base_url() . 'index.php/warehouse/material_detail?materialID=' . $dm->material_number ?>" id="" class="btn btn-primary btn-sm mb-1"><i class="nav-icon fas fa-eye"></i> View</a>
                                        <?php } elseif ($dm->status == 2) { ?>
                                            <a href="<?= base_url() . 'index.php/warehouse/material_detail?materialID=' . $dm->material_number ?>" id="" class="btn btn-primary btn-sm mb-1"><i class="nav-icon fas fa-eye"></i> View</a>
                                        <?php } ?>
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

<!-- Modal Reject Data -->
<?php foreach ($data_material as $dm) : ?>
    <div class="modal fade" id="reject<?= $dm->material_number ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url("index.php/Warehouse/reject_menyeluruh"); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="material_number" id="Material_Name" value="<?= $dm->material_number ?>" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Description additional</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea type="text" class="form-control" name="remark" id="description_additional"></textarea>
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