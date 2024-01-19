<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center"><?= $this->session->role ?> Department</h2>
            <form method="POST" action="<?php echo base_url("index.php/Production/temporary"); ?>">
                <button type="submit" class="btn btn-success btn-sm" id="btn-reset-form"><i class="fas fa-plus"></i> Request Material</button>
                <hr>
            </form>
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table tableView">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Material</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
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
                                    <td scope="row"><?= $dm->material_number ?></td>
                                    <?php if ($dm->status == 0) { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-warning">Waiting Approval</button></td>
                                    <?php } elseif ($dm->status == 1) { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-success">Approved</button></td>
                                    <?php } else { ?>
                                        <td class="text-center"><button class="btn btn-sm btn-danger">Reject</button></td>
                                    <?php } ?>
                                    <td scope="row"><?= $dm->datetime ?></td>
                                    <td scope="row"><?= $dm->remark ?></td>
                                    <td>
                                        <a href="<?= base_url() . 'index.php/Production/view_material_detail?materialID=' . $dm->material_number ?>" id="" class="btn btn-primary btn-sm mb-1"><i class="nav-icon fas fa-eye"></i> View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>