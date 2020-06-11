    <!-- Modal -->
    <div class="modal fade" id="modal-edit-unidade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dados da Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= $this->Form->create(null, ['id' => 'edit-unidade', 'url' => ['action' => 'edit-unidade']]) ?>
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Form->control('id', ['type' => 'hidden', 'label' => 'Nome']) ?>

                            <div class="col-md-12">
                                <?= $this->Form->control('empresa_id', ['type' => 'select', 'required' => true, 'label' => 'CNPJ', 'options' => $empresas_list]) ?>
                            </div>


                            <div class="col-md-12">
                                <?= $this->Form->control('cnpj', ['required' => true, 'label' => 'CNPJ', 'class' => 'verifica-cnpj']) ?>
                            </div>

                            <div class="col-md-9">
                                <?= $this->Form->control('rua', ['required' => true, 'label' => 'Rua']) ?>
                            </div>

                            <div class="col-md-3">
                                <?= $this->Form->control('numero', ['required' => true, 'label' => 'Número']) ?>
                            </div>

                            <div class="col-md-4">
                                <?= $this->Form->control('complemento', ['required' => true, 'label' => 'Complemento']) ?>
                            </div>

                            <div class="col-md-8">
                                <?= $this->Form->control('bairro', ['required' => true, 'label' => 'Bairro']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('cidade', ['required' => true, 'label' => 'Cidade']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('estado', ['required' => true, 'label' => 'Estado']) ?>
                            </div>

                        </div>
                        <!-- /Row -->
                    </div>
                    <div class="modal-footer">
                        <?= $this->Html->link('Inativar', [], ['escape' => false, 'class' => 'btn status left-corner']) ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <?= $this->Form->end() ?>

                </div>
            </div>
        </div>