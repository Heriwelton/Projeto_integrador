<?php
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
    }



    $profissional = new stdClass();
    $profissional->nomeProfissional = $_POST["nome"];
    $profissional->cabelo = $_POST["cabelo"];
    $profissional->unha = $_POST["unha"];
    $profissional->maquiagem = $_POST["maquiagem"];

    $profissional->funcao = $profissional->cabelo . " ". $profissional->unha ." ". $profissional->maquiagem;
    $profissional->id = $_SESSION["idSalao"];

    
    $sql = "UPDATE `profissional` SET 
                NomeProfissional = '{$profissional->nomeProfissional}',
                FuncaoProfissional = '{$profissional->funcao}',
                id_Salao = '{$profissional->id}'
            WHERE 
                id_Profissional = ". $_SESSION["idFuncionario"];    
    $servicosSQL = mysqli_query($conn, $sql);

    if($servicosSQL){
        print "<script>alert('Editado com Sucesso!');</script>";
        print "<script>location.href='menu_inicial_listar_profissional.php';</script>";
    }
    