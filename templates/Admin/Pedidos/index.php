<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Pedidos</h2>
        </div>
    </div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>

    <div class="hk-pg-header mb-10">
        <div>
            <h4 class="hk-pg-title font-weight-600">Pedidos em Aberto</h4>
        </div>
    </div>
    <!-- /Title -->
    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Empresa</th>
                            <th>Data do pedido</th>
                            <th>Status</th>
                            <th>Urgência</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos_aberto as $pedidoa) { ?>
                            <tr>
                                <td> <?= $pedidoa->empresa_cnpj->empresa->nome ?> </td>
                                <td> <?= $pedidoa->data ?> </td>
                                <td> <?= $this->Number->pedidos($pedidoa->status) ?> </td>
                                <td> <?= $this->Number->urgencia($pedidoa->urgencia) ?> </td>
                                <td>
                                    <a class="pedido-show" href="#" pedido-id="<?= $pedidoa->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
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

    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>

    <div class="hk-pg-header mb-10">
        <div>
            <h4 class="hk-pg-title font-weight-600">Pedidos em Produção</h4>
        </div>
    </div>
    <!-- /Title -->
    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Empresa</th>
                            <th>Data do pedido</th>
                            <th>Status</th>
                            <th>Urgência</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos_produzindo as $pedidop) { ?>
                            <tr>
                                <td> <?= $pedidop->empresa_cnpj->empresa->nome ?> </td>
                                <td> <?= $pedidop->data ?> </td>
                                <td> <?= $this->Number->pedidos($pedidop->status) ?> </td>
                                <td> <?= $this->Number->urgencia($pedidop->urgencia) ?> </td>
                                <td>
                                    <a class="pedido-show" href="#" pedido-id="<?= $pedidop->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
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


    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>
    <div class="hk-pg-header mb-10"></div>

    <div class="hk-pg-header mb-10">
        <div>
            <h4 class="hk-pg-title font-weight-600">Pedidos Finalizado</h4>
        </div>
    </div>
    <!-- /Title -->
    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Empresa</th>
                            <th>Data do pedido</th>
                            <th>Status</th>
                            <th>Urgência</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos_finalizados as $pedidof) { ?>
                            <tr>
                                <td> <?= $pedidof->empresa_cnpj->empresa->nome ?> </td>
                                <td> <?= $pedidof->data ?> </td>
                                <td> <?= $this->Number->pedidos($pedidof->status) ?> </td>
                                <td> <?= $this->Number->urgencia($pedidof->urgencia) ?> </td>
                                <td>
                                    <a class="pedido-show" href="#" pedido-id="<?= $pedidof->id ?>" data-toggle="modal" data-target="#exampleModalLarge01">
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

<?= $this->element('pages/pedidos/detalhes_pedido') ?>
<?= $this->Html->script('/js/moment/moment.js', ['block' => 'script']) ?>
<?= $this->Html->script('/js/panel/pedidos/pedidos.js', ['block' => 'script']) ?>
