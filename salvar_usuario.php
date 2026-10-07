<?php
// salvar_usuario.php
// recebe o dados do formulario de cadastro e salva o usuario 
// no banco de dados
//Conceitos: POST, Password_hash, Mysqli, INSERT, verificação de 
// E-mail dupllicado

// Inclui  oarquivo de conexao com  o banco de dados
include "conexao.php";

// Recebe os dados enviados pelo formulário via metodo POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//================================================================================================================================
//VERIFICAÇÃO DE E-MAIL DUPLICADO
//Antes de cadastrar o usuario, verifica se o e-mail já existe no banco de dados
//================================================================================================================================

// Monta cnsulta SQL (SELECT) para buscar o e-mail

$sqlverificar = "SELECT id FROM  usuarios WHERE email = '$email'";
// Executa a consulta SQL
$resultverificar = mysqli_query($conexao, $sqlverificar);

//validação: MYSQLI_NUM_ROWS() conta quantos registros foram encontrados
if (mysqli_num_rows($resultverificar) > 0) {
    // E-mail já existe, redireciona para a página de cadastro com mensagem de erro
    header("Location: cadastro.php?erro=email");
    exit();
}

//================================================================================================================================
// CRIPTOGRAFIA DA SENHA
// Nunca armazenamos a senha em texto puro no banco
//================================================================================================================================
//Password_hash() cria um hash seguro da senha.
// PASSWORD_DEFAULT usa um algoritimo bcyrpt (PADRÃO PHP)
$senhacrptografada = password_hash($senha, PASSWORD_DEFAULT);
//================================================================================================================================
// INSERÇÃO DO BANCO DE DADOS (CREATE CRUD)
//================================================================================================================================

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhacrptografada')";

// Executa o INSERT  no banco de dados
mysqli_query($conexao, $sql);

//Redireciona o usuario para a página de login após um cadastro bem-sucedudido
header("Location: login.php");
exit(); 4


?>