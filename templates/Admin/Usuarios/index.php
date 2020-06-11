<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Usuarios</h2>
        </div>
    </div>
    <!-- /Title -->

    <div class="pa-0 justify-content-end pb-15 pt-10 text-right">
        <button class="btn btn-primary btn-wth-icon btn justify-content-end add-user">Novo Usuario</button>
    </div>

    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Empresa</th>
                            <th>Usuário</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user) { ?>
                            <tr>
                                <td> <?= $user->nome ?> </td>
                                <td> <?= $user->email ?> </td>
                                <td> <?= $this->Number->foneCelular($user->telefone) ?> </td>
                                <td> <?= $user->empresa_cnpj->empresa->nome ?> </td>
                                <td>
                                    <?= $this->Number->active($user->status) ?>
                                    <?= $this->Number->user($user->tipo) ?>
                                </td>
                                <td>
                                    <a class="edit-user" href="#" user-id="<?= $user->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
                                        <div data-icon="m" class="icon"></div>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </section>

    <?= $this->element('helpers/paginator') ?> 

</div>

<?= $this->element('pages/usuarios/modal_edit') ?> 
<?= $this->element('pages/usuarios/modal_add') ?> 

<?php echo $this->Html->script('/js/panel/usuarios/user.js', ['block' => 'script']) ?>
