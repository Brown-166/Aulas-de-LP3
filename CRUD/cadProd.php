<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="backLightBlue">
    <form enctype="multipart/form-data" action = "cad_prod.php" method="POST" class="form">
        <div class="left">
            <br> <label for = ""> Nome do Produto: </label>
            <input type = "text" class = "form-control" name = "nome_prod" id = "nome_prod" > <br>
            <br> <label>Descriçâo: </label>
            <input type = "text" class = "form-control" name = "desc_prod" id = "desc_prod" >  <br>
            <br> <label>Preço: </label>
            <input type = "float" class = "form-control" name = "preco_prod" id = "preco_prod" >  <br>
            <br> <label for = "avatar">Imagem: </label>
            <input type="file" id="avatar" class="btn-file" name="imagem" >  <br>
        </div>
        <br> <button type = "submit" class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>