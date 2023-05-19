<?php
    require('config.php');

    $sqlFuncao = "SELECT FuncaoProfissional from profissional WHERE id_Profissional = '".  $_POST["valor"] . "'"; 
    $conFuncao = $conn->query($sqlFuncao) or die($mysqli->error);
    $dadoFuncao = $conFuncao->fetch_object();
    $dadoFuncaoProfissional = $dadoFuncao->FuncaoProfissional;
    $dadoFuncaoExplode = explode(' ',$dadoFuncaoProfissional);
    
    $data = '';

    if (@count($dadoFuncaoExplode) == 0) return '<option value="">Nenhum dado encontrado!</option>';

    foreach($dadoFuncaoExplode as $funcao){
        if($funcao == '') continue;
        $data .= '<option value="' . $funcao . '">' . strtoupper($funcao) .'</option>';
    };


    print_r($data);
