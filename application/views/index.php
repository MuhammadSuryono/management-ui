<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.8
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $title_tab ?? $_ENV['app.name'] ?></title>
    <link rel="icon" href="<?= base_url('assets/img/data-processing.png') ?>" type="image/icon type">

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url('assets/css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?= base_url('assets/js/plugins/gritter/jquery.gritter.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <?php
    for ($i = 0; $i < count($css); $i++) {
        echo '<link rel="stylesheet" href="' . $css[$i] . '">';
    }
    ?>
    <style>
        .ck-editor__editable_inline {
            min-height: 100px;
        }

        .gap-1 {
            gap: 1rem;
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: none;
            border-bottom-left-radius: none;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: none;
            border-bottom-right-radius: none;
        }

        .page-item .page-link {
            border-radius: 5px;
        }

        .vertical-center {
            margin: 0;
            position: absolute;
            top: 55%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view($sidebar); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php $this->load->view($navbar); ?>
            </div>
            <?php $this->load->view("parts/admin/breadcrumb"); ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <?php $this->load->view($content); ?>
                <?php $this->load->view('general_modal_form'); ?>
            </div>
        </div>
    </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <!-- Flot -->
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.spline.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.pie.js') ?>"></script>

    <!-- Peity -->
    <script src="<?= base_url('assets/js/plugins/peity/jquery.peity.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/demo/peity-demo.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('assets/js/inspinia.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

    <!-- GITTER -->
    <script src="<?= base_url('assets/js/plugins/gritter/jquery.gritter.min.js') ?>"></script>

    <!-- Sparkline -->
    <script src="<?= base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?= base_url('assets/js/demo/sparkline-demo.js') ?>"></script>

    <!-- ChartJS-->
    <script src="<?= base_url('assets/js/plugins/chartJs/Chart.min.js') ?>"></script>

    <!-- Toastr -->
    <script src="<?= base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>

    <!-- custom js  -->
    <script src="<?= base_url('assets/js/pages/custom.js') ?>"></script>

    <!-- CKEDITOR 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

    <?php
    for ($i = 0; $i < count($javascript); $i++) {
        echo '<script type="module" src="' . $javascript[$i] . '"></script>';
    }
    ?>



    <script>
        setInterval(showTime, 1000)
        function showTime() {
            let time = new Date();
            let hour = time.getHours();
            let minute = time.getMinutes();
            let second = time.getSeconds();

            let current = `${convWithZero(hour)}:${convWithZero(minute)}:${convWithZero(second)}`;
            document.getElementById('clock').innerHTML = current;
        }
        showTime();

        function convWithZero(number) {
            if (number < 10) {
                return '0' + number;
            } else {
                return number;
            }
        }
    </script>
</body>

</html>