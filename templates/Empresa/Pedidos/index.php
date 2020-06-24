<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="dashboard-admin.html">Pedidos</a></li>
    </ol>
</nav>

<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Pedidos</h2>
        </div>
    </div>
    <!-- /Title -->

    <div class="pa-0 justify-content-end pb-15 pt-10 text-right">
        <?= $this->Html->link('Novo Pedido',['controller'=>'pedidos', 'action'=>'add'],['escape'=>false,'class'=>'btn btn-primary btn-wth-icon btn justify-content-end ']) ?>
    </div>

    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="table-wrap">
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Cartão</th>
                            <th>Quantidade</th>
                            <th>Data</th>
                            <th>Entrega</th>
                            <th>Faturamento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pedidos as $p) { ?>
                            <tr>
                                <td> <?= $p->carto->nome ?> </td>
                                <td> <?= $p->quantidade ?> </td>
                                <td> <?= $p->pedido->data ?> </td>
                                <td> <?= $p->entrega ?> </td>
                                <td> <?= $this->Number->documento($p->pedido->empresa_cnpj->cnpj) ?> </td>
                                <td>
                                    <?= $this->Number->pedidos($p->pedido->status) ?>
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