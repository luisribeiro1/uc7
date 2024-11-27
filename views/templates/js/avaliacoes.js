
document.getElementById("form1").addEventListener("submit",

    function (event){
       validaFormulario(event)
    }

)
/* função para validar o formulário */
function validaFormulario(event){


    let valido = true 
    let mensagem = []

    const nome = document.getElementById("nome").value
    if(nome.split(" ").length < 2 ){
        valido = false 
        mensagem.push("O nome deve conter pelomenos duas palavras")
    }

    if(!valido){

        event.preventDefault()                  /*Evita que o formulário seja enviado*/
        alert(mensagem.join("\n"))
    }
}