

listarClasses();

function listarClasses(){

	$.ajax({

		url: "listarClasses",
		ajax: 'dados2.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			dadosGlobaisClasse = dados; //Variavel Global é preenchida para utilizar posteriormente na Edição/Exclusão
			
			var tamanhoPagina = 10;
			var pagina = 0;

			function paginar() {
			    $('#tabelaClasse').html();
			   
			    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
			        $('#tabelaClasse').append(
			            $('<tr>')
			                .append($('<td>').append(dados[i].id_classe))
			                .append($('<td>').append(dados[i].nome_classe))
			                .append(
			                	'<td><button type="button" onclick="javascript:modalEditarClasse('+ i +');" class="btn btn-sm btn-default mr-2" ><i class="glyphicon glyphicon-cog"></i></button>'+
			                	'<td><button type="button" onclick="javascript:modalEditarClasse('+ i +');" class="btn btn-sm btn-primary mr-2" >Editar</button>'+
								' '+
								'<button type="button" onclick="javascript:modalDesativarClasse('+ i +');" class="btn btn-sm btn-danger mr-2" >Desabilitar</button></td>'
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

////// CADASTRO CLASSE  ///////////////////////////////////////////////////////////////////////////////////////////
$('#formCadastrarClasse').submit(function(e) 
{
	e.preventDefault();
	var dados = $(this);
	var retorno = cadastrarClasse(dados);

});

function modalCadastrarClasse(){

	$('#modalCadastrarClasse').modal('show');

} 

function cadastrarClasse(dados)
{

	$.ajax({ //Abrindo o AJAX

		type: "POST",
		data: dados.serialize(),
		url: "cadastrarClasse",
		dataType: 'json',

		beforeSend: function()
		{
			$('#nomeCadastrar').prop("disabled",true);
		

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

				$('#formCadastrarClasse').each(function(){
					this.reset();
				});
				

				$('#modalCadastrarClasse').modal('hide');

				listarClasses();

				$('.alert').delay(5000).slideUp(500, function(){ $(this).alert('close');});


			}
		}


	}); //Fechando o AJAX

}

////// EDITAR ALUNO ///////////////////////////////////////////////////////////////////////////////////////////
function modalEditarClasse(att){

	$('#modalEditarClasse').modal('show');

	$('#tituloNome').html(dadosGlobaisAluno[att].nome_aluno);

	$('#idEditar').val(dadosGlobaisAluno[att].id_usuario);
	$('#nomeEditar').val(dadosGlobaisAluno[att].nome_aluno);
	

} 

$('#formEditarClasse').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = atualizarDadosClasse(dados);

});

function atualizarDadosClasse(dados){

	$.ajax({
		type: "POST",
		data: dados.serialize(),
		url: "editarClasse",
		dataType: 'json',

		beforeSend: function(){


			$('#nomeEditar').prop("disabled",true);
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

				$('#formEditarClasse').each(function(){
					this.reset();
				});

				$('#nomeEditar').prop("disabled",false);
				$('#botaoEditar').prop("disabled",false);

				$('#modalEditarClasse').modal('hide');

				listarClasses();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}


		},

	});
}

////// DESATIVAR ///////////////////////////////////////////////////////////////////////////////////////////


function modalDesativarClasse(del){

	$('#modalDesativarClasse').modal('show');

	$('#tituloDesativar').html(dadosGlobaisAluno[del].nome_aluno);
	$('#idDesativar').val(dadosGlobaisAluno[del].id_usuario);
	$('#statDesativar').val(dadosGlobaisAluno[del].stat);
	$('#botaoDesativar').text('Sim').prop("disabled",false);
	
}

$('#formDesativarClasse').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = desabilitarDadosClasse(dados);

}); 

function desabilitarDadosClasse(dados){

	$.ajax({

		type: "POST",
		data: dados.serialize(),
		url: "desabilitarClasse",
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

				$('#modalDesativarClasse').modal('hide');

				listarClasses();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}
		}



	});

}
