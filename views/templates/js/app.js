
    const botoesExcluir = document.querySelectorAll('.btnExcluir');

    // Adiciona o ouvinte de clique em cada botão de excluir
    botoesExcluir.forEach(botao => {
        botao.addEventListener('click', function(event) {
            // Exibe uma caixa de confirmação
            const confirmacao = confirm('Você tem certeza que deseja excluir esta mesa?');

            // Se o usuário cancelar, impede a exclusão
            if (!confirmacao) {
                event.preventDefault(); // Cancela a navegação para a URL de exclusão
            }
        });
    });
