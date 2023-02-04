<header class="main-header">
    <a href="<?= site_url('Dashboard/das') ?>" class="logo">
        <span class="logo-mini"><b>WH</b></span>
        <span class="logo-lg"><b>Warehouse</b></span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/dist/img/avatar.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->fungsi->user_login()->name ?> -
                            (<?= ucfirst($this->fungsi->user_login()->username) ?>)</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?= base_url() ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
                            <p><?= $this->fungsi->user_login()->name ?> -
                                (<?= ucfirst($this->fungsi->user_login()->username) ?>)</p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>