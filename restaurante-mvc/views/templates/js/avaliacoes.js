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
  // divide o conteúdo digitado usando o espaço com separador e conta a quantidade de palavras
  if (nome.split(" ").length < 2) {
    valido = false
    mensagem.push("O nome deve conter pelo menos duas palavras.")
  }

  const comentario = document.getElementById("comentario").value
  if(comentario.length < 50) {
    valido = false
    mensagem.push("O comentário deve ter pelo menos 50 caracteres.")
  }

  const notaSelecionada = document.querySelector("input[name='nota']:checked")
  if (!notaSelecionada) {
    valido = false
    mensagem.push("Selecione a nota.")
  } 

  if (!valido) {
      event.preventDefault() // Evita que o formulário seje enviado
      alert(mensagem.join("\n")) 
  }
}
