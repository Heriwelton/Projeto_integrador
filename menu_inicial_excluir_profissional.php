<?php
    
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
    }

    if(isset($_GET['id'])){
        $_SESSION['idProfissional'] = $_GET['id'];
    }
    print_r($_SESSION['idProfissional']);

    $sql = "DELETE FROM profissional where id_Profissional  = ". $_SESSION["idProfissional"];
    $res = $conn->query($sql);

    if($res==true){
        print "<script>alert('Excluído com sucesso');</script>";
        print "<script>location.href='menu_inicial_listar_profissional.php';</script>";
    }else{
        print "<script>alert('Não foi possivel excluir');</script>";
        print "<script>location.href='menu_inicial_listar_profissional.php';</script>";
    }
?>