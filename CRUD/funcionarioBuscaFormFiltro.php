<?php
  include ("./conecta.php");
  $busca = $_POST["busca"]."%";

  $procuraFuncionario = $con->prepare("SELECT cod_funcionario, nome FROM funcionario WHERE nome LIKE ? ORDER BY nome");
  $procuraFuncionario->bind_param('s', $busca);
  $procuraFuncionario->execute();
  $procuraFuncionario->store_result();
  $procuraFuncionario->bind_result($cod_funcionario, $nome);

  if($procuraFuncionario->num_rows() > 0)
  {
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Buscar Funcionario</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body class='backLightBlue'>
    <form action='./funcionarioBuscaMostraDados.php' method='POST' class='form'>
        <div>";
        echo "<select name='id'>";
        while($procuraFuncionario->fetch())
        {
            echo "<option value=".$cod_funcionario.">".$nome."</option>";
        }
        echo "</select>";
        echo "<br><br>";
        echo "</div>";
        echo "<button type='submit'>Buscar</button>";
        echo "</form>";
        echo "</body>";
        echo "</html>";
  }
?>