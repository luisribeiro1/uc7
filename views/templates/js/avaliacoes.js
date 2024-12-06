/* Adicionar no ouvinte no formulário*/
document.getElementById("form1").addEventListener("submit",
    function (event){
        validaFormulario(event)
       // alert("formulario submetido")
       // event.preventDefault()
    }

)
/* funcao para validar o formulario*/
function validaFormulario(event){
    let valido = true
    let mensagem = []

    /* Validacao */

    const nome = document.getElementById("nome").value 

    /* divide o conteudo digitado usando o espaco com separador e conta a quantidade de palavras*/
    if (nome.split(" ").length <2){
        valido = false
        mensagem.push("O nome deve conter pelo menos duas palavras")
    }

    const comentario = document.getElementById("comentario").value 

    /* divide o conteudo digitado usando o espaco com separador e conta a quantidade de palavras*/
    if (comentario.length <50){
        valido = false
        mensagem.push("O comentario deve ter pelo menos 50caracteres")
    }

    const notaselecionada = document.querySelector("input[name='nota']:checked");
    if (!notaselecionada){
        valido = false
        mensagem.push("Selecione a nota")
    }
    

    if (!valido){
        event.preventDefault()            /* Ele evita que o formulario seja enviado*/
        alert(mensagem.join("\n"))
    }
}
