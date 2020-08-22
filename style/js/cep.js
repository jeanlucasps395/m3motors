
var key = "AIzaSyBy6fwubO922dAiPyjWjZbAvgVtOX8Z9u4";
var validate = false;




function limpa_formulario_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        $('#uf').val(conteudo.uf).trigger('change');
    } //end if.
    else {
        //CEP não Encontrado.
        errorCEP();
        limpa_formulario_cep();
        $('#mensagem_cep').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Ocorreu um erro, seu CEP é invalido</p>');
        
    }
}

function pesquisacep() {
    $('#mensagem_cep').html('');
    var valor =  document.getElementById('cep').value;
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;



        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="";
            document.getElementById('bairro').value="";
            document.getElementById('uf').value="";
            document.getElementById('cidade').value="";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

            localizacao(cep);

        } //end if.
        else {
            //cep é inválido.
            $('#mensagem_cep').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Ocorreu um erro, seu CEP é invalido</p>');
            limpa_formulario_cep();
            errorCEP();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        $('#mensagem_cep').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Digite um CEP</p>');
        limpa_formulario_cep();
        errorCEP();
        
    }

}



function localizacao(cep){

    $('#mensagem_cep').html('<p class="piscar" style="font-style: italic;color: #3F9120;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Calculando frete</p>');


    var settings = {
        "async": true,
        "crossDomain": true,
        "url" : "https://maps.googleapis.com/maps/api/geocode/json?address="+cep+"&key="+key+"",
        "method": "POST"
      }
    $.ajax(settings).done(function (response) {
        
        
        if(response.status == 'ZERO_RESULTS'){
            console.log(response.status);
            return false;
        }
        // if(){

        // }
        //  aqui vem a latitude e longitudo do cep do cliente (destino)
        var p1 = response.results[0].geometry.location.lat;
        var p2 = response.results[0].geometry.location.lng;

        // Transportadora wf (origem)
        var originLat = -23.4804783;
        var origingLng = -46.5282973;

        const matrix = new google.maps.DistanceMatrixService();

        matrix.getDistanceMatrix({
          origins: [new google.maps.LatLng(originLat, origingLng)],
          destinations: [new google.maps.LatLng(p1, p2)],
          travelMode: google.maps.TravelMode.DRIVING,
        }, function(response, status) {
          
          // --  mostra a distancia em metros ---
          // console.log(response.rows[0].elements[0].distance.text);

          // definir valores (enviando em metros)
          valorFianlProduto(response.rows[0].elements[0].distance.value);



        });


    	
        // "url" : "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins="+origins+"&destinations="+destination+"&key="+key+"",
        


    });


}	

 




// variaveis

var valorFinal_submit = 0;
var valorFrete_submit = 0;
var km = 0;

function valorFianlProduto(metros){
    km = metros/1000;
    
    
    var uf = document.getElementById('cidade').value;

    $('#valorFrte').html();

    setting = {
        "async": true,
        "method": "POST",
        "url": "/wf/home/buscarFreteValor",
        "data" : {
            "km" : km,
            "cidade" : uf
        }
    }
    $.ajax(setting).done(function (response){
        // console.log(response);
        


        $('.bloco-produto__texto--freteValorBloco').css('display','block');

        var valor_produto = $('#valorProduto').val();
        var valorFinal = response +  parseInt(valor_produto);
        $('#valorFrete').html(response);
        $('#valorFinal').html(valorFinal);
        $('#mensagem_cep').html('');

        if ($("#valorFrete_titulo").length) {
            $('#valorFrete_titulo').html('R$ ' + response);
        }


        validate = true;
        valorFrete_submit = response;



        
    });

}


function errorCEP(){
    validate = false;
    $('.bloco-produto__texto--freteValorBloco').css('display','none');
     if ($("#valorFrete_titulo").length) {
        $('#valorFrete_titulo').html('R$ 00,00');
    }
}





function enviarFormulario(){
    
    if(validate == true){

        $('#inpSubmit').html('<input type="hidden" value="'+valorFrete_submit+'" name="valor_frete">'+
        '<input type="hidden" value="'+km+'" name="km">');
        document.getElementById("formPag").submit();
    }
    else{
        $('#mensagem_cep').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Escolha um CEP válido</p>');
    }


}








var errorValidate = 0;


function enviarFormularioFInalizar(){

    if(validate == true){

        $('#inpSubmit').html('<input type="hidden" value="'+valorFrete_submit+'" name="valor_frete">'+
        '<input type="hidden" value="'+km+'" name="km">');

        errorValidate = 0;

        // validacao pag seguro
        validarCamposForms('hash_card');
        validarCamposForms('token');
        validarCamposForms('sessao_id');



        // dados do cartao
        validarCamposForms('titularCartao');
        validarCamposForms('cpf');
        validarCamposForms('dtNasc');
        validarCamposForms('card');
        validarCamposForms('cartao_bandeira');
        validarCamposForms('validadeCard');
        validarCamposForms('cartao_codigo');



        var ch1 = $('#i1').is(':checked');
        if(ch1 == true){
            //insere valores do outro form
            document.getElementById('CEP_fatura').value = document.getElementById('cep').value;
            document.getElementById('endereco_fatura').value = document.getElementById('rua').value;
            document.getElementById('numero_fatura').value = document.getElementById('numero').value;
            document.getElementById('bairro_fatura').value = document.getElementById('bairro').value;
            document.getElementById('cidade_fatura').value = document.getElementById('cidade').value;
            document.getElementById('estado_fatura').value = document.getElementById('uf').value;
            document.getElementById('complemento_fatura').value = document.getElementById('complemento').value;

        }else{
            //verificar os campos
            validarCamposForms('CEP_fatura');
            validarCamposForms('endereco_fatura');
            validarCamposForms('numero_fatura');
            validarCamposForms('bairro_fatura');
            validarCamposForms('cidade_fatura');
            validarCamposForms('estado_fatura');
        }


        //dados de entrega
        validarCamposForms('rua');
        validarCamposForms('cidade');
        validarCamposForms('bairro');
        validarCamposForms('uf');
        validarCamposForms('numero');

        //dados de contato
        validarCamposForms('email');
        validarCamposForms('telefone');

        var ch2 = $('#i2').is(':checked');
        if(ch2 !== true){
            $('#i2Label').css('color','#F64F49');
        }else{
            $('#i2Label').css('color','#3F9120');
        }


        if(errorValidate == 0){
            document.getElementById("formFinalizar").submit();
        }
    }
    else{
        $('#mensagem_cep').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Escolha um CEP válido</p>');
    }

}


function validarCamposForms(campo){
    var campoValidacao = $('#'+campo).val();

    errorValidate++;

    if(campoValidacao.length == 0){
        //alert('campo vazio: ' + campo);
        $('#'+campo).css('border','1px solid #F64F49');
    }
    else{
        errorValidate--;
        $('#'+campo).css('border','1px solid #ccc');
    }

}

