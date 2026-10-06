<?php
// Código de autenticação: Verifica s o e-mail e a senha estão corretos.
// Conceitos: session_start, SELECT no  mysql, password_verify
// Autenticar permite os usuarios permanecerem logados entre as pagínas.
// Conexao com o banco de dados
include("conexao.php");

// Recebe o email e a senha do formulario de login.
$email = $_POST['email'];
$senha = $_POST['senha'];

$sqli = "SELECT * FROM usuarios WHERE email = '$email'";

$resultado = mysqli_query($conexao, $sqli);

//mysqli_fetch_assoc() transforma uma linha do resultado
// em um array associativo, onde os nomes das colunas se tornam as chaves do array.
$usuario = mysqli_fetch_assoc($resultado);

//==========================================================================
//VERIFICAÇÃO DA SENHA
//==========================================================================
// O password_verify() compara a senha digitada com o rash salvo.
if($usuario && password_verify($senha, $usuario['senha'])) {
// Login bem-sucedido: Guarda o nome do usuario da sessão
$_SESSION['nome'] = $usuario ['nome'];
// Redireciona para o painel principal.
header("Location: painel.php");
exit();
} else {
    // Login invalido redireciona de volta para a pagína de loguin.
    // com mensagem de erro.
    header("Location: login.php?erro=login") ;
    exit();
}
?>


