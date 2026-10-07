<?php

// Inclui a verificação de sessão (protege a página de acesso apenas para usuários logados)
iclude("verifica_sessao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        // Exibe o nome de usuário logado(vem da sessão $_SESSION)
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
        <p class="subtitulo">Bem vindo ao painel da biblioteca.
            Escolha uma opção:</p>
            //cards grnades para facilitar a navegação do usuário.
            <div class="painel-cards">
                <a href="cadastrar_livro.php" class="card-link">Cadastrar Livro

                </a>
                <a href="listar_livros.php" class="card-link">Listar Livros

                </a>
                <a href="logout.php" class="card-links">
                    Sair
                </a>
            </div>
            <div class="dica-navegacao">
                <strong>Fluxo:</strong>
                Painel → Cadastrar Livro ou listar livros →  editar / excluir.
            </div>
    </div>
</body>
</html>