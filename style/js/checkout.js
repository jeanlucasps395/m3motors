

function limpa_formulario_cep_fatura() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco_fatura').value=("");
    document.getElementById('bairro_fatura').value=("");
    document.getElementById('cidade_fatura').value=("");
    document.getElementById('estado_fatura').value=("");
}

function meu_callback_fatura(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco_fatura').value=(conteudo.logradouro);
        document.getElementById('bairro_fatura').value=(conteudo.bairro);
        document.getElementById('cidade_fatura').value=(conteudo.localidade);
        $('#estado_fatura').val(conteudo.uf).trigger('change');
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulario_cep_fatura();
        $('#mensagem_cep_fatura').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Ocorreu um erro, seu CEP é invalido</p>');
        
    }
}

function pesquisacep_fatura() {
    $('#mensagem_cep_fatura').html('');
    var valor =  document.getElementById('CEP_fatura').value;
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;



        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('endereco_fatura').value="";
            document.getElementById('bairro_fatura').value="";
            document.getElementById('estado_fatura').value="";
            document.getElementById('cidade_fatura').value="";

            
            
            

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback_fatura';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);


        } //end if.
        else {
            //cep é inválido.
            $('#mensagem_cep_fatura').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Ocorreu um erro, seu CEP é invalido</p>');
            limpa_formulario_cep_fatura();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        $('#mensagem_cep_fatura').html('<p style="color: #ff0000;width: 100%;margin: 0 auto;margin-top: 5px;font-size: 13px;text-align: right;margin-bottom: 10px;"> Digite um CEP</p>');
        limpa_formulario_cep_fatura();
        
    }

}




// Fatura no memso endereço da entrega
function faturaMesmaEntrega(){
    var ch1 = $('#i1').is(':checked');
    if(ch1 == true){
        $('#formPagamento_endereco_fatura').css('display','none');
    }else{
        $('#formPagamento_endereco_fatura').css('display','block');
    }
}





// Mascaras
function validadeMasc(){
    
    var validadeCard = $('#validadeCard').val();
    validadeCard=validadeCard.replace(/\D/g,"");
    validadeCard=validadeCard.replace(/(\d{2})(\d)/,"$1/$2");
    //validadeCard=validadeCard.replace(/(\d{4})(\d{1,4})$/,"$1.$2");
    $('#validadeCard').val(validadeCard);
}

 function cardMasc(){
     var card = $('#card').val();
    card=card.replace(/\D/g,"");
    card=card.replace(/(\d{4})(\d)/,"$1.$2");
    card=card.replace(/(\d{4})(\d)/,"$1.$2");
    card=card.replace(/(\d{4})(\d{1,4})$/,"$1.$2");
    $('#card').val(card);
 }
 function cpfMasc(){

    var cpf = $('#cpf').val();
    cpf=cpf.replace(/\D/g,"");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    $('#cpf').val(cpf);


    if(cpf.length == 14){
        var valCPF = validarCpf(cpf);
        console.log(valCPF);
        if(valCPF == false){
            campoInvalido('cpf');
        }
        else{
            campoValido('cpf');
        }
    }

    
}


 function telMasc(){

    var tel = $('#telefone').val();
     tel=tel.replace(/\D/g,"");             
     tel=tel.replace(/^(\d{2})(\d)/g,"($1) $2"); 
     tel=tel.replace(/(\d)(\d{4})$/,"$1 - $2");
    $('#telefone').val(tel);

    
}

function dateNascMasc(){

    var dtNasc = $('#dtNasc').val();
    dtNasc=dtNasc.replace(/\D/g,"");
    dtNasc=dtNasc.replace(/(\d{2})(\d)/,"$1/$2");
    dtNasc=dtNasc.replace(/(\d{2})(\d)/,"$1/$2");
    $('#dtNasc').val(dtNasc);
}



function validarCpf(cpf){
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        if(r != cpf.substring(j, j+1)) result = false;
    });
    return result;
}


function campoInvalido(campo){
    $('#'+campo).css('border','1px solid #F64F49');
}
function campoValido(campo){
    $('#'+campo).css('border','1px solid #ccc');
}