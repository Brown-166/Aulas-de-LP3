<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Funcionario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="backLightBlue">
<form action="./funcionarioBuscaFormFiltro.php" method="POST" class="form">
    <div class="left">
        <?php
            include("./conecta.php");
            $id = $_POST("id");

            $procuraFuncionario = $con->prepare("SELECT * FROM funcionario WHERE cod_funcionario = ?");
            $procuraFuncionario->bind_param('s', $id);
            $procuraFuncionario->execute();
            $procuraFuncionario->store_result();
            $procuraFuncionario->bind_result($cod_funcionario, $nome, $cpf, $cargo, $data_nasc, $email, $tel_ddd, $telefone, $senha);
            echo "<label>Cod_funcionario: ".$cod_funcionario."</label><br>";
            echo "<label>Nome: ".$nome."</label><br>";
            echo "<label>CPF: ".$cpf."</label><br>";
            echo "<label>Cargo: ".$cargo."</label><br>";
            echo "<label>Data de Nascimento: ".$data_nasc."</label><br>";
            echo "<label>Email: ".$email."</label><br>";
            echo "<label>Telefone: (".$tel_ddd.") ".$telefone."</label><br>";
            echo "<label>cod_funcionario: ".$senha."</label><br>";
        ?>
    
        </div>
    </form>
</body>
</html>