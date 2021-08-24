<!------Alerta de Sucesso-------------->

<div id="sucessoMsg" class="row" style="width: 80% ;position: absolute !important; z-index: 999999999;"></div>

<!------Botão Cadastrar-------------->

<div class="row" style="width: 80%;margin-left: 10px">
	<button type="button" onclick="javascript:modalCadastrarDisciplina();" class="btn btn-sm btn-success mr-2"> Nova Disciplina</button>


</div>


<!------Tabela de Listagem-------------->
<br>
<table class="table mt-4 table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody id="tabelaDisciplina">


	</tbody>	
</table>


<!----------------------INICIO DO MODAL CADASTRAR----------------------------------->

<div id="modalCadastrarDisciplina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">
			<!-- MODAL HEADER ------------------------------------- -->
			<div class="modal-header">

				<div class="col-md-12" style="text-align: right;">
					<button type="button" class="btn btn-default" data-dismiss="modal">X</button>

				</div>

				<h3 style="display:block; text-align:center;">Cadastro Disciplina</h3>
			</div>

			<form id="formCadastrarDisciplina">
				<div id="erroMsgCadastrar"></div>
				<!-- MODAL BODY ------------------------------------- -->
				<div class="modal-body">
	
					<div class="form-group">
						<label for="nomeCadastrar">Nome</label>
						<input type="text" class="form-control" id="nomeCadastrar" autofocus name="nomeCadastrar" autocomplete="off" required>
					</div>

					
				</div>
				<!-- MODAL FOOTER ------------------------------------- -->
				<div class="modal-footer">
					<button type="submit" id="botaoCadastrar" class="form-control btn btn-primary"> Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!----------------------FIM DO MODAL CADASTRAR----------------------------------->


<!----------------------INICIO DO MODAL EDITAR----------------------------------->

<div id="modalEditarDisciplina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">


		<div class="modal-content">
			<!-- MODAL HEADER ------------------------------------- -->
			<div class="modal-header">

				<div class="col-md-12" style="text-align: right;">
					<button type="button" class="btn btn-default" data-dismiss="modal">X</button>

				</div>

				<h3 style="display:block; text-align:center;">Editar - <strong id="tituloNome"></strong></h3>
			</div>

			<form id="formEditarDisciplina">
				<div id="erroMsgEditar"></div>
				<!-- MODAL BODY ------------------------------------- -->
				<div class="modal-body">

					<input type="hidden" name="idEditar" id="idEditar"/>
					<div class="form-group">
						<label for="nomeEditar">Nome</label>
						<input type="text" class="form-control" id="nomeEditar" autofocus name="nomeEditar" autocomplete="off">
					</div>
					
				</div>
				<!-- MODAL FOOTER ------------------------------------- -->
				<div class="modal-footer">
					<button type="submit" id="botaoEditar" class="btn btn-primary">Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!----------------------FIM DO MODAL EDITAR----------------------------------------->


<!----------------------INICIO DO MODAL DESATIVAR----------------------------------->

<div id="modalDesativarDisciplina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<!-- MODAL HEADER ------------------------------------------------------->
			<div class="modal-header">
				<h3 style="display:block; text-align:center;">Excluir Usuário</h3>
			</div>

			<form id="formDesativarDisciplina">
				<div id="erroMsgDesativar"></div>

				<input type="hidden" name="idDesativar" id="idDesativar">
	
				<!-- MODAL BODY --------------------------------------------------------->
				<div class="modal-body">

					<p>Deseja excluir o usuário <strong id="tituloDesativar"></strong> ?</p>
					<p>Após confirmação, esta ação não poderá ser desfeita.</p>	

				</div>
				<!-- MODAL FOOTER ------------------------------------- -->
				<div class="modal-footer">
					<button type="submit" id="botaoDesativar" class="btn btn-success"> Sim</button>
					<button type="button" class="btn btn-info" data-dismiss="modal"> Não</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!----------------------FIM DO MODAL DESATIVAR----------------------------------->

