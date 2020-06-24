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
            <h2 class="hk-pg-title font-weight-600">Preencha os dados do cartão</h2>
        </div>
    </div>
    <!-- /Title -->

    <?php echo $this->Form->create(null, ['url' => ['action' => 'add-carrinho', $id]]) ?>

    <section class="hk-sec-wrapper pa-0 pa-md-20">
        <div class="col-md-6">

            <?php foreach ($campos as $cam) {
                if (in_array($cam, ['nome', 'nome-completo'])) {
                    echo $this->Form->select2($cam, ['required' => true, 'id' => $cam, 'label' => ucfirst(str_replace('-', ' ', $cam)), 'tags' => true, 'placeholder' => 'Selecione ou adicione um funcionário', 'empty' => 'Selecione ou adicione um funcionário', 'value' => '', 'options' => $funcionarios]);
                } else {
                    echo $this->Form->control($cam, ['required' => true, 'id' => $cam, 'label' => ucfirst(str_replace('-', ' ', $cam))]);
                }
            } ?>

            <?= $this->Form->quantidade('quantidade', ['required' => true, 'label' => 'Quantidade de cartões']) ?>

        </div>

        <div class="col-md-6">
            <?php echo $this->Html->image('cartoes/' . $cartao->image) ?>
            <?php echo $this->Html->image('cartoes/' . $cartao->image_verso) ?>
        </div>
        <div class="clearfix"></div>

    </section>


    <div class="row">
        <div class="col-12 col-lg-12">
            <?php echo $this->Form->button('Próximo', ['class' => 'btn btn-primary btn-block mt-15 mb-15']) ?>
        </div>
    </div>

    <?php echo $this->Form->end() ?>

</div>


<?php echo $this->Html->script('/js/panel/pedidos/card.js', ['block' => 'script']) ?>