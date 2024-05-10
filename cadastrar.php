<?php
    include_once "conexao.php";

    
   // echo"<pre>";
   // print_r($_SERVER);
    //echo"<pre>";
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //echo "Tem algo que foi enviado pelo formulario";
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $nascimento = $_POST['nascimento'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];

        $conexaoComBanco = abrirBanco();

        $sql = "insert into pessoas (nome, sobrenome, nascimento, endereco, telefone)
                values ('$nome', '$sobrenome', '$nascimento', '$endereco', '$telefone')";

        if( $conexaoComBanco->query($sql) === TRUE) {
            echo "Contato salvo com sucesso no banco de dados";
        }else {
            echo "Erro ao salvar no banco de dados: " .  $conexaoComBanco->error;
        }

        fecharBanco($conexaoComBanco);
    }



?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1>Agenda de contatos</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Cadastro de contatos</h2>

        <form action="cadastrar.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" require >

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" require >

            <label for="nascimento">Nascimento</label>
            <input type="date" name="nascimento" require >
            
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" require >

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" require >

            <button type="submit">Salvar</button>
        </form>

    </section>

</body>
</html>
