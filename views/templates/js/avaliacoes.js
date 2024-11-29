/* Adicionar o ouvinte no formulário */
document.getElementById("form1").addEventListener("submit", 
    function (event) {
        validaFormulario(event)
    }
)

/* Função para validar o formulário */
function validaFormulario(event) {
    let valido = true
    let mensagem = []

    /* Validação */
    const nome = document.getElementById("nome").value
    if (nome.split(" ").length < 2){
        valido = false
        mensagem.push("O nome deve conter pelo menos duas palavras")
    }

    const comentario = document.getElementById("comentario").value
    if (comentario.length < 50){
        valido = false
        mensagem.push("O comentário deve conter pelo menos cinquenta caractéres")
    }

    const notaSelecionada = document.querySelector("input[name='nota']:checked");
    if (!notaSelecionada) {
        valido = false
        mensagem.push("Selecione a nota")
    }

    if (!valido){
        event.preventDefault()  /* Evita que o formulário seja enviado */
        alert(mensagem.join("\n"))
    }
}