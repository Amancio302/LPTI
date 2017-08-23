
<div id="Main">
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Parâmetros de Risco</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-3 col-md-6">
												<?php
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btn_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
												echo "Integrado".br().
													 form_open('Coord/parametro', $atributos).
													 form_hidden('id', $PARAMETRO[0]->idPARAMETRO_DE_RISCO).
													 form_label("Nota: ", "txt_nota").br().
													 form_input('txt_nota', $PARAMETRO[0]->NOTA).br().
													 form_label("Frequência: ", "txt_freq").br().
													 form_input('txt_freq', $PARAMETRO[0]->FREQUENCIA).br().
													 form_submit("btn_cadastrar", "Salvar Alterações", $btn).br().
													 form_close().br();
												echo "Subsequente".br().
													 form_open('Coord/parametro', $atributos).
													 form_hidden('id', $PARAMETROS[0]->idPARAMETRO_DE_RISCO).
													 form_label("Nota: ", "txt_nota").br().
													 form_input('txt_nota', $PARAMETROS[0]->NOTA).br().
													 form_label("Frequência: ", "txt_freq").br().
													 form_input('txt_freq', $PARAMETROS[0]->FREQUENCIA).br().
													 form_submit("btn_cadastrar", "Salvar Alterações", $btn).br().
													 form_close().br();
												?>
											</div>
              </div>
          </div>
        </div>
