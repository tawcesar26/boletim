$(function () {
//var AddElemento = $('.listas');
//var AddCheckbox = $('.listas');
//var cont = 0;

    /*
     //ADICIONA UMA CAIXA DE TEXTO
     $(':button[value="Caixa de texto"]').click(function () {
     AddElemento.prepend('<div class="listas"><input type=\"text\" id=\"add_field\" value=\"\">\n\
     <input type="button" class="remover_campo" value="remover">\n\
     </div><br>');
     
     //  cont++;
     });
     $('.listas').on("click", ".remover_campo", function (e) {
     e.preventDefault();
     $(this).parent('div').remove();
     // cont--;
     });
     
     //ADICIONA UM CHECKBOX
     $(':button[value="Checkbox"]').click(function () {
     AddElemento.prepend('<div class="listas"><input type=\"checkbox\" id=\"add_field\" value=\"\">\n\
     <input type="button" class="remover_campo" value="remover">\n\
     </div><br>');
     });
     
     $('.listas').on("click", ".remover_campo", function (e) {
     e.preventDefault();
     $(this).parent('div').remove();
     
     });
     
     */

    var campos_max = 10; //max de 10 campos
    var x = 0;
    
    //ADICIONA UM CAMPO DE TEXTO
    $('#add_field').click(function (e) {
        e.preventDefault(); //prevenir novos clicks
        if (x < campos_max) {
            $('#listas').append('<div class="row"><br>\
                                <div class="col-md-10 form-group form-group-lg"><input type="text" class="form-control" name="campo['+x+'] #text" placeholder="Digite sua Pergunta"></div>\
                                <a href="#" class="remover_campo"><button type="button" class="btn btn-danger btn-xs">X</button></a>\
                                </div>');
            x++;
        }
    });
    $('#listas').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    }); 
    
    //ADICIONAR UM CHECKBOX
     $('#add_Checkbox').click(function (e) {
        e.preventDefault(); //prevenir novos clicks
        if (x < campos_max) {
            $('#listas').append('<div class="row">\
                                 <div class="col-md-1"><center><input type="checkbox" name="campo['+x+'] #checkbox"></center></div>\
                                <div class="col-md-3 form-group-sm"><input type="text" class="form-control" name="valorCheck[]" placeholder="Digite a opção."></div>\
                                <a href="#" class="remover_campo"><button type="button" class="btn btn-danger btn-xs">X</button></a>\
                                </div>');
            x++;
        }
    });
    $('#listas').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
    
    //ADICIONAR UM RADIO BUTTON
     $('#add_radio').click(function (e) {
        e.preventDefault(); //prevenir novos clicks
        if (x < campos_max) {
            $('#listas').append('<div class="row">\
                                <div class="col-md-1"><center><input type="radio" name="campo['+x+'] #radio"></center></div>\
                                <div class="col-md-3 form-group-sm"><input type="text" class="form-control" name="valorRadio[]" placeholder="Digite a opção."></div>\
                                <a href="#" class="remover_campo"><button type="button" class="btn btn-danger btn-xs">X</button></a>\
                                </div>');
            x++;
        }
    });
    $('#listas').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
});
//  [ ]}