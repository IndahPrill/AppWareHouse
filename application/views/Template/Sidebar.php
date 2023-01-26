<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU NAVIGATION</li>
            <li <?= $this->uri->segment(2) == "das" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('Dashboard/das') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>

            <?php if ($this->session->userdata('level') <= 2) { ?>
            <li <?= $this->uri->segment(2) == "sup" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('Supplier/sup') ?>"><i class="fa fa-ship"></i> <span>Supplier</span></a>
            </li>
            <?php } ?>

            <?php if ($this->session->userdata('level') >= 2) { ?>
            <li <?= $this->uri->segment(2) == "itm" ? 'class="active"' : ''; ?> >
                <a href="<?= site_url('Item/itm/getListItm') ?>"><i class="fa fa-cube"></i> <span>Stock Barang</span></a>
            </li>
            <?php } ?>

            <?php if ($this->session->userdata('level') <= 2) { ?>
            <li <?= $this->uri->segment(2) == "in" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('Stock/in') ?>"><i class="fa fa-truck"></i> <span>Stock In</span></a>
            </li>
            <?php } ?>

            <?php if ($this->session->userdata('level') <= 2) { ?>
            <li <?= $this->uri->segment(2) == "out" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('Stock/out') ?>"><i class="fa fa-shopping-cart"></i> <span>Stock out</span></a>
            </li>
            <?php } ?>

            <?php if ($this->session->userdata('level') >= 2) { ?>
            <li class="<?= $this->uri->segment(2) == "req" ? 'active' : ''; ?> treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i> <span>Permintaan Barang</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?= $this->uri->segment(3) == "getListReq" ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('Request/req/getListReq') ?>"><i class="fa fa-circle-o"></i> Daftar</a>
                    </li>
                    <li <?= $this->uri->segment(3) == "createReq" ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('Request/req/createReq') ?>"><i class="fa fa-circle-o"></i> Tambah</a>
                    </li>
                </ul>
            </li>
            <!-- <li <?= $this->uri->segment(2) == "req" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('Request/req') ?>"><i class="fa fa-file-text"></i> <span>Permintaan Barang</span></a>
            </li> -->
            <?php } ?>?>


            <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">SETTINGS</li>
            <li <?= $this->uri->segment(2) == "usr" ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('User/usr') ?>"><i class="fa fa-user"></i> <span>List User</span></a>
            </li>
            <?php } ?>

            <li class="treeview"></li>
        </ul>
    </section>
</aside>
