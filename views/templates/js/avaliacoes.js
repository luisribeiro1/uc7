/* Adicionar um ouvinte no formulário */

document.getElementById("form1").addEventListener("submit",
    function (event) {
        validaformulario(event)
    }
)

//  função para validar o formulário
function validaformulario(event) {
    let valido = true
    let mensagem = []

    // Validação:
    const nome = document.getElementById("nome").value
    if (nome.split(" ").length < 2){
        valido = false
        mensagem.push("o nome deve conter pelo menos duas palavras.")
    }

    if (!valido){
        event.preventDefault() // Evita que o formulário seje enviado
        alert(mensagem.join("\n")) 
    }
}