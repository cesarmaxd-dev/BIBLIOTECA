<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>cadastro de Usúario</h1>
        <p class="subtitulo">Crie usua conta para acessar o sistema da biblioteca</p>
        <?php
        if(isset($_GET['erro']) && $_GET['erro'] === 'email') {
            echo '<div class="mensagem-erro"> Este email já está cadasrtrado </div>';
        }

        ?>
    </div>
</body>
</html>