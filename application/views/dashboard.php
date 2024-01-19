<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Departemen</span>
                        <span class="info-box-number">
                            <?= $this->session->userdata('role'); ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-4 mt-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-firefox-browser"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Browser</span>
                        <span class="info-box-number">
                            <?php
                            $arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
                            $agent = $_SERVER['HTTP_USER_AGENT'];
                            $user_browser = '';
                            foreach ($arr_browsers as $browser) {
                                if (strpos($agent, $browser) !== false) {
                                    $user_browser = $browser;
                                    break;
                                }
                            }
                            switch ($user_browser) {
                                case 'MSIE':
                                    $user_browser = 'Internet Explorer';
                                    break;

                                case 'Trident':
                                    $user_browser = 'Internet Explorer';
                                    break;

                                case 'Edg':
                                    $user_browser = 'Microsoft Edge';
                                    break;
                            }

                            echo $user_browser;
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-4 mt-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user"></i></span>
                    <?php
                    $uaFull = strtolower($_SERVER['HTTP_USER_AGENT']);
                    $data = explode('(', $uaFull);
                    $data2 = explode(')', $data[1]);
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text"> Full Name</span>
                        <span class="info-box-number"> <?= $this->session->fullname; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body ">
                            <lottie-player class="text-center" src="<?= base_url('vendor/asset/animasi/welcome_opening.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
                        </div>
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>