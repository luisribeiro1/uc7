
/* Adicionar um ouvinte no formulário */
document.getElementById("form1").addEventListener("submit",
    function (event) {
        // alert("formulario submetido")
        validaFormulario(event)
    }
)

/* Função de validar o formulário */
function validaFormulario(event) {
    let valido = true
    let mensagem = []

    // Validação
    const nome = document.getElementById("nome").value
    if (nome.split(" ").length < 2){
        valido = false
        mensagem.push("O nome deve conter pelo menos 2 palavras")
    }

    if(!valido){
        event.preventDefault() // Evita que o formulário seja enviado.
        alert(mensagem.join("\n"))
    }
}