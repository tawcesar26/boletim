

listarAlunos();
listarClasses();


function listarAlunos(){

	$.ajax({

		url: "listarAlunos",
		ajax: 'dados.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			dadosGlobaisAluno = dados; //Variavel Global é preenchida para utilizar posteriormente na Edição/Exclusão
			
			var tamanhoPagina = 10;
			var pagina = 0;

			function paginar() {
			    $('table > tbody > tr').remove();
			    var tbody = $('table > tbody');
			    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
			        tbody.append(
			            $('<tr>')
			                .append($('<td>').append(dados[i].id_usuario))
			                .append($('<td>').append(dados[i].nome_usuario))
			                .append($('<td>').append(dados[i].nome_classe))
			                .append($('<td>').append(dados[i].email_usuario))
			                .append(
			                	'<td><button type="button" onclick="javascript:modalEditarAluno('+ i +');" class="btn btn-sm btn-primary mr-2" >Editar</button>'+
								' '+
								'<button type="button" onclick="javascript:modalDesativarAluno('+ i +');" class="btn btn-sm btn-danger mr-2" >Desabilitar</button></td>'
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


function listarClasses(){

	$.ajax({

		url: "listarClasses",
		ajax: 'dados.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			$('#selectClasse').html('');

			if(dados.length > 0)
			{
				for (var i = 0; i < dados.length; i++) 
				{
					$('#selectClasse').append(
						'<option value="'+ dados[i].id_classe +'" >'+ dados[i].nome_classe+'</option>'

						);

					$('#selectClasseEditar').append(
						'<option value="'+ dados[i].id_classe +'" >'+ dados[i].nome_classe+'</option>'

						);
				}
			}else
			{
				$('#selectClasse').append(
					'<option value="" >Nenhuma classe cadastrada</option>'
					);
				$('#selectClasseEditar').append(
					'<option value="" >Nenhuma classe cadastrada</option>'
					);
			}
		}


	});
}

////// CADASTRO ALUNO  ///////////////////////////////////////////////////////////////////////////////////////////
$('#formCadastrarAluno').submit(function(e) 
{
	e.preventDefault();
	var dados = $(this);
	var retorno = cadastrarAluno(dados);

});

function modalCadastrarAluno(){

	$('#modalCadastrarAluno').modal('show');

} 

function cadastrarAluno(dados)
{

	$.ajax({ //Abrindo o AJAX

		type: "POST",
		data: dados.serialize(),
		url: "cadastrarAluno",
		dataType: 'json',

		beforeSend: function()
		{
			$('#nomeCadastrar').prop("disabled",true);
			$('#emailCadastrar').prop("disabled",true);
			$('#senhaCadastrar').prop("disabled",true);
			$('#senha2Cadastrar').prop("disabled",true);
			$('#classeCadastrar').prop("disabled",true);
			$('#botaoCadastrar').text('Cadastrando... ').prop("disabled",true);

		},

		success: function(retorno)
		{
			if(retorno.ret === false)
			{

				$('#erroMsgCadastrar').html(

					'<div class="col-md-12">'+	
					'<div class="alert alert-danger alert-dismissible role="alert">' +
					'<strong> Erro! </strong> <br>' +
					retorno.msg +
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'
					);

				$('#nomeCadastrar').prop("disabled",false);
				$('#emailCadastrar').prop("disabled",false);
				$('#senhaCadastrar').prop("disabled",false);
				$('#senha2Cadastrar').prop("disabled",false);
				$('#classeCadastrar').prop("disabled",false);
				$('#botaoCadastrar').text('Tentar novamente... ').prop("disabled",false);

				$('.alert').delay(5000).slideUp(500, function(){$(this).alert('close');});

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

				$('#nomeCadastrar').prop("disabled",false);
				$('#emailCadastrar').prop("disabled",false);
				$('#senhaCadastrar').prop("disabled",false);
				$('#senha2Cadastrar').prop("disabled",false);
				$('#classeCadastrar').prop("disabled",false);
				$('#botaoCadastrar').prop("disabled",false);

				$('#formCadastrarAluno').each(function(){
					this.reset();
				});
				

				$('#modalCadastrarAluno').modal('hide');

				listarAlunos();

				$('.alert').delay(5000).slideUp(500, function(){ $(this).alert('close');});


			}
		}


	}); //Fechando o AJAX

}

////// EDITAR ALUNO ///////////////////////////////////////////////////////////////////////////////////////////
function modalEditarAluno(att){

	$('#modalEditarAluno').modal('show');

	$('#tituloNome').html(dadosGlobaisAluno[att].nome_aluno);

	$('#idEditar').val(dadosGlobaisAluno[att].id_usuario);
	$('#nomeEditar').val(dadosGlobaisAluno[att].nome_usuario);
	$('#emailEditar').val(dadosGlobaisAluno[att].email_usuario);
	$('#senhaEditar').val(dadosGlobaisAluno[att].senha_usuario);
	$('#senha2Editar').val(dadosGlobaisAluno[att].senha_usuario);
	$('#selectClasseEditar').val(dadosGlobaisAluno[att].id_classe);

} 

$('#formEditarAluno').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = atualizarDadosAluno(dados);

});

function atualizarDadosAluno(dados){

	$.ajax({
		type: "POST",
		data: dados.serialize(),
		url: "editarAluno",
		dataType: 'json',

		beforeSend: function(){


			$('#nomeEditar').prop("disabled",true);
			$('#emailEditar').prop("disabled",true);
			$('#senhaEditar').prop("disabled",true);
			$('#senha2Editar').prop("disabled",true);
			$('#classeEditar').prop("disabled",true);
			$('#botaoEditar').text('Editar').prop("disabled",true);
			


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

				$('#nomeEditar').prop("disabled",false);
				$('#emailEditar').prop("disabled",false);
				$('#senhaEditar').prop("disabled",false);
				$('#senha2Editar').prop("disabled",false);
				$('#classeEditar').prop("disabled",false);
				$('#statEditar').prop("disabled",false);
				$('#botaoEditar').prop("disabled",false);

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

				$('#formEditarAluno').each(function(){
					this.reset();
				});

				$('#nomeEditar').prop("disabled",false);
				$('#emailEditar').prop("disabled",false);
				$('#classeEditar').prop("disabled",false);
				$('#senhaEditar').prop("disabled",false);
				$('#senha2Editar').prop("disabled",false);
				$('#statEditar').prop("disabled",false);
				$('#botaoEditar').prop("disabled",false);

				$('#modalEditarAluno').modal('hide');

				listarAlunos();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}


		},

	});
}

////// DESATIVAR ///////////////////////////////////////////////////////////////////////////////////////////


function modalDesativarAluno(del){

	$('#modalDesativarAluno').modal('show');

	$('#tituloDesativar').html(dadosGlobaisAluno[del].nome_usuario);
	$('#idDesativar').val(dadosGlobaisAluno[del].id_usuario);
	$('#statDesativar').val(dadosGlobaisAluno[del].stat);
	$('#botaoDesativar').text('Sim').prop("disabled",false);
	
}

$('#formDesativarAluno').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = desabilitarDadosAluno(dados);

}); 

function desabilitarDadosAluno(dados){

	$.ajax({

		type: "POST",
		data: dados.serialize(),
		url: "desabilitarAluno",
		dataType: 'json',

		beforeSend: function(){

			$('#botaoDesativar').text('Sim').prop("disabled",true);

		},

		success: function(retorno){

			if(retorno.ret === false)
			{

				$('#erroMsgDesativar').html(

					'<div class="col-md-12">'+	
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
					'<strong> Erro! </strong> <br>' +
					retorno.msg +
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+
					'</div>'+
					'</div>'
					);


				$('#botaoDesabilitar').prop("disabled",false);

				$('.alert').delay(5000).slideUp(500, function(){$(this).alert('close'); });

			}
			else
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

				$('#formDesativar').each(function(){
					this.reset();
				});

				$('#botaoDesativar').prop("disabled",false);

				$('#modalDesativarAluno').modal('hide');

				listarAlunos();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}
		}



	});

}

