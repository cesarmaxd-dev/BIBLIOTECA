<?php

// Protege a página: Somente os usuarios logados pode editar livros

// COnceitos : $_GET, Mysql, SELECT, Formulario de edição 
include("verificar_sessao.php");

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Recebe o ID do livro pela URL (ex: editar_livro.php?id=3)
$id = $_GET['id'];

// COnsulta SQL que busca o livro pelo ID se ele nã oexistir não sera selecionado.
$mysql = "SELECT *  FROM livros WHERE id = $id";

// Executa o banco de dados
$resultado = mysqli_query($conexao, $mysql);

// Transforma o resultado em um array associativo
$livro = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Editar livros</h1>
        <p class="subtitulo">Altere os dados do livro desejado e clique em atualizar.</p>
        <!-- Formulário envia os dados para atualizar_livro.php  -->
        <form action="atualizar_livro.php">
            <!-- Campo hidden: Guarda o ID sem aparecer na tela -->
            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <!-- Marcar com oselect a opção que corresponde ao status atualizado -->
                    <option value="Disponivel" <?php if ($livro['status'] === 'Disponivel')
                        echo 'selected'; ?>>Disponivel
                    </option>
                    <option value="Emprestado" <?php if ($livro['status'] === 'Emprestado')
                        echo 'selected'; ?>>Emprestado
                    </option>

                </select>


            </div>
            <button type="submit" class="btn btn-block">Atualizar Livro</button>
        </form>
        <!-- Botão de voltar para listagem de livros -->
        <a href="listar_livro.php" class="btn btn-voltar">
            Voltar para a Listagem
        </a>
    </div>


</body>

</html>