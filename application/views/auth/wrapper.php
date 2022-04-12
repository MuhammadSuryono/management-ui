<!DOCTYPE html>
<html lang="en">

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
</head>

<body class="gray-bg">
    <?php $this->load->view($content); ?>

    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('assets/js/inspinia.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

    <!-- Toastr -->
    <script src="<?= base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>

    <?php
    for ($i = 0; $i < count($javascript); $i++) {
        echo '<script type="module" src="' . $javascript[$i] . '"></script>';
    }
    ?>

    <script>
        <?php if (!$isLogin) { ?> localStorage.clear();
        <?php } ?>
    </script>
</body>

</html>