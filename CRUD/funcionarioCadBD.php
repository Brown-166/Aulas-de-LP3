<?php
    include ("./conecta.php");
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"];
    $data_nasc = $_POST["data_nasc"];
    $email = $_POST["email"];
    $tel_ddd = $_POST["tel_ddd"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirm_senha = $_POST["confirm_senha"];

    
    $procuraLogin = $con->prepare("SELECT * FROM funcionario WHERE email = ?");
    $procuraLogin->bind_param( 's', $email);
    $procuraLogin->execute();
    $procuraLogin->store_result();
    if($procuraLogin->num_rows > 0)
    {
        echo "<label>Email já cadastrado</label>";
    } 
    else
    {
        if ($senha == $confirm_senha)
        {
            $con->autocommit(false);

            $cadastro = $con->prepare("INSERT INTO funcionario (nome, cpf, cargo, data_nasc, email, tel_ddd, telefone, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $cadastro->bind_param( 'ssssssss', $nome, $cpf, $cargo, $data_nasc, $email, $tel_ddd, $telefone, $senha);
            $cadastro->execute();
            
            $id = mysqli_insert_id($con);

            $login = $con->prepare("INSERT INTO login (cod_funcionario, email, senha) VALUES (?, ?, ?)");
            $login->bind_param( 'sss', $id, $email, $senha);
            $login->execute();


            if($con->commit())
            {
                echo "<label>Cadastro realizado com sucesso</label>";
            }
            else
            echo "<label>Algo deu errado</label>";
        }
        else
        echo "<label>Os campos Senha e Confirmar Senha não conferem</label>";
    }
?> 
