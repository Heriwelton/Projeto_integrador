<?php

    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: login.php?login=erro2');
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="estilo.css">

        <title>Beauty Key - Menu inicial</title>
    </head>
    <body>
        <section>
            <h1>MENU INICIAL TESTE</h1>
                
        </section>       
    </body>
</html>