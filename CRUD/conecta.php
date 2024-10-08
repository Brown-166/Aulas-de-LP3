<?php
    $con = new mysqli("localhost","root","","empresa");
    $con->set_charset('utf8mb4');

    if ($con->connect_errno) {
    echo "Erro ao conectar ao BD " . $con -> connect_error;
    exit();
    }
?>