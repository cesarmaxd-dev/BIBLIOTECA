<!-- Remove um livro do banc de dados pelo ID -->

<!-- Conceitos: $_GET, Mysql, DELETE (D DO CRUD) -->

<!-- Protege a página: So usuários logados podem logar e excluir livros -->
 <?php
include("verificar_sessao.php");

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Recebe o ID de livros pela URL (ex: excluir_livro.php? id = 3)
$id = $_GET['id'];

// Monta o comando SQL DELETE para remover o livro do banco de dados. 
$sql = "DELETE FROM livros WHERE id = $id";

// Executa o DELETE no banco de dados.
mysqli_query($conexao, $sql);
