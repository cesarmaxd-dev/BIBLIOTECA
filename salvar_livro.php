<?php

// Recebe os dados do formulario e insere um novo livro no baco de dados
// Conceitos: POST, INSERT (CREATE A CRUD)

// Protege a página: Apenas usuarios logados podem salvar livros
include ("verificar_sessao.php");

// Incluir a conexão com o banco de dados (MYSQL)
include ("conexao.php");

//Recebe os dados enviados pelo formulário via POST
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// Montar o comando SQL INSERT para cadastrar o livro
$mysqli = "INSERT INTO  livros (titulo, autor, status)
VALUES ('$titulo', '$autor', '$status')";

mysqli_query($conexao, $mysqli);

header("Location: listar_livros.php");
exit();
