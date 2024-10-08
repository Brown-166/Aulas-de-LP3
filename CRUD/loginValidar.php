<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Validation</title>
</head>
<body>
    <?php
        include ("./conecta.php");
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $resultado = $con->prepare("SELECT * FROM login WHERE email = ? and senha = ?");
        $resultado->bind_param( 'ss', $login, $senha );
        $resultado->execute();
        $resultado->store_result();
        if($resultado->num_rows > 0)
        {
            echo "Login realizado com sucesso";
            session_start();
            $_SESSION['login'] = $login;
        } 
        else 
        echo "Login e/ou senhas não conferem";
    ?> 
</body>
</html>
