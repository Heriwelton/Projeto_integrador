<?php
    session_start();
    require('config.php');

    $sqlFuncao = "SELECT id_Profissional FROM `servico` WHERE Servico = '".  $_POST["valor"] . "' AND id_Salao = '".  $_SESSION["id_salao"] . "'"; 
    $conFuncao = $conn->query($sqlFuncao) or die($mysqli->error);
    $data = '';
    

    if ($conFuncao->num_rows == 0) return '<option value="">Nenhum dado encontrado!</option>';

    

    while($funcao = $conFuncao->fetch_object()){
        if($funcao == '') continue;
        $sqlNome = "SELECT NomeProfissional FROM `profissional` WHERE id_Profissional = '".  $funcao->id_Profissional . "'";
        $conNome = $conn->query($sqlNome) or die($mysqli->error);
        $dadoNome = $conNome->fetch_array();

        $data .= '<option value="' . $funcao->id_Profissional . '">' . strtoupper($dadoNome["NomeProfissional"]) .'</option>';
    };

    print_r($data);
    
 
