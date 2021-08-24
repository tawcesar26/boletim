<!------Alerta de Sucesso-------------->

<div id="sucessoMsg" class="row" style="width: 80% ;position: absolute !important; z-index: 999999999;"></div>

<!------Botão Cadastrar-------------->

<div class="row" style="width: 80%;margin-left: 10px">

<a href="<?php echo base_url('listaClassesProfessor'); ?>"> <button type="button" class="btn btn-sm btn-primary mr-2"><< Voltar</button></a>


</div>

<!------Tabela de Listagem-------------->
<br>
<table class="table mt-4 table-bordered table-hover table-striped" >
<thead>
	<tr>
		<th>Nome</th>
    <th>Nota 1</th>
    <th>Nota 2</th>
    <th>Nota 3</th>
    <th>Nota 4</th>
    <th>Média</th>
		<th>Ações</th>
	</tr>
</thead>

<tbody id="tabelaAlunos">

</tbody>

</table>



<!-- GERAR BOLETIM----------------------------------------------------------------------------------------------------------------------------------->

<div id="modalGerarBoletim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">


  <div class="modal-content">
    <!-- MODAL HEADER ------------------------------------- -->
    <div class="modal-header">

      <div class="col-md-12" style="text-align: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>

      </div>

      <h3 style="display:block; text-align:center;">Boletim</h3>
    </div>

    <form id="formGerarBoletim">
      <div id="erroMsgEditar"></div>
      <!-- MODAL BODY ------------------------------------- -->
      <div class="modal-body">

            <div class="box-body">
                  <h4>Dados do Aluno</h4>
                <p><b>Nome: </b><em id="tituloNome"></em></p>
                <input type="text" id="idAluno" name="idAluno">

                <p><b>Classe: </b><em id="tituloClasse"></em></p>

                <p><b>Disciplina: </b><em id="tituloDisciplina"></em></p>
                 <input type="text" id="disciplinaAluno" name="disciplinaAluno"><br><br>
              <div class="row">
                <div class="col-xs-3">
                  <label for="nota1">Nota 1</label>
                  <input type="number" class="form-control" id="nota1" name="nota1" step="0.1" min="0" value="0"  max="10" >
                </div>
                <div class="col-xs-3">
                  <label for="nota2">Nota 2</label>
                  <input type="number" class="form-control" id="nota2" name="nota2" step="0.1" min="0" value="0" max="10">
                </div>
                <div class="col-xs-3">
                  <label for="nota3">Nota 3</label>
                  <input type="number" class="form-control" id="nota3" name="nota3" step="0.1" min="0" value="0" max="10">
                </div>
                 <div class="col-xs-3">
                  <label for="nota4">Nota 4</label>
                  <input type="number" class="form-control" id="nota4" name="nota4" step="0.1" min="0" value="0" max="10">
                </div>

              </div>
            </div>

        </div>
        <!-- MODAL FOOTER ------------------------------------- -->
        <div class="modal-footer">
          <button type="submit" id="botaoCadastrarNotas" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- EDITAR BOLETIM---------------------------------------------------------------------------------------------------------------------------------------->

<div id="modalEditarBoletim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">


  <div class="modal-content">
    <!-- MODAL HEADER ------------------------------------- -->
    <div class="modal-header">

      <div class="col-md-12" style="text-align: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>

      </div>

      <h3 style="display:block; text-align:center;">Boletim</h3>
    </div>

    <form id="formEditarBoletim">
      <div id="erroMsgEditar"></div>
      <!-- MODAL BODY ------------------------------------- -->
      <div class="modal-body">

            <div class="box-body">
                  <h4>Dados do Aluno</h4>
                <p><b>Nome: </b><em id="tituloNomeEditar"></em></p>
                <input type="text" id="idNota" name="idNota">


                <p><b>Classe: </b><em id="tituloClasseEditar"></em></p>

                <p><b>Disciplina: </b><em id="tituloDisciplinaEditar"></em></p>
                 <input type="hidden" id="disciplinaAlunoEditar" name="disciplinaAluno"><br><br>
              <div class="row">
                <div class="col-xs-3">
                  <label for="nota1">Nota 1</label>
                  <input type="number" class="form-control" id="nota1Editar" name="nota1Editar" step="0.1" min="0" value="0"  max="10" >
                </div>
                <div class="col-xs-3">
                  <label for="nota2">Nota 2</label>
                  <input type="number" class="form-control" id="nota2Editar" name="nota2Editar" step="0.1" min="0" value="0" max="10">
                </div>
                <div class="col-xs-3">
                  <label for="nota3">Nota 3</label>
                  <input type="number" class="form-control" id="nota3Editar" name="nota3Editar" step="0.1" min="0" value="0" max="10">
                </div>
                 <div class="col-xs-3">
                  <label for="nota4">Nota 4</label>
                  <input type="number" class="form-control" id="nota4Editar" name="nota4Editar" step="0.1" min="0" value="0" max="10">
                </div>

              </div>
            </div>

        </div>
        <!-- MODAL FOOTER ------------------------------------- -->
        <div class="modal-footer">
          <button type="submit" id="botaoEditarNotas" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>


