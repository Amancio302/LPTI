          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Editar Turma</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
                    <div class="col-lg-12 col-md-12" id="btn">
                                    <?php

                                        echo br()."<table id='myTable'>".
                                        "<thead>".
                                        "<tr>".
                                        "<th>Matricula</th>".
                                        "<th>Nome</th>".
                                        "<th></th>".
                                        "</tr>".
                                        "</thead>".
                                        "<tbody>";
                                        foreach($TURMA_has_ALUNO as $band){
                                            echo "<tr><td>".
                                            $band->ALUNO_idALUNO. "</td>".
                                            "<td>". $band->NOME.
                                            "<td>" . anchor('Estagiario/aExcluir/'.$band->ALUNO_idALUNO."/".$band->TURMA_idTURMA."/".$band->ANO, ' Excluir ', 'class="btn btn-danger"').
                                            "</td></tr>";
                                        }
                                        echo "</tbody></table>";
                                        $atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                                        $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                                        echo br().form_open('Estagiario/aluno2', $atributos).
                                        form_hidden('txt_ano', $band->ANO).
                                        form_hidden('Turma', $band->TURMA_idTURMA).
                                        form_label("Matricula: ", "txt_matricula").br().
                                        form_input('txt_matricula').br().
                                        form_label("Nome: ", "txt_nome").br().
                                        form_input('txt_nome').br().br().
                                        form_submit("btn_cadastrar", "Cadastrar", $btn).
                                        form_close();
                                    ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<script src="{url}assets/js/jquery.min.js"></script>
	<script src="{url}assets/js/bootstrap.min.js"></script>
    <script src="{url}assets/js/metisMenu.min.js"></script>
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>
    <script src="{url}assets/js/sb-admin-2.js"></script>
    <script>{modal}</script>
	</body>
</html>
