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
    
    $sql = "INSERT INTO profissional (NomeProfissional, FuncaoProfissional, id_Salao ) VALUES ('{$profissional->nomeProfissional}','{$profissional->funcao}', '{$profissional->id}')";
    $profissionalSQL = mysqli_query($conn, $sql);
    
    if($profissionalSQL){
        print "<script>alert('Cadastrado com Sucesso!');</script>";
        print "<script>location.href='menu_inicial_cadastro_profissional.php';</script>";
    }
?>