<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Forgot password</title>
    
</head>
<body class="backLightBlue">
    <?php
        include ("./conecta.php");
        $login = $_POST["login"];

        $resultado = $con->prepare("SELECT * FROM login WHERE email = ?");
        $resultado->bind_param( 's', $login);
        $resultado->execute();
        $resultado->store_result();
        if($resultado->num_rows > 0)
        {
            include("./FuncaoEmail.php");
    ?>




    <form action="loginAlteraSenha.php" method="POST" class="form">
        <div class="left">
            <input type="hidden" name="token" id="token" value="<?php echo $token;?>">
            <input type="hidden" name="email" id="email" value="<?php echo $email;?>">


            <label>Digite o código:</label><br>
            <input type="text" name="codigo" id="codigo" required oninput="Verificar_Token()">

            <br>
            <br>

            <label id="label_NS" style="visibility:hidden">Nova Senha:</label>
            <br>
            <input type="text" id="input_NS" style="visibility:hidden" required/>
            <br><br>

            <label id="label_CNS" style="visibility:hidden">Confirmar Nova Senha:</label>
            <br>
            <input type="text" id="input_CNS" style="visibility:hidden" required/>
            <br><br>
        </div>
        <button type="submit" id="btn" style="visibility:hidden">Alterar Senha</button>
    </form>





    <?php
        }
        else 
        echo "E-mail não cadastrado";
    ?> 
</body>
<script>
        var token = document.getElementById("token");
        var codigo = document.getElementById("codigo");


        function Verificar_Token()
        {
            if (token.value == codigo.value)
            {
                document.getElementById("label_NS").style.visibility = "visible";
                document.getElementById("label_CNS").style.visibility = "visible";
                document.getElementById("input_NS").style.visibility = "visible";
                document.getElementById("input_CNS").style.visibility = "visible";
                document.getElementById("btn").style.visibility = "visible";
            }
        }
    </script>
</html>