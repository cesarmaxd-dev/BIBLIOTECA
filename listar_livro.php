<?php

// Exibe todos os livros cadastrados em uma tabela.
// Conceitos: Mysqli, SELECT (REAL Do CRUD) loop do while.

//Protege a página: Só usuarioslogados podem listar livros
include("verificar_sessao.php");

//inclui a conexão do banco de dados.
include("conexao.php");

// Consulta SQL  que busca todos os livros da tabela
$sql = "SELECT * FROM  livros";

// Executa a consulta e guarda o livro.
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Container mais largo para armazenar a tabela -->
    <div class="container container-largo">
        <h1>Listagem de livro</h1>
        <p class="subtitulo">
            Todos os livros cadastrados no sistema.
        </p>
        <!-- Tabela estilizada com os dados dos livros -->
        <table class="tabela-livros">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor </th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php
            //loop While percorre cada linha retornada pela cosulta SQL
            while ($livro = mysqli_fetch_assoc($resultado)) {

                ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['status']; ?></td>
                    <td class="acoes">
                        <!-- Link para editar o livro -->
                        <!-- Envia o ID pela URL com ?id=  -->
                        <a href="editar_livro.php?id=<?php echo $livro['id']; ?>" class="link-editar">Editar</a>
                        <!-- link para excluir com confirmação do JS -->
                        <a href="excluir_livro.php?id=<?php echo $livro['id']; ?>" class="link-excluir"
                            onclick="return confirm('tem certeza que deseja excluir o livro?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="painel.php" class="btn btn-voltar">Voltar para o painel principal</a>
    </div>

</body>

</html>