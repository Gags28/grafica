    <!-- Modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dados da Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= $this->Form->create(null, ['id' => 'edit-empresa', 'url' => ['action' => 'edit']]) ?>
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Form->control('id', ['type' => 'hidden', 'label' => 'Nome']) ?>
                            <?= $this->Form->control('nome', ['label' => 'Nome']) ?>

                            <h5 class="modal-title">Dados do Responsável</h5>

                            <?= $this->Form->control('nome_resposavel', ['label' => 'Nome do Responsável']) ?>
                            <?= $this->Form->control('email_responsavel', ['label' => 'E-mail do Responsável']) ?>
                            <?= $this->Form->control('telefone_responsavel', ['label' => 'Telefone do Responsável']) ?>
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