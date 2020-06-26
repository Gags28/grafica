  <!-- Modal -->
  <div id="detalhes-pedido" class="modal fade" id="exampleModalLarge01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge01" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Pedido <span class="pedido-id"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!-- Row -->
                  <div class="row">
                      <div class="col-xl-12">
                          <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                              <div class="invoice-from-wrap">
                                  <div class="row">
                                      <div class="col-md-7 mb-20">
                                          <?= $this->Html->image('logo-light.png', ['alt' => 'logo', 'style' => 'max-width: 150px', 'class' => 'img-fluid invoice-brand-img d-block mb-20']) ?>
                                          <h6 class="mb-5">MultiGraph</h6>
                                          <address>
                                              <span class="d-block">Rua Paraná, 320</span>
                                              <span class="d-block">Ribeirão Preto - SP</span>
                                              <span class="d-block">comercial@multigraph.com.br</span>
                                          </address>
                                      </div>
                                      <div class="col-md-5 mb-20">
                                          <h4 class="mb-30 font-weight-600">Detalhes do pedido</h4>
                                          <span class="d-block">
                                              <select class="form-control custom-select mt-0 mb-10">
                                                  <option selected="">A Produzir</option>
                                                  <option value="1">Produzindo</option>
                                                  <option value="1">Finalizado</option>
                                              </select></span>
                                          <span class="d-block" id="data-pedido"> </span>
                                          <span class="d-block" id="empresa"> </span>
                                      </div>
                                  </div>
                              </div>
                              <hr class="mt-0">
                              <div class="invoice-to-wrap pb-10">
                                  <div class="row">
                                      <div class="col-md-7 mb-30">
                                          <span class="d-block text-uppercase mb-5 font-13">Dados de Faturamento</span>
                                          <address id="faturamento">

                                          </address>
                                      </div>
                                      <div class="col-md-5 mb-30">
                                          <span class="d-block text-uppercase mb-5 font-13">Dados Entrega</span>
                                          <span class="d-block" id="endereco"> </span>
                                          <span class="d-block" id="usuario-pedido">Solicitante: <span class="text-dark">Carlos Alberto Santos</span></span>
                                          <span class="d-block" id="usuario-email">Email: <span class="text-dark">carlosalberto@rte.com.br</span></span>
                                      </div>
                                  </div>
                              </div>
                              <h5>Items</h5>
                              <hr>
                              <div class="invoice-details">
                                  <div class="table-wrap">
                                      <div class="table-responsive">
                                          <table class="table table-striped table-border mb-0">
                                              <thead>
                                                  <tr>
                                                      <th class="w-70">Produto</th>
                                                      <th class="text-right">Quantidade</th>
                                                      <th class="text-right">Gerar Cartão</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="cartoes">
                                                
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>

                          </section>
                      </div>
                  </div>
                  <!-- /Row -->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary">Salvar</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Modal -->