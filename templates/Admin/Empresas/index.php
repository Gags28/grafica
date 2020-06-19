<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Empresas</h2>
        </div>
    </div>
    <!-- /Title -->

    <div class="pa-0 justify-content-end pb-15 pt-10 text-right">
        <button class="btn btn-primary btn-wth-icon btn justify-content-end add-unidade">Adicionar Unidade</button>
        <button class="btn btn-primary btn-wth-icon btn justify-content-end add-empresa">Nova Empresa</button>
    </div>

    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nome</th>
                            <th>Responsável</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($empresas as $empresa) { ?>
                            <tr>
                                <td> <?= $empresa->nome ?> </td>
                                <td> <?= $empresa->nome_resposavel ?> </td>
                                <td> <?= $empresa->email_responsavel ?> </td>
                                <td> <?= $empresa->telefone_responsavel ?> </td>
                                <td>
                                    <?= $this->Number->active($empresa->status) ?>
                                </td>
                                <td>
                                    <a class="edit-user" href="#" empresa-id="<?= $empresa->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
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


<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Unidade</h2>
        </div>
    </div>
    <!-- /Title -->

    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Endereço</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($unidades as $unidade) { ?>
                            <tr>
                                <td> <?= $unidade->empresa->nome ?> </td>
                                <td> <?= $this->Number->documento($unidade->cnpj) ?> </td>
                                <td> <?= $unidade->rua . ', ' . $unidade->numero . ', ' . $unidade->rua . ', ' . ((isset($unidade->complemento)) ? $unidade->complemento . ', ' : ' ') . $unidade->bairro . ', ' . $unidade->cidade . ' - ' . $unidade->estado ?> </td>
                                <td>
                                    <?= $this->Number->active($unidade->status) ?>
                                </td>
                                <td>
                                    <a class="edit-unidade" href="#" unidade-id="<?= $unidade->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
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


<?= $this->element('pages/empresas/modal_edit') ?>
<?= $this->element('pages/empresas/modal_add') ?>

<?= $this->element('pages/empresas/modal_add_unidade') ?>
<?= $this->element('pages/empresas/modal_edit_unidade') ?>


<?php echo $this->Html->script('/js/panel/empresas/empresa.js', ['block' => 'script']) ?>