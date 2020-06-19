<div class="hk-pg-wrapper">

    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <h4 class="hk-pg-title mb-15">Preencha os dados do cartão</h4>
        <!-- /Title -->

        <?php echo $this->Form->create(null, ['url' => ['action' => 'add-carrinho']]) ?>


        <section class="hk-sec-wrapper hk-gallery-wrap">
            <div class="col-md-6">

                <?php foreach ($campos as $cam) {
                    if (in_array($cam, ['nome', 'nome-completo'])) {
                        echo $this->Form->select2($cam, ['id' => $cam, 'label' => ucfirst(str_replace('-', ' ', $cam)), 'tags' => true, 'placeholder' => 'Selecione ou adicione um funcionário', 'empty' => 'Selecione ou adicione um funcionário', 'value' => '', 'options' => $funcionarios]);
                    } else {
                        echo $this->Form->control($cam, ['id' => $cam, 'label' => ucfirst(str_replace('-', ' ', $cam))]);
                    }
                } ?>

                <?= $this->Form->control('quantidade', ['label' => 'Quantidade de cartões', 'options' => ['200', '500', '1000']]) ?>

            </div>

            <div class="col-md-6">
                <?php echo $this->Html->image('cartoes/' . $cartao->image) ?>
                <?php echo $this->Html->image('cartoes/' . $cartao->image_verso) ?>
            </div>
            <div class="clearfix"></div>
        </section>

        <div class="row">
            <div class="col-12 col-lg-8">
                <?php echo $this->Form->button('Próximo', ['class' => 'btn btn-primary btn-block mt-15 mb-15']) ?>
            </div>
        </div>

        <?php echo $this->Form->end() ?>
    </div>
</div>

<?php echo $this->Html->script('/js/panel/pedidos/card.js', ['block' => 'script']) ?>