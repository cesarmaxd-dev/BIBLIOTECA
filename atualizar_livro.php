<?php

// Atualizar_livro.php
// Recebe os dados do formulario de edição e atualualiza os livros
// Conceitos: POST, Mysql, UPDATE (U do CRUD)

// Protege a página: Só usúarios logados podem atulizar o livro

include("verificar_sessao.php");

// Inclui conexao com o banco de dados
include("conexao.php");
// Recebe os dados enviados pelo formulario de edição
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// Monta o comando SQL para alterar os dados do livros
$sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', status = '$status' WHERE id = $id";

// Executa o UPDATE no banco de dados
mysqli_query($conexao, $sql);

//  Redirecionando para a listagem depois de atualizar
header("Location: listar_livros.php");
exit();
