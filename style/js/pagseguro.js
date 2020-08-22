function validarCartaoPreenchido(){

	var sessao_id = document.getElementById('sessao_id').value;
	var numero = document.getElementById('card').value;
    var codigo = document.getElementById('cartao_codigo').value;
    var validade = document.getElementById('validadeCard').value;


    if(numero.length !== 0 && codigo.length !== 0 && validade.length !== 0 && sessao_id !== 0){
    	gerarToken();
    }


	
}

function gerarToken(){


	var sessao_id = document.getElementById('sessao_id').value;

    var brand = null;
    
    var numero = document.getElementById('card').value;
    var numero = numero.replace('.','');
    var numero = numero.replace('.','');
    var numero = numero.replace('.','');

    var codigo = document.getElementById('cartao_codigo').value;

    var bin = document.getElementById('card').value;
    var bin = bin.replace('.','');
    var bin = bin.substr(0,6);


    var validade = document.getElementById('validadeCard').value;
	validade = validade.split('/');
    
    var mes = validade[0];
    var ano = validade[1];


    $('#bandeiraCartao').html('Aguarde, estamos verificando o seu cartão...');            


    try{
        PagSeguroDirectPayment.setSessionId(sessao_id);
        document.getElementById('hash_card').value = PagSeguroDirectPayment.getSenderHash();
        PagSeguroDirectPayment.getBrand({
            cardBin: bin,
            success: function(response) {

                brand = response.brand;
                document.getElementById('cartao_bandeira').value = brand.name;
                $('#bandeiraCartao').html('<p style="color: #3F9120;text-transform: Capitalize">'+brand.name+'</p>');


                var param = {
                    cardNumber: numero,
                    cvv: codigo,
                    expirationMonth: mes,
                    expirationYear: ano,
                    success: function(response) {
                        document.getElementById('token').value = response.card.token;
                    },
                    error: function(response) {

                    	// Dados do cartao invalidos
                    	$('#bandeiraCartao').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;margin-bottom: 10px;">Ops! Houve algum erro, verifique os dados ou tente outro cartão</p>');
                        // alert("Erro ao gerar token");
                		return false;
                    },
                    complete: function(response) {}
                }
                param.brand = brand.name;
                PagSeguroDirectPayment.createCardToken(param);
            },
            error: function(response) {

            	// Dados do cartao invalidos
            	$('#bandeiraCartao').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;margin-bottom: 10px;">Ops! Houve algum erro, verifique os dados ou tente outro cartão</p>');
                // alert("Erro ao pegar bandeira");
                return false;
            },
            complete: function(response) {}
        });
    }
    catch(err) {
        alert(err.message+"snbcjhdv");
    }
}