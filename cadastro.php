<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <p class="subtitulo">Crie uma conta para acessar o sistema da biblioteca</p>

        <form action="salvar_usuario.php" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-block">Cadastrar</button>
        </form>
        <div class="nav-link">
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
        <a href="login.php" class="btn btn-voltar">Voltar para login</a>
    </div>
    <div class="dicas-naveacao">
        <strong>Fluxo:</strong> Cadastro de usuário -> Login -> Painel -> Gerenciar livros
    </div>
</body>

</html>