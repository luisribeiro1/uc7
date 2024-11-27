/* Adicionar o ouvinte no formulário */

document.getElementById("form1").addEventListener("submit", function(event) {validaFormulario(event)})

/* Função para validar o formulário */
function validaFormulario(event) {
    let valido = true
    let mensagem = []

    /* Validação */
    const nome = document.getElementById("nome").value
    if(nome.split(" ").lenght < 2) {
        valido = false
        mensagem.push("O nome deve conter pelo menos duas palavras")
    }

    if(!valido) {
        event.preventDefault()  /* Evita que o formulário seja enviado */
        alert(mensagem.join("\n"))
    }
}