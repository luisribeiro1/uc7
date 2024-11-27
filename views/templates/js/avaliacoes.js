/*Adicionar ouvinte no formulário*/

document.getElementById("form1").addEventListener("submit", 
    function (event) {
        validaFormulario(event)
    }
)

function validaFormulario(event){
    let valido = true
    let mensagem = []
    /* Validação */
    const nome = document.getElementById("nome").value
    if (nome.split(" ").length < 2){
        valido = false
        mensagem.push("O nome deve conter pelo menos duas palavras")
    }

    if (!valido){
        event.preventDefault() /* Evita que o formulário seja enviado*/
        alert(mensagem.join("\n"))
    }
}