


listarClasses();
listarAlunos();


function listarClasses(){

	$.ajax({

		url: "tabelaClasses",
		ajax: 'dados.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			var tamanhoPagina = 10;
			var pagina = 0;

			function paginar() {

				$('#tabelaClasses').html('');


				for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
					$('#tabelaClasses').append(
						$('<tr>')
						.append($('<td>').append(dados[i].nome_classe))
						.append($('<td>').append(dados[i].nome_disciplina))
						.append(
							'<td><button type="button" onclick="javascript:redirectAlunos();" class="btn btn-sm btn-primary mr-2" >Boletins</button>'+
							'</td>'
							)
						)
				}
				$('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
			}

			function ajustarBotoes() {
				$('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
				$('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
			}

			$(function() {
				$('#proximo').click(function() {
					if (pagina < dados.length / tamanhoPagina - 1) {
						pagina++;
						paginar();
						ajustarBotoes();
					}
				});
				$('#anterior').click(function() {
					if (pagina > 0) {
						pagina--;
						paginar();
						ajustarBotoes();
					}
				});
				paginar();
				ajustarBotoes();
			});


		}

	});


}

function listarAlunos(){

	$.ajax({

		url: "tabelaAlunos",
		ajax: 'dados.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			dadosGlobaisAluno = dados;

			$('#tabelaAlunos').html('');

			if(dados.length > 0)
			{

				for (var i = 0; i < dados.length; i++) 
				{	
					if(dados[i].id_nota === null){

						$('#tabelaAlunos').append(
						'<tr>'+			
						'<td>'+ dados[i].nome_usuario +'</td>'+
						'<td colspan="5"><center>Nenhum boletim gerado para este aluno.</center></td>'+
						'<td>'+
						'<button type="button" onclick="javascript:modalGerarBoletim('+ i +');" class="btn btn-sm btn-primary mr-2" >Gerar Boletim</button>' +
						'</td>'+		
						'</tr>'	

						);

					}else{


						$('#tabelaAlunos').append(
						'<tr>'+			
						'<td>'+ dados[i].nome_usuario +'</td>'+
						'<td>'+ dados[i].nota1 +'</td>'+
						'<td>'+ dados[i].nota2 +'</td>'+
						'<td>'+ dados[i].nota3 +'</td>'+
						'<td>'+ dados[i].nota4 +'</td>'+
						'<td>'+ dados[i].media +'</td>'+
						'<td>'+
						'<button type="button" onclick="javascript:modalEditarBoletim('+ i +');" class="btn btn-sm btn-success mr-2" >Editar Boletim</button>'+
						'</td>'+		
						'</tr>'	

						);
					}


					
				}

			}else
			{
				$('#tabelaAlunos').append(

					'<td colspan="6"></td>'+
					'<center class="mt-4" text-center>'+
					'<div class="col-md-12 text-center">'+
					'<div class="alert alert-danger text-danger">'+
					'<i class="fas fa-exclamation-circle"></i>Nenhum usuário cadastrado'+		
					'</div>'+
					'</div>'+	
					'</center>'+		
					'</td>'	

					);

			}
		}

	});


}


function redirectAlunos(){

	window.location.href = "listaAlunosProfessor";



}

function modalGerarBoletim(id){


	$('#modalGerarBoletim').modal('show');

	$('#tituloNome').html(dadosGlobaisAluno[id].nome_usuario);
	$('#tituloClasse').html(dadosGlobaisAluno[id].nome_classe);
	$('#tituloDisciplina').html(dadosGlobaisAluno[id].nome_disciplina);

	$('#idAluno').val(dadosGlobaisAluno[id].id_aluno);
	$('#disciplinaAluno').val(dadosGlobaisAluno[id].id_disciplina);
	

}

$('#formGerarBoletim').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = cadastrarNotas(dados);

});


function cadastrarNotas(dados){


	$.ajax({
		type: "POST",
		data: dados.serialize(),
		url: "cadastrarNotas",
		dataType: 'json',

		beforeSend: function(){


			$('#nota1').prop("disabled",true);
			$('#nota2').prop("disabled",true);
			$('#nota3').prop("disabled",true);
			$('#nota4').prop("disabled",true);
			$('#botaoCadastrarNotas').text('Cadastrar').prop("disabled",true);
			


		},

		success: function(retorno){

			if(retorno.ret === false)
			{

				$('#erroMsgEditar').html(

					'<div class="col-md-12">'+	
					'<div class="alert alert-danger" alert-dismissible role="alert">' +
					'<strong> Erro! </strong> <br>' +
					retorno.msg +
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'
					);

				$('#nota1').prop("disabled",false);
				$('#nota2').prop("disabled",false);
				$('#nota3').prop("disabled",false);
				$('#nota4').prop("disabled",false);
				$('#botaoCadastrarNotas').prop("disabled",false);

				$('.alert').delay(5000).slideUp(500, function(){$(this).alert('close'); });

			} else
			{

				$('#sucessoMsg').html(
					'<div class="col-md-12">'+	
					'<div class="alert alert-success alert-dismissible" role="alert">'+
					'<strong>Sucesso!</strong><br>'+
					retorno.msg+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'

					);

				$('#formGerarboletim').each(function(){
					this.reset();
				});

				$('#nota1').prop("disabled",false);
				$('#nota2').prop("disabled",false);
				$('#nota3').prop("disabled",false);
				$('#nota4').prop("disabled",false);
				$('#botaoCadastrarNotas').prop("disabled",false);

				$('#modalGerarBoletim').modal('hide');

				listarAlunos();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}


		},

	});
}


function modalEditarBoletim(id){


	$('#modalEditarBoletim').modal('show');

	$('#tituloNomeEditar').html(dadosGlobaisAluno[id].nome_usuario);
	$('#tituloClasseEditar').html(dadosGlobaisAluno[id].nome_classe);
	$('#tituloDisciplinaEditar').html(dadosGlobaisAluno[id].nome_disciplina);

	$('#idNota').val(dadosGlobaisAluno[id].id_nota);
	$('#nota1Editar').val(dadosGlobaisAluno[id].nota1);
	$('#nota2Editar').val(dadosGlobaisAluno[id].nota2);
	$('#nota3Editar').val(dadosGlobaisAluno[id].nota3);
	$('#nota4Editar').val(dadosGlobaisAluno[id].nota4);
	

}

$('#formEditarBoletim').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = editarNotas(dados);

});


function editarNotas(dados){


	$.ajax({
		type: "POST",
		data: dados.serialize(),
		url: "editarNotas",
		dataType: 'json',

		beforeSend: function(){


			$('#nota1Editar').prop("disabled",true);
			$('#nota2Editar').prop("disabled",true);
			$('#nota3Editar').prop("disabled",true);
			$('#nota4Editar').prop("disabled",true);
			$('#botaoEditarNotas').text('Editar').prop("disabled",true);
			


		},

		success: function(retorno){

			if(retorno.ret === false)
			{

				$('#erroMsgEditar').html(

					'<div class="col-md-12">'+	
					'<div class="alert alert-danger" alert-dismissible role="alert">' +
					'<strong> Erro! </strong> <br>' +
					retorno.msg +
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'
					);

				$('#nota1Editar').prop("disabled",false);
				$('#nota2Editar').prop("disabled",false);
				$('#nota3Editar').prop("disabled",false);
				$('#nota4Editar').prop("disabled",false);
				$('#botaoEditarNotas').prop("disabled",false);

				$('.alert').delay(5000).slideUp(500, function(){$(this).alert('close'); });

			} else
			{

				$('#sucessoMsg').html(
					'<div class="col-md-12">'+	
					'<div class="alert alert-success alert-dismissible" role="alert">'+
					'<strong>Sucesso!</strong><br>'+
					retorno.msg+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'

					);

				$('#formEditarBoletim').each(function(){
					this.reset();
				});

				$('#nota1Editar').prop("disabled",false);
				$('#nota2Editar').prop("disabled",false);
				$('#nota3Editar').prop("disabled",false);
				$('#nota4Editar').prop("disabled",false);
				$('#botaoEditarNotas').prop("disabled",false);

				$('#modalEditarBoletim').modal('hide');

				listarAlunos();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}


		},

	});
}


