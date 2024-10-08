<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alter password</title>
</head>
<body>
    <?php
        include ("./conecta.php");
        $novaSenha = $_POST["novaSenha"];
        $confirm_senha = $_POST["confirm_senha"];

        if ($novaSenha == $confirm_senha)
        {
            $resultado = $con->prepare("UPDATE funcionario SET senha = ? WHERE email = ?");
            $resultado->bind_param( 'ss', $novaSenha, $email);
            $resultado->execute();
            $resultado->store_result();
            if($resultado->num_rows > 0)
            {
                echo "<label>Senha atualizada</label>";
            } 
        }
        
    ?> 
</body>
</html>