<nav class="navbar navbar-expand-lg navbar-fixed-top" role="navigation">
    <a href="#" class="navbar-brand"><?= $_ENV['app.name'] ?></a>

    <!--</div>-->
    <div class="navbar w-100 d-flex justify-content-between">
        <?php if (isset($this->session->userdata['userIsStartSession']) && isset($this->session->userdata['sessionSection']->last_session->start_at) != "") { ?>
        <ul class="nav navbar-top-links navbar-right">
            <li style="font-size: 16px; float: right;" id="countdown"><i class="fa fa-clock-o"></i> 00:00:00</li>
        </ul>
        <div class="d-block">
            <button class="fontSize selected" style="font-size: 13px !important;">A</button>
            <button class="fontSize" style="font-size: 18px !important;">A</button>
            <button class="fontSize" style="font-size: 24px !important;">A</button>
        </div>
        <?php } ?>
    </div>
</nav>