<?php
    $user = $this->session->userData;
    $nav = [
        'Dashboard' => [
            'url' => '/dashboard',
            'icon' => 'fa-tachometer',
            'in' => ['dashboard'],
            'role' => ['admin']
        ],
        'Data Master' => [
            'url' => '#',
            'icon' => 'fa fa-cogs',
            'in' => ['data-master/division', 'data-master/position', 'data-master/level'],
            'sub' => [
                'Division' => [
                    'url' => '/data-master/division',
                    'icon' => 'fa fa-building',
                    'sub' => []
                ],
                'Position' => [
                    'url' => '/data-master/position',
                    'icon' => 'fa fa-map-pin'
                ],
                'Level' => [
                    'url' => '/data-master/level',
                    'icon' => 'fa fa-level-up'
                ],
            ]
        ],
        'Users' => [
            'url' => '/users',
            'icon' => 'fa fa-users',
            'in' => ['users'],
        ],
    ]
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <h1 class="text-white font-weight-bold">Data<p><span class="text-navy">O</span>nline</p>
                    </h1>
                    <p class="text-white"><?= $user->division ?? 'Position Not Registered' ?> <?= $user->position != null ? sprintf("%s", $user->position):"" ?></p>
                </div>
            </li>
            <?php foreach ($nav as $key => $value): ?>
            <li class="<?= in_array(uri_string(), $value["in"]) ? "active" : "" ?>">
                <a href="<?= base_url($value['url']) ?>" aria-expanded="false">
                    <i class="<?= $value['icon'] ?>"></i>
                    <span class="nav-label"><?= $key ?></span>
                    <?php if (isset($value['sub'])): ?>
                        <span class="fa arrow"></span>
                    <?php endif ?>
                </a>
                <?php if (isset($value['sub'])): ?>
                    <ul class="nav nav-second-level collapse <?= in_array(uri_string(), $value["in"]) ? "in" : "" ?>" aria-expanded="true" style="">
                    <?php foreach ($value['sub'] as $k => $sub): ?>
                        <li class="<?= strpos(current_url(), $sub['url']) ? "active" : "" ?>">
                            <a href="<?= base_url($sub['url']) ?>" aria-expanded="false">
                                <i class="<?= $sub['icon'] ?>"></i>
                                <span class="nav-label"><?= $k ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endforeach ?>
        </ul>

    </div>
</nav>