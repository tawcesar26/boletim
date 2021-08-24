

listarDisciplinas();


function listarDisciplinas(){

	$.ajax({

		url: "listarDisciplinas",
		ajax: 'dados.json',

		success: function(dados){

			var dados = JSON.parse(dados);

			dadosGlobaisDisciplina = dados;

			$('#tabelaDisciplina').html('');

			if(dados.length > 0)
			{

				for (var i = 0; i < dados.length; i++) 
				{
					$('#tabelaDisciplina').append(
						'<tr>'+			
						'<td>'+ dados[i].id_disciplina +'</td>'+
						'<td>'+ dados[i].nome_disciplina +'</td>'+
						'<td><button type="button" onclick="javascript:modalEditarDisciplina('+ i +');" class="btn btn-sm btn-primary mr-2" >Editar</button>'+
						' '+
						'<button type="button" onclick="javascript:modalDesativarDisciplina('+ i +');" class="btn btn-sm btn-danger mr-2" >Desabilitar</button></td>'+
						'</tr>'	

						);
				}

			}else
			{
				$('#tabelaDisciplina').append(

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

////// CADASTRO DISCIPLINA  ///////////////////////////////////////////////////////////////////////////////////////////
$('#formCadastrarDisciplina').submit(function(e) 
{
	e.preventDefault();
	var dados = $(this);
	var retorno = cadastrarDisciplina(dados);

});

function modalCadastrarDisciplina(){

	$('#modalCadastrarDisciplina').modal('show');

} 

function cadastrarDisciplina(dados)
{

	$.ajax({ //Abrindo o AJAX

		type: "POST",
		data: dados.serialize(),
		url: "cadastrarDisciplina",
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

				$('#formCadastrarDisciplina').each(function(){
					this.reset();
				});
				

				$('#modalCadastrarDisciplina').modal('hide');

				listarDisciplinas();

				$('.alert').delay(5000).slideUp(500, function(){ $(this).alert('close');});


			}
		}


	}); //Fechando o AJAX

}

////// EDITAR ALUNO ///////////////////////////////////////////////////////////////////////////////////////////
function modalEditarDisciplina(att){

	$('#modalEditarDisciplina').modal('show');

	$('#tituloNome').html(dadosGlobaisDisciplina[att].nome_disciplina);

	$('#idEditar').val(dadosGlobaisDisciplina[att].id_disciplina);
	$('#nomeEditar').val(dadosGlobaisDisciplina[att].nome_disciplina);
	

} 

$('#formEditarDisciplina').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = atualizarDadosDisciplina(dados);

});

function atualizarDadosDisciplina(dados){

	$.ajax({
		type: "POST",
		data: dados.serialize(),
		url: "editarDisciplina",
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

				$('#formEditarDisciplina').each(function(){
					this.reset();
				});

				$('#nomeEditar').prop("disabled",false);
				$('#botaoEditar').prop("disabled",false);

				$('#modalEditarDisciplina').modal('hide');

				listarDisciplinas();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}


		},

	});
}

////// DESATIVAR ///////////////////////////////////////////////////////////////////////////////////////////


function modalDesativarDisciplina(del){

	$('#modalDesativarDisciplina').modal('show');

	$('#tituloDesativar').html(dadosGlobaisDisciplina[del].nome_disciplina);
	$('#idDesativar').val(dadosGlobaisDisciplina[del].id_disciplina);
	$('#statDesativar').val(dadosGlobaisDisciplina[del].stat);
	$('#botaoDesativar').text('Sim').prop("disabled",false);
	
}

$('#formDesativarDisciplina').submit(function(e) 
{
	e.preventDefault(); 
	var dados = $(this); 
	var retorno = desabilitarDadosDisciplina(dados);

}); 

function desabilitarDadosDisciplina(dados){

	$.ajax({

		type: "POST",
		data: dados.serialize(),
		url: "desabilitarDisciplina",
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

				$('#modalDesativarDisciplina').modal('hide');

				listarDisciplinas();

				$('.alert').delay(2000).slideUp(500, function(){ $(this).alert('close'); });
				

				
			}
		}



	});

}

