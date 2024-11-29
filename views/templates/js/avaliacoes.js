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
        mensagem.push("O nome deve conter pelo menos duas palavras.")
    }

    const comentario = document.getElementById("comentario").value
    if (comentario.length < 50){
        valido = false
        mensagem.push("O Comentário deve ter pelo menos 50 caracteres.")
    }

    const notaSelecionada = document.querySelector("input[name='nota']:checked")
    if (!notaSelecionada){
        valido = false
        mensagem.push("A nota deve ser selecionada.")
    }

    if (!valido){
        event.preventDefault() // Evita que o formulário seje enviado
        alert(mensagem.join("\n")) 
    }
}