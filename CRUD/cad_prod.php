<?php
    include("conecta.php");

    $nomep = $_POST['nome_prod'];
    $desc = $_POST['desc_prod'];
    $preco = $_POST['preco_prod'];
    $imagem = $_FILES["imagem"]; 
    $nome = $imagem["name"];
    echo $nome;

    $sql = "INSERT INTO produto (nome, descricao, preco, imagem)
    VALUES ('$nomep','$desc','$preco', '$nome')";

    if(mysqli_query($con , $sql)){
        $caminho =  $_SERVER['DOCUMENT_ROOT'];

        $dir = "CRUD\imagem";
            
        // recebendo o arquivo de imagem
        $file = $_FILES["imagem"];

        // Move o arquivo da pasta temporaria de upload para a pasta de destino 
        if (move_uploaded_file($file["tmp_name"], $caminho. "\\$dir\\".$file["name"])) { 
            echo "Arquivo enviado com sucesso!"; 
        } 
        else { 
            echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
        }    

        echo "<center> <h1> <i>Seu produto foi cadastrado com sucesso!</i></h1></center>";
        echo "<center><a href='./cadProd.php'><font color = 'IndianRed'>Cadastrar novo Produto</a></font><br></center>";
        echo "<center><p><a href='index.php'><font color = 'MediumOrchid'>Página inicial</a></font>,</center>";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($con);
    }


    mysqli_close($con);
?>