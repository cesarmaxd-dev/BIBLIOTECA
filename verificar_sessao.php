<?php

// verificar_sessao.php
// Arquivo icluido na páginas reestritas do sitema (painel.php, cadastrar_livro.php, listar_livros.php)
// garante que o  usuários logados possam acessar o contéudo.

// Inicia a sessão
session_start();

//cabeçalhos HTTP para impedir o cache do navegador de guardar a página em cache.
//Isso evita que usúario volte ao painel após fazer o logout
header("Cache-Control: no-cache , no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verifica se a variável de sessão 'nome' existe.
// Se não existir o usuario não esta ligado

if(!isset($_SESSION["nome"])) {
    //header() redireciona para o navegador para outra página.
    header("Location: login.php");
    //exit(); encerra a execução do script para garantir que o restante do código não seja executado.
    exit();
}