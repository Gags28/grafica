<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="dashboard-admin.html">Produtos</a></li>
    </ol>
</nav>

<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">

    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h2 class="hk-pg-title font-weight-600">Produtos</h2>
        </div>
    </div>
    <!-- /Title -->

    <section class="hk-sec-wrapper pa-0 pa-md-20">

        <ul class="nav nav-light nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#" class="nav-link active">Cartões</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" role="tabpanel">

            <div class="row hk-gallery pa-md-15">

                    <?php foreach ($cartao as $c) {
                        echo '<div class="card-disclaimer" card="' . $c->id . '" >' . $this->Html->image('/img/cartoes/' . $c->image) . '</div>';
                    } ?>

                </div>
            </div>
        </div>
    </section>

</div>