<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Form -->
            <h2 class="text-center"><?= $this->session->role ?> Department</h2>
            <form method="POST" action="<?php echo base_url("index.php/Production/save"); ?>">
                <button type="button" class="btn btn-danger btn-sm" id="btn-tambah-form"><i class="fa fa-plus" aria-hidden="true"></i>
                    Form</button>
                <button type="button" class="btn btn-success btn-sm" id="btn-reset-form"><i class="fas fa-undo"></i>
                    Form</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $datetime = new DateTime();
                        ?>
                        <!-- <input type="text" class="form-control" name="jumlah[]" value="1" hidden> -->
                        <input type="text" class="form-control" name="status[]" value="Not Approval" hidden>
                        <input type="text" class="form-control" name="created_date[]" value="<?= $datetime->format('d-m-Y h:i A') ?>" hidden>
                        <input type="text" class="form-control" name="created_by[]" value="<?= $this->session->username ?>" hidden>
                        <div class="form-group">
                            <label for="">Material Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="material_name[]" id="Material_Name" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Requested Quantity</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="requested_quantity[]" id="Requested_Quantity" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Description of usage</label>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="description_usage[]" id="Description_of_usage" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="insert-form"></div>
                <hr>
            </form>
            <!-- End Form -->
            <!-- Table -->
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Material Name</th>
                                <th scope="col">Requested Quantity</th>
                                <th scope="col">Description of usage</th>
                                <!-- <th scope="col">Status</th> -->
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
                                    <!-- <td><?= $dm->status ?></td> -->
                                    <td class="text-center">
                                        <button type="button" id="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#edit<?= $dm->id ?>">
                                            <i class="nav-icon fas fa-edit"></i> Edit</button>
                                        <!-- <a href="<?= base_url('production/') ?>" class="btn btn-danger btn-sm mb-1 hapus"><i class="nav-icon fas fa-trash-alt"></i> Hapus</a> -->
                                        <a href="<?= base_url() . 'index.php/Production/delete?id=' . $dm->id ?>" class="btn btn-danger btn-sm mb-1 hapus"><i class="nav-icon fas fa-trash-alt"></i> Hapus</a>
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
                    <form action="<?php echo base_url("index.php/Production/edit"); ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $datetime = new DateTime();
                                ?>
                                <input type="text" class="form-control" name="updated_date" value="<?= $datetime->format('d-m-Y h:i A') ?>" hidden>
                                <input type="text" class="form-control" name="id" id="Material_Name" value="<?= $dm->id ?>" hidden>
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
<script>
    $(document).ready(function() {
        $("#btn-tambah-form").click(function() {
            var jumlah = 1;
            $("#insert-form").append("<hr>" +
                "<div class='row mt-3'>" +
                "<div class='col-md-3'>" +
                "<div class='form-group'>" +
                "<label for=''>Material Name</label>" +
                "<div class='input-group'>" +
                "<input type='text' class='form-control' name='status[]' id='status' value='Not Approval' required hidden>" +
                "<input type='text' class='form-control' name='created_by[]' id='status' value='<?= $this->session->username ?>' required hidden>" +
                "<input type='text' class='form-control' name='created_date[]' value='<?= $datetime->format('d-m-Y h:i A') ?>' hidden>" +

                "<input type='text' class='form-control' name='material_name[]' id='Material_Name' placeholder='' required>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<div class='form-group'>" +
                "<label for=''>Requested Quantity</label>" +
                "<div class='input-group'>" +
                "<input type='text' class='form-control' name='requested_quantity[]' id='Requested_Quantity' placeholder='' required>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<label for=''>Description of usage</label>" +
                "<div class='form-group'>" +
                "<div class='input-group'>" +
                "<input type='text' class='form-control' name='description_usage[]' id='Description_of_usage' placeholder='' required>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>");

        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
</script>