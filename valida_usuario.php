
<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro');
    }

    define('HOST','localhost');
    define('USER','root');
    define ('PASS', '');
    define('BASE', 'beauty');
    $conn = new mysqli(HOST,USER,PASS,BASE);

    if (!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    
    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;

    //usuarios do sistema(implementar script SQL)
    $sql = "SELECT cpfCliente as cpf,senhaCliente as senha FROM usuarios_cliente WHERE cpfCliente = '" . $_POST['cpf']."'";
    $usuarios_app = mysqli_query($conn, $sql);

    foreach($usuarios_app as $user) {

        if($user['cpf'] == $_POST['cpf'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
        }

    }

    if ($usuario_autenticado) {
        echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
    } else {
        $_SESSION['autenticado'] = 'NAO';
        
    }


?>