<?php
    include "config/conexao.php";

    $cliente = $_POST["cliente"];
    $equipamento = $_POST["equipamento"];
    $problema = $_POST["problema"];
    $data_entrada = $_POST["data_entrada"];
    $status = $_POST["status"];

    $sql = "INSERT INTO ordens_servico
            (cliente, equipamento, problema, data_entrada, status)
            VALUES (?, ?, ?, ?, ?)"; //ESPAÇOS RESERVADOS
    
    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssss", //STRINGS
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $status
    );

    if ($stmt->execute()){
        header("Location: index.php");
        exit;
    } else{
        echo "Erro ao cadastrar a ordem de serviço.";
    }
?>
