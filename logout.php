//encerra a sessão de forma segura e redireciona o usuário para a página de login
//conceitos; session_destroy, limpeza de cokies, header anti-cache

//inicia a sessão e depois destroi ela
<?php

session_start();

// Limpa todas as variaveis da sessão (nome, etc..)
$_SESSION = array();


if(ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

//destroi completamente a sessão 
session_destroy();

//cabeçalhos que impedem o cache da página, garantindo que o usuário não consiga voltar para a página do painel após o logout
header("Cache-Control: no-store, no-cache, must-revalidate");
header("pragma: no-cache");
header("Expires: 0");

//redireciona para a página de login.
header("location: login.php");
exit();