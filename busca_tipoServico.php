<?php
    session_start();
    require('config.php');

    $sqlFuncao = "SELECT DISTINCT Servico FROM `servico` WHERE TipoServico = '".  $_POST["valor"] . "' AND id_Salao = '".  $_SESSION["id_salao"] . "'"; 
    $conFuncao = $conn->query($sqlFuncao) or die($mysqli->error);
   
    $data = '';

    if ($conFuncao->num_rows == 0) return '<option value="">Nenhum dado encontrado!</option>';

    while($funcao = $conFuncao->fetch_object()){
        if($funcao == '') continue;
        $data .= '<option value="' . $funcao->Servico . '">' . strtoupper($funcao->Servico) .'</option>';
    };

    print_r($data);
    
 
