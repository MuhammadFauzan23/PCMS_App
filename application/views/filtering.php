<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Form -->
            <h2 class="text-center">History</h2>
            <form method="POST" action="<?php echo base_url("index.php/History/filtering_data"); ?>">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Start Time</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="start_time" id="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">End Time</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker mr-1" name="end_time" id="" required>
                                <button type="submit" class="btn btn-danger" id=""><i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </form>
            <!-- End Form -->
            <!-- Table -->
            <div class="card mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table table-bordered tableView" style="width: auto;">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Material Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Before Qty</th>
                                        <th scope="col">After Qty</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Remark</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data_history as $key => $dm) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $dm->material_number ?></td>
                                            <td><?= $dm->userid ?></td>
                                            <td><?= $dm->action ?></td>
                                            <td><?= $dm->before_qty ?></td>
                                            <td><?= $dm->after_qty ?></td>
                                            <td><?= $dm->status ?></td>
                                            <td><?= $dm->remark ?></td>
                                            <td><?= $dm->date_time ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>
</div>