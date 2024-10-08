<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Log in</title>
  </head>
  <body class="backLightBlue">
    <form method="post" class="form">
      <div class="left">
        <label>Login:</label>
        <br>
        <input type="text" name="login" required>
        <br><br>
        <label>Senha:</label>
        <br>
        <input type="password" id="senha" name="senha" required>
        <br><br>
      </div>
      <button type="submit" formaction="./loginValidar.php" value="Log_in">Entrar</button>
      <div class="left">
        <br><br>
        <input type="checkbox" id="esqueci_senha" onclick="alteraInput()">Esqueci a senha
        <br><br>
        </div>
        <button type="submit" formaction="./loginEsqueciSenha.php" id="btnEsqueci" value="Esqueci_senha" style="visibility: hidden">Entrar</button>
    </form>
  </body>
  <script>
      function alteraInput() 
      {
        if (document.getElementById("btnEsqueci").style.visibility == "visible"){
          document.getElementById("senha").setAttribute("required", "required");
          document.getElementById("btnEsqueci").style.visibility = "hidden";
        }
        else{
          document.getElementById("senha").removeAttribute("required");
          document.getElementById("btnEsqueci").style.visibility = "visible";
        }
      }
  </script>
</html>