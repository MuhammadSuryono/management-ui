<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $_ENV['app.name'] ?> | 500 Error</title>

</head>

<div class="middle-box text-center animated fadeInDown">
    <h1>400</h1>
    <h3 class="font-bold"><?php echo $heading; ?></h3>

    <div class="error-desc">
        <?php echo $message; ?>.<br/>
        You can go back to main page: <br/><a href="<?= base_url() ?>" class="btn btn-primary m-t">Dashboard</a>
    </div>
</div>

</html>
