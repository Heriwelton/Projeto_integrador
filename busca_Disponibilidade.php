<?php
    require('config.php');

    $sqlFuncao = "SELECT HoraAgendamento FROM `agendamento` WHERE DataAgendamento = '".  $_POST["valor"] . "' AND id_Profissional = '".  $_POST["funcionario"] . "'"; 
    $conFuncao = $conn->query($sqlFuncao) or die($mysqli->error);

    $data = '';

    $horario = ["08h00","09h00","10h00","11h00","12h00","13h00","14h00","15h00","16h00","17h00","18h00"];
    

   while($funcao = $conFuncao->fetch_object()){ 
    
    if(in_array($funcao->HoraAgendamento,$horario)){
        $key = array_search($funcao->HoraAgendamento, $horario);
        unset($horario[$key]);
    }
 
   };

   foreach ($horario as $key => $value) {
        $data .= '<option value="' . $value . '">' . strtoupper($value) .'</option>';
   }

   

   print_r($data);
 
