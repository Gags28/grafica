<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="dashboard-admin.html">Pedidos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo Pedido</li>
    </ol>
</nav>

<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">

    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Confirmar Pedido</h2>
        </div>
    </div>
    <!-- /Title -->

    <section class="hk-sec-wrapper pa-0 pa-md-20">

        <div class="col-md-6 pa-0 ">
            <p class="mb-10">Último pedido</p>
            <?php $url = '/css/templates' . $cartao->css ?>
            <?= $this->Html->css($url) ?>
            <?= $this->element('templates\cartoes' . $cartao->html) ?>
        </div>

        <div class="col-md-6 pa-0">
            <div class="row">
                <div class="col-xl-12 mb-20">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Produto</th>
                                        <th>Quantidades</th>
                                    </tr>
                                    <?php foreach ($produtos as $key => $pro) { ?>
                                        <tr>
                                            <td>
                                            <?= $this->Html->link(' <span aria-hidden="true">&times;</span>',['controller'=>'pedidos', 'action'=>'remover', $key],['escape'=>false,'class'=>'']) ?>
                                            </td>
                                            <td>Cartão - <?= $pro['campos'][0]['valor'] ?></td>
                                            <td class="text-dark"> <?= $pro['quantidade'] ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $this->Html->link('Abrir Carrinho', ['action' => 'carrinho'], ['id' => 'card', 'class' => 'btn btn-primary btn-block mt-15 mb-15']) ?>
            <?php echo $this->Html->link('Adicionar Outro Cartão', ['action' => 'add'], ['id' => 'card', 'class' => 'btn btn-link mx-auto d-block']) ?>
        </div>

        <div class="clearfix"></div>
    </section>


</div>

<?php echo $this->Html->script('/js/panel/pedidos/card.js', ['block' => 'script']) ?>