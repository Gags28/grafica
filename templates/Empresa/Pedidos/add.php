<!-- Main Content -->
<div class="hk-pg-wrapper">


    <!-- breadcumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="dashboard-admin.html">Pedidos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo Pedido</li>
        </ol>
    </nav>
    <!-- breadcumb -->

    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <h4 class="hk-pg-title mb-15">Selecionar Produto</h4>
        <!-- /Title -->

        <section class="hk-sec-wrapper hk-gallery-wrap">
            <ul class="nav nav-light nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Cartões</a>
                </li>
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">Crachás</a>
                        </li> -->

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" role="tabpanel">
                    <h6 class="mt-30 mb-20">Coorporativo</h6>
                    <div class="row hk-gallery">
                        
                        <?php foreach ($cartao as $c) {
                            echo '<div class="card-disclaimer" card="' . $c->id . '" >' . $this->Html->image('/img/cartoes/' . $c->image) . '</div>';
                        } ?>

                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-lg-8">
                <?php echo $this->Html->link('Próximo', ['action' => 'dados-do-cartao'], ['disabled' => 'disabled', 'id' => 'card','class' => 'btn btn-primary btn-block mt-15 mb-15']) ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script('/js/panel/pedidos/card.js', ['block' => 'script']) ?>