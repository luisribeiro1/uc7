/* Adicionar no ouvinte no formulario */

document.getElementById("form1").addEventListener("submit",
    function(event){
        validaFormulario(event)
    }

)

/* função para validar o formulario */
function  validaFormulario(event) {
    let valido = true
    let mensagem = []

    /* validacao */
    const nome = document.getElementById("nome").value
    if (nome.split(" ").length < 2){
        valido = false
        mensagem.push("O nome deve conter pelo menos duas palavras")
    }

    const comentario = document.getElementById("comentario").value
    if (comentario.length < 50){
        valido = false
        mensagem.push("O comentario deve ter pelo menos 50 caracteres")
    }

    const notaSelecionada = document.querySelector("input[name='nota']:checked");
    if (!notaSelecionada){
        valido = false
        mensagem.push("Selecione a nota")
    }
    

    if (!valido){
        event.preventDefault()   /* evita que o formulario seja enviado */
        alert(mensagem.join("\n"))
    }
}