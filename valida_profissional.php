
<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location:loginProfissional.php?login=erro');
    }

    include_once("config.php"); 

    
    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;

    /*query pra selecionar o id no bd*/
    
    $sql3 = "SELECT CodSalao as salaoID from salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con3 = $conn->query($sql3) or die($mysqli->error);
    $dadoID = $con3->fetch_array();
    if($dadoID["salaoID"] == true){
        $_SESSION["idSalao"] = $dadoID["salaoID"];
    }
    
    
    //usuarios do sistema(implementar script SQL)
    $sql = "SELECT CNPJ_Salao as cnpj FROM salao WHERE CNPJ_Salao = '" . $_POST['cnpj']."'";
    $sqlCnpj = $conn->query($sql) or die($mysqli->error);
    $dadoCnpj = $sqlCnpj->fetch_array();    

    

    $senha = "SELECT SenhaUsuario as senha FROM usuario WHERE CodUsuario = '" . $_SESSION["idSalao"]."'";
    $conSenhaSalao = $conn->query($senha) or die($mysqli->error);
    $dadoSenhaSalao = $conSenhaSalao->fetch_array();
    if($dadoSenhaSalao["senha"] == true){
        $_SESSION["senhaAtualSalao"] = $dadoSenhaSalao["senha"];
        
    }



    if($dadoCnpj['cnpj'] == $_POST['cnpj'] && $dadoSenhaSalao['senha'] == md5($_POST['senha'])) {
       $usuario_autenticado = true;
    }


    $_SESSION["usuarioSalao"] = $_POST['cnpj'];

    if ($usuario_autenticado) {
        echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: menu_inicial_profissional.php');
        echo '<br>';
        print_r(md5($_POST['senha']));
        echo '<br>';
        print_r($_SESSION["senhaAtualSalao"]);

        
        

    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: loginProfissional.php?login=erro');
        
    }


?>