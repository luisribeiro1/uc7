
/* Adicionar um ouvinte no formulário */
document.getElementById("form1").addEventListener("submit",
    function (event) {
        validaFormulario(event)
    }
)

/* função para validar o formulário */
function validaFormulario(event) {
    let valido = true
    let mensagem = []

    /* validação */
    const nome = document.getElementById("nome").value

    if(nome.split(" ").length < 2){
        valido = false
        mensagem.push("O nome deve conter pelo o menos 2 palavras")
    }
   
    const comentario = document.getElementById("comentario").value

    if(comentario.length < 50){
        valido = false
        mensagem.push("O comentário deve ter pelo o menos 50 caracteres")
    }

    const notaSelecionada = document.querySelector("input[name='nota']:checked");
    if (!notaSelecionada) {
        valido = false
        mensagem.push("Selecione a nota")
    }

    if(!valido){
        event.preventDefault()              /* Evita que o formulário seja enviado */
        alert(mensagem.join("\n"))
    }
}