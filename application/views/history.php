<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Form -->
            <h2 class="text-center">History</h2>
            <!-- End Form -->
            <!-- Table -->
            <div class="card mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table table-bordered" style="width: auto;" id="tabel_history">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel_history').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?= base_url('index.php/History/listHistory') ?>'
            },
            'columns': [{
                    data: 'nomor'
                },
                {
                    data: 'material_number'
                },
                {
                    data: 'userid'
                },
                {
                    data: 'action'
                },
                {
                    data: 'before_qty'
                },
                {
                    data: 'after_qty'
                },
                {
                    data: 'status'
                },
                {
                    data: 'remark'
                },
                {
                    data: 'date_time'
                },
            ]
        });
    });
</script>