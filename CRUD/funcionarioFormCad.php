<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Sign in</title>
  </head>
  <body class="backLightBlue">
    <?php
        session_start();
        if (isset($_SESSION["login"]))
        {
    ?>
    <form action="./funcionarioCadBD.php" method="post" class="form">
      <div class="left">
        <label>Nome:</label>
        <br>
        <input type="text" name="nome" required>
        <br><br>
        <label>CPF:</label>
        <br>
        <input type="text" name="cpf" required>
        <br><br>
        <label>Cargo:</label>
        <br>
        <input type="text" name="cargo" required>
        <br><br>
        <label>Data de nascimento:</label>
        <br>
        <input type="date" name="data_nasc" required/>
        <br><br>
        <label>Email:</label>
        <br>
        <input type="text" name="email" required>
        <br><br>
        <label>Telefone:</label>
        <br>
        <select name="tel_ddd" required>
          <option value="11">11</option>
          <option value="21">21</option>
          <option value="31">31</option>
        </select>
        <input type="text" name="telefone" maxLenght="9" required/>
        <br><br>
        <label>Senha:</label>
        <br>
        <input type="password" name="senha" required>
        <br><br>
        <label>Confirmar Senha:</label>
        <br>
        <input type="password" name="confirm_senha" required>
        <br><br>
      </div>
      <button type="submit">Cadastrar</button>
    </form>
    <?php
        }
        else
        {
            echo"Você precisa estar logado para acessar essa área.";
        }
    ?>
  </body>
</html>