
<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location:loginProfissional.php?login=erro');
    }

    include_once("config.php"); 

    
    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;

    //usuarios do sistema(implementar script SQL)
    $sql = "SELECT cnpjSalao as cnpj,senhaSalao as senha FROM usuarios_salao WHERE cnpjSalao = '" . $_POST['cnpj']."'";
    $usuarios_app = mysqli_query($conn, $sql);

    $senha = "SELECT senhaSalao as senha FROM usuarios_salao WHERE cnpjSalao = '" . $_POST['cnpj']."'";
    $conSenha = $conn->query($senha) or die($mysqli->error);
    $dadoSenha = $conSenha->fetch_array();
    if($dadoSenha["senha"] == true){
        $_SESSION["senhaAtual"] = $dadoSenha["senha"];
        
    }

    foreach($usuarios_app as $user) {

        if($user['cnpj'] == $_POST['cnpj'] && $user['senha'] == md5($_POST['senha'])) {
            $usuario_autenticado = true;
        }

    }

    $_SESSION["usuarioSalao"] = $_POST['cnpj'];

    if ($usuario_autenticado) {
        echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: menu_inicial_profissional.php');

        print_r($_SESSION["usuarioSalao"]);

    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: loginCliente.php?login=erro');
        
    }


?>