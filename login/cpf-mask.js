function mascarazinhaCpf(){
    var cpf = document.getElementById("cpf")
    if(cpf.value.length == 3 || cpf.value.length == 7){
        cpf.value += "."
    } else if(cpf.value.length == 11){
        cpf.value += "-"
    }
}

function mascarazinhaTelefone(){
    var telefone = document.getElementById("telefone")
    if(telefone.value.length == 0){
        telefone.value += "("
    } else if(telefone.value.length == 3){
        telefone.value += ")"
    } else if(telefone.value.length == 9){ 
        telefone.value += "-"
    }
}

function isInputNumber(evt){
                
    var ch = String.fromCharCode(evt.which);
    
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
    
}


