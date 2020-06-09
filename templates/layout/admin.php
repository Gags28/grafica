<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Multigraph Coorporativo</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <?= $this->Html->css('/plugins/vectormap/jquery-jvectormap-2.0.3.css') ?>
    <?= $this->Html->css('/plugins/jquery-toggles/css/toggles.css') ?>
    <?= $this->Html->css('/plugins/jquery-toggles/css/themes/toggles-light.css') ?>
    <?= $this->Html->css('/plugins/jquery-toast-plugin/dist/jquery.toast.min.css') ?>
    <?= $this->Html->css('/css/style.css') ?>
    <?= $this->Html->css('/css/custom.css') ?>
    <?= $this->fetch('css'); ?>
    <script type="text/javascript">
        var router = __Parametros = {};
        router.request = <?php echo json_encode($this->request); ?>;
        router.url = "<?php echo \Cake\Routing\Router::url('/', true); ?>";
        router.prefix = "<?php echo (!empty($this->request->getParam('prefix'))) ? $this->request->getParam('prefix') : '' ?>";
    </script>

</head>

<body>

    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="dashboard-admin.html">
                <?= $this->Html->image('logo-light.png', ['alt' => 'textalternatif', 'class' => 'brand-img d-inline-block']) ?>
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="search"></i></span></a>
                </li>

                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="shopping-cart"></i></span><span class="badge-wrap"><span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Carrinho <a href="carrinho.html" class="">Ver Todas</a></h6>
                        <div class="notifications-nicescroll-bar">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <?= $this->Html->image('avatar1.jpg', ['alt' => 'textalternatif', 'alt' => 'user', 'class' => 'avatar-img rounded-circle']) ?>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Cartão</span> 200 Cartões visita.</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <?= $this->Html->image('avatar2.jpg', ['alt' => 'textalternatif', 'class' => 'avatar-img rounded-circle']) ?>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Cartão</span> 200 Cartões visita.</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <?= $this->Html->image('avatar2.jpg', ['alt' => 'textalternatif', 'alt' => 'user', 'class' => 'avatar-img rounded-circle']) ?>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Cartão</span> 200 Cartões visita.</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <?= $this->Html->image('avatar2.jpg', ['alt' => 'textalternatif', 'alt' => 'user', 'class' => 'avatar-img rounded-circle']) ?>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Cartão</span> 200 Cartões visita.</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <?= $this->Html->image('avatar12.jpg', ['alt' => 'textalternatif', 'alt' => 'user', 'class' => 'avatar-img rounded-circle']) ?>

                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>Alessandro<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Meus Dados</span></a>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link('<i class="dropdown-icon zmdi zmdi-power"></i><span>Sair</span>', ['controller' => 'Login', 'action' => 'logout', 'prefix' => false], ['escape' => false, 'class' => 'dropdown-item']) ?>
                    </div>
                </li>
            </ul>
        </nav>
        <form role="search" class="navbar-search">
            <div class="position-relative">
                <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i data-feather="search"></i></span></a>
                <input type="text" name="example-input1-group2" class="form-control" placeholder="Procurar pedido">
                <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i data-feather="x"></i></span></a>
            </div>
        </form>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-dark">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <div class="nav-header">
                        <span>Bem-Vindo</span>
                        <span>Oi</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <?= $this->element('menus/admin') ?>
                    </ul>

                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

        <div class="hk-pg-wrapper">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>

    <?= $this->Html->script('/plugins/jquery/dist/jquery.min.js'); ?>
    <?= $this->Html->script('/plugins/popper.js/dist/umd/popper.min.js'); ?>
    <?= $this->Html->script('/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>
    <?= $this->Html->script('/plugins/owl.carousel/dist/owl.carousel.min.js'); ?>
    <?= $this->Html->script('/plugins/jquery-toggles/toggles.min.js'); ?>
    <?= $this->Html->script('/plugins/waypoints/lib/jquery.waypoints.min.js'); ?>
    <?= $this->Html->script('/plugins/jquery.counterup/jquery.counterup.min.js'); ?>
    <?= $this->Html->script('/plugins/echarts/dist/echarts-en.min.js'); ?>
    <?= $this->Html->script('/plugins/jquery.sparkline/dist/jquery.sparkline.min.js'); ?>
    <?= $this->Html->script('/plugins/vectormap/jquery-jvectormap-2.0.3.min.js'); ?>
    <?= $this->Html->script('/plugins/vectormap/jquery-jvectormap-world-mill-en.js'); ?>
    <?= $this->Html->script('/plugins/jquery-toast-plugin/dist/jquery.toast.min.js'); ?>


    <?= $this->Html->script('/js/vectormap-data.js'); ?>
    <?= $this->Html->script('/js/toggle-data.js'); ?>
    <?= $this->Html->script('/js/jquery.slimscroll.js'); ?>
    <?= $this->Html->script('/js/dropdown-bootstrap-extended.js'); ?>
    <?= $this->Html->script('/js/feather.min.js'); ?>
    <?= $this->Html->script('/js/init.js'); ?>
    <?= $this->Html->script('/js/dashboard-data.js'); ?>
    <?= $this->Html->script('/js/panel/utills.js'); ?>
    <?= $this->Html->script('/js/panel/validacoes.js'); ?>
    <?= $this->fetch('script'); ?>

</body>

</html>