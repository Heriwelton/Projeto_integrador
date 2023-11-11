<?php
    session_start();

    include_once("config.php");



    $agenda = new stdClass();
    $agenda->funcaoProfissional = $_POST["funcaoProfissional"];
    $agenda->servico = $_POST["servico"];
    $agenda->profissional = $_POST["profissional"];
    $agenda->valorServico = $_POST["valorServico"];
    $agenda->dataServico = $_POST["dataServico"]; 
    $agenda->horarioServico = $_POST["horarioServico"];
    $agenda->idSalao = $_SESSION["id_salao"];
    $agenda->idCliente = $_SESSION["idCliente"];

    $sql = "INSERT INTO agendamento (DataAgendamento, HoraAgendamento, id_cliente, id_Salao, id_Profissional, ValorServico, Servico, TipoServico)
            VALUES  ('{$agenda->dataServico}', '{$agenda->horarioServico}', '{$agenda->idCliente}', '{$agenda->idSalao}', '{$agenda->profissional}', '{$agenda->valorServico}', '{$agenda->servico}', '{$agenda->funcaoProfissional}')";

    $agendaSQL = mysqli_query($conn, $sql);

    if($agendaSQL){
        print "<script>alert('Agendado com Sucesso!');</script>";
        print "<script>location.href='menu_inicial_agendamento_cliente.php';</script>";
    }

    $sql = ""

?>