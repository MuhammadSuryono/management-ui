<div class="footer unsize">
    <div class="float-right">
        <?= ENVIRONMENT == 'development' ? 'Time load {elapsed_time}s / {memory_usage}' : '' ?>
    </div>
    <div>
        <strong>Copyright</strong> <?= $_ENV['app.name'] ?> &copy; <?= date('Y') ?>
    </div>
</div>