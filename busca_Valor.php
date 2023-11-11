<?php
    require('config.php');

    $sqlFuncao = "SELECT ValorServico FROM `servico` WHERE id_Profissional = '".  $_POST["valor"] . "' AND Servico = '".  $_POST["servico"] . "'"; 
    $conFuncao = $conn->query($sqlFuncao) or die($mysqli->error);
    $data = '';
    

    if ($conFuncao->num_rows == 0) return '<option value="">Nenhum dado encontrado!</option>';

    

    while($funcao = $conFuncao->fetch_object()){
        if($funcao == '') continue;
        $data .= '<option value="' . $funcao->ValorServico . '">' . strtoupper($funcao->ValorServico) .'</option>';
    };

    print_r($data);
    
 
