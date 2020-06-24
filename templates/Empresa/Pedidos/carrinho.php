<?= $this->Html->css('/plugins/jquery-steps/demo/css/jquery.steps.css', ['block' => 'script']); ?>

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="dashboard-admin">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<?= $this->Form->create(null, ['action' => 'fechar-carrinho']) ?>

<!-- Container -->
<div class="container">
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div id="example-basic">
                <h3>
                    <span class="wizard-icon-wrap"><i class="ion ion-md-basket"></i></span>
                    <span class="wizard-head-text-wrap">
                        <span class="step-head">Revisão do pedido</span>
                    </span>
                </h3>
                <section>
                    <h3 class="display-4 mb-40">Carrinho Pedidos</h3>
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
                                                        <?= $this->Html->link(' <span aria-hidden="true">&times;</span>', ['controller' => 'pedidos', 'action' => 'remover', $key], ['escape' => false, 'class' => '']) ?>
                                                    </td>
                                                    <td>Cartão - <?= $pro['campos'][0]['valor'] ?></td>
                                                    <td class="text-dark"> <?= $pro['quantidade'] ?> </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <?php echo $this->Html->link('Adicionar Outro itens', ['action' => 'add'], ['id' => 'card', 'class' => 'mt-20']) ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <h3>
                    <span class="wizard-icon-wrap"><i class="ion ion-md-airplane"></i></span>
                    <span class="wizard-head-text-wrap">
                        <span class="step-head">Entrega</span>
                    </span>
                </h3>
                <section>
                    <h3 class="display-4 mb-40">Dados da entrega</h3>
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-40">
                            <div class="custom-control custom-radio">
                                <input id="entrega" name="entrega" class="custom-control-input" value="0" type="radio">
                                <label class="custom-control-label" for="entrega">Retirar na gráfica</label>
                            </div>
                            <?= $enderecoGrafica ?>
                        </div>

                        <?php foreach ($unidades as $u) { ?>

                            <div class="col-lg-6 col-12 mb-40">
                                <div class="custom-control custom-radio">
                                    <input id="entrega<?= $u->id ?>" name="entrega" value="<?= $u->id ?>" class="custom-control-input" type="radio">
                                    <label class="custom-control-label" for="entrega<?= $u->id ?>">Entregar no endereço</label>
                                </div>
                                <?= $u->rua . ', ' . $u->numero . ', ' . $u->rua . ', ' . ((isset($u->complemento)) ? $u->complemento . ', ' : ' ') . $u->bairro . ', ' . $u->cidade . ' - ' . $u->estado ?>
                            </div>

                        <?php } ?>

                        <div class="col-lg-6 col-12 mb-40">

                            Prioridade de impressão:
                            <select class="form-control custom-select  mt-0">
                                <option selected="">Normal</option>
                                <option value="1">Urgente</option>
                            </select>
                        </div>
                    </div>
                </section>
                <h3>
                    <span class="wizard-icon-wrap"><i class="ion ion-md-card"></i></span>
                    <span class="wizard-head-text-wrap">
                        <span class="step-head">Faturamento</span>
                    </span>
                </h3>
                <section>
                    <div class="col-12">
                        <h3 class="display-4 mb-40">Escolha opção de faturamento</h3>
                        Faturar para o CNPJ cadastrado:<br><br>


                        <?php foreach ($unidades as $f) { ?>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="faturamento" id="faturamento<?= $f->id ?>" value="<?= $f->id ?>" checked>
                                <label class="form-check-label" for="faturamento<?= $f->id ?>">
                                   CNPJ: <?= $this->Number->documento($f->cnpj) ?><br>
                                   Empresa: <?= $f->empresa->nome ?>
                            </div>

                        <?php } ?>

                    </div>

                </section>
                <h3>
                    <span class="wizard-icon-wrap"><i class="ion ion-md-checkmark-circle-outline"></i></span>
                    <span class="wizard-head-text-wrap">
                        <span class="step-head">ENVIAR PEDIDO</span>
                    </span>
                </h3>
                <section>
                    <h3 class="display-4 mb-40">Detalhes do pedido</h3>
                    <div class="row">
                        <div class="col-xl-12 mb-20">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th>Produto</th>
                                                <th>Quantidades</th>
                                            </tr>
                                            <?php foreach ($produtos as $key => $pro) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $this->Html->link(' <span aria-hidden="true">&times;</span>', ['controller' => 'pedidos', 'action' => 'remover', $key], ['escape' => false, 'class' => '']) ?>
                                                    </td>
                                                    <td>Cartão - <?= $pro['campos'][0]['valor'] ?></td>
                                                    <td class="text-dark"> <?= $pro['quantidade'] ?> </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-20">

                            <button class="btn btn-primary btn-block mb-10" type="submit">Envie seu Pedido</button>
                            <small class="d-block text-center">Ao enviar o pedido você concorda com os <a href="#">termos e condiçoes do sistema</a> to use.</small>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->

<?= $this->Form->end() ?>

<?= $this->Html->script('/js/form-wizard-data.js', ['block' => 'script']); ?>
<?= $this->Html->script('/plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('/plugins/bootstrap-input-spinner/src/bootstrap-input-spinner.js', ['block' => 'script']); ?>
<?= $this->Html->script('/plugins/jquery-steps/build/jquery.steps.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('/plugins/jquery-steps/build/jquery.steps.min.js', ['block' => 'script']); ?>