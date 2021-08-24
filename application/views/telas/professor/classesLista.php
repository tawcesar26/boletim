<!------Alerta de Sucesso-------------->

<div id="sucessoMsg" class="row" style="width: 80% ;position: absolute !important; z-index: 999999999;"></div>

<!------Botão Cadastrar-------------->

<div class="row" style="width: 80%;margin-left: 10px">

<!--<a href="<?php echo base_url('exportarProfessor'); ?>"> <button type="button" class="btn btn-sm btn-info mr-2"> Exportar Excel</button></a>-->


</div>

<!------Tabela de Listagem-------------->
<br>

<table class="table mt-4 table-bordered table-hover table-striped">
<thead>
	<tr>
		<th>Classe</th>
		<th>Disciplina</th>
		<th>Ações</th>
	</tr>
</thead>
<tbody id="tabelaClasses">


</tbody>	
</table>
<center>
  <ul class="pagination">
    <li class="page-item"><a id="anterior" disabled class="page-link" href="#">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#"><span id="numeracao"></span></a></li>
    <li class="page-item"><a id="proximo" disabled class="page-link" href="#">Próximo</a></li>
  </ul>
</center>




