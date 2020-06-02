<?php

use Cake\Routing\Router; ?>

<div class="hk-wrapper">

    <!-- Main Content -->
    <div class="hk-pg-wrapper hk-auth-wrapper">
        <header class="d-flex justify-content-between align-items-center">
            <a class="d-flex auth-brand" href="#">
                <?= $this->Html->image('logo-dark.png', ['alt' => 'textalternatif', 'class' => 'brand-img', 'alt' => 'brand']) ?>
            </a>

        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 pa-0">
                    <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme" style="display: block">
                        <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url('<?= Router::url('/img/bg1.jpg', true); ?>');">
                            <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                    <h1 class="display-3 text-white mb-20"></h1>
                                    <p class="text-white"></p>
                                </div>
                            </div>
                            <div class="bg-overlay bg-trans-dark-50"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 pa-0">
                    <div class="auth-form-wrap py-xl-0 py-50">
                        <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">

                            <h1 class="display-4 mb-10">Login</h1>
                            <?= $this->Flash->render() ?>
                            <?= $this->Form->create() ?>

                            <?php echo $this->Form->control('email', ['label' => false, 'type' => 'mail', ' placeholder' => 'E-mail']); ?>
                            <?php echo $this->Form->control('senha', ['label' => false, 'type' => 'password', ' placeholder' => 'senha']); ?>

                            <?php echo $this->Form->button('Login'); ?>

                            <?= $this->Form->end() ?>

                            <div class="text-center mt-20"><a href="forgot-password.html">Esqueci a senha</a></div>
                            <p class="font-14 text-center mt-15">Não possui acesso ?</p>
                            <p class="text-center">Solicite sua conta <a href="solicite.html">Clicando aqui.</a></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->

</div>