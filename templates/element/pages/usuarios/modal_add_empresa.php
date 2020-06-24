    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dados do usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= $this->Form->create(null, ['url' => ['action' => 'add']]) ?>
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Form->control('nome', ['label' => 'Nome']) ?>
                            <?= $this->Form->control('email', ['label' => 'E-mail', 'disabled' => 'disabled ', 'class' => 'verifica-email']) ?>
                            <?= $this->Form->control('senha', ['type' => 'password', 'label' => 'Senha', 'autocomplete' => 'new-password']) ?>
                            <?= $this->Form->control('telefone', ['label' => 'Telefone']) ?>
                            <?= $this->Form->control('limite_pedidos', ['label' => 'Limite de Pedido']) ?>
                            <?= $this->Form->tipoUsuarioEmpresa('tipo', ['label' => 'Tipo de usuário']) ?>
                            <?= $this->Form->control('empresa_cnpj_id', ['id' => 'cnpj_cadastro', 'label' => 'Empresa', 'type' => 'hidden', 'value' => $empresa_id->id]) ?>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
