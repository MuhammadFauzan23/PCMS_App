<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/dropzone/min/dropzone.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css">

    <!-- Date Time Picker Jquery -->
    <link rel="stylesheet" href="<?= base_url('vendor/asset') ?>/date/css/jquery.datetimepicker.css">

    <!-- jQuery -->
    <script src="<?= base_url('vendor/template') ?>/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('vendor/template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <!-- InputMask -->
    <!-- <script src="<?= base_url('vendor/template') ?>/plugins/moment/moment.min.js"></script> -->

    <script src="<?= base_url('vendor/asset/js/node_modules/moment/moment.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('vendor/template') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('vendor/template') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Date time picker -->
    <script src="<?= base_url('vendor/asset') ?>/date/js/jquery.datetimepicker.full.js"></script>
    <!-- Anime JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script> -->

    <title>PCMS App | <?= $title ?></title>
</head>

<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">PCMS App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-warning btn-sm mr-2" href="<?= base_url('index.php/Auth/dashboard_general') ?>">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if ($this->session->userdata('role') == 'Production') { ?>
                        <li class="nav-item">
                            <a class="btn btn-warning btn-sm mr-2" href="<?= base_url('index.php/Production/view_dashboard') ?>">Material Request</a>
                        </li>
                    <?php } elseif ($this->session->userdata('role') == 'Warehouse') { ?>
                        <li class="nav-item">
                            <a class="btn btn-warning btn-sm mr-2" href="<?= base_url('index.php/Warehouse/view_dashboard') ?>">Approval Material</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm mr-2" href="<?= base_url('index.php/History/history') ?>">View History</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm mr-2" href="<?= base_url('index.php/History/filter') ?>">Filter</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <div class="btn-group nav-link">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span><img style="width:20px;" src="<?= base_url('vendor/template') ?>/dist/img/avatar.png" class="img-circle elevation-2 user-img" alt="User Image"></span>
                            <span class="ml-3">
                                <a><?= $this->session->userdata('fullname') ?></a>
                            </span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a href="<?= base_url('index.php/auth/logout') ?>" class="dropdown-item logout"><span class="fas fa-power-off"></span> Log out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <?= $contents ?>
        <!-- End Content -->

    </div>


    <!-- SweetAlert2 -->
    <script src="<?= base_url('vendor/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('vendor/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('vendor/template') ?>/dist/js/adminlte.min.js"></script>
    <!-- Lottie Files Animation -->
    <script src="<?= base_url('vendor/asset/animasi/js') ?>/lottie-player.js"></script>

    <script>
        $(function() {
            $('.tableView').DataTable({
                stateSave: true,
                "searching": true,
                "ordering": true,
                "scrollX": true,
                // fixedColumns: {
                //     left: 4,
                //     right: 1
                // },
                lengthMenu: [
                    [10, 15, -1],
                    ["10", "15", "All"]
                ],
            });
        });
        // ---------------------------------------------------------------------
        $('.datepicker').datetimepicker({
            i18n: {
                de: {
                    months: [
                        'Januar', 'Februar', 'März', 'April',
                        'Mai', 'Juni', 'Juli', 'August',
                        'September', 'Oktober', 'November', 'Dezember',
                    ],
                    dayOfWeek: [
                        "So.", "Mo", "Di", "Mi",
                        "Do", "Fr", "Sa.",
                    ]
                }
            },
            timepicker: false,
            format: 'Y-m-d'
        });
        // ---------------------------------------------------------------------
        <?php $pesan = $this->session->flashdata('pesan') ?>
        $(function() {
            <?php if ($pesan) { ?>
                <?php if ($pesan['stts'] != true) { ?>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Terjadi Kesalahan Proses!',
                        text: '<?= $pesan['msg'] ?>',
                        timer: 1500,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                        showConfirmButton: false,
                    })
                <?php } else { ?>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Proses berhasil!',
                        text: '<?= $pesan['msg'] ?>',
                        timer: 1500,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                        showConfirmButton: false,
                    })
            <?php }
            } ?>
        });

        $('.hapus').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak dapat memulihkan data ini!",
                icon: 'warning',
                position: 'center',
                showCancelButton: true,
                confirmButtonColor: '#32CD32',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Iya, hapus data!',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = url;
                } else if (result.dismiss) {
                    Swal.fire({
                        title: 'Proses dibatalkan!',
                        text: 'Sekarang data anda aman',
                        icon: 'error',
                        position: 'center',
                        timer: 1400,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                        showConfirmButton: false,
                    })
                }
            })

        })

        $('.edit_data').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href
            Swal.fire({
                title: 'Apakah anda ingin mengubah data ini?',
                text: "Tentukan pilihan!",
                icon: 'warning',
                position: 'center',
                showCancelButton: true,
                confirmButtonColor: '#32CD32',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = url;
                }
            })

        })

        $('.approve').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk approve data ini!",
                icon: 'warning',
                position: 'center',
                showCancelButton: true,
                confirmButtonColor: '#32CD32',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Iya, Lanjutkan proses!',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = url;
                } else if (result.dismiss) {
                    Swal.fire({
                        title: 'Proses dibatalkan!',
                        text: 'Silahkan diproses lebih lanjut',
                        icon: 'error',
                        position: 'center',
                        timer: 1400,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                        showConfirmButton: false,
                    })
                }
            })
        })

        // $('.reject').on('click', function(e) {
        //     e.preventDefault();
        //     const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href

        //     Swal.fire({
        //         title: 'Apakah anda yakin?',
        //         text: "Untuk approve data ini!",
        //         icon: 'warning',
        //         position: 'center',
        //         showCancelButton: true,
        //         confirmButtonColor: '#32CD32',
        //         cancelButtonColor: '#FF0000',
        //         confirmButtonText: 'Iya, Lanjutkan proses!',
        //         cancelButtonText: 'Tidak',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.location.href = url;
        //         } else if (result.dismiss) {
        //             Swal.fire({
        //                 title: 'Proses dibatalkan!',
        //                 text: 'Silahkan diproses lebih lanjut',
        //                 icon: 'error',
        //                 position: 'center',
        //                 timer: 1400,
        //                 showClass: {
        //                     popup: 'animate__animated animate__fadeInUp'
        //                 },
        //                 showConfirmButton: false,
        //             })
        //         }
        //     })
        // })

        $('.logout').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href
            Swal.fire({
                title: 'Anda yakin ingin keluar?',
                text: 'Tentukan pilihan anda',
                icon: 'warning',
                position: 'center',
                showCancelButton: true,
                confirmButtonColor: '#32CD32',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = url;
                } else if (result.dismiss) {
                    Swal.fire({
                        title: 'Kembali ke sistem!',
                        text: 'Selamat datang!',
                        icon: 'success',
                        position: 'center',
                        timer: 1400,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                        showConfirmButton: false,
                    })
                }
            })

        })

        //Initialize Select2 Elements
        $('.select2').select2()
        $('.search_select').select2()
        $('.select3').select2()
        $('.select4').select2()
    </script>
</body>

</html>