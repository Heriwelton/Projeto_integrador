<?php

	session_start();
	
	session_destroy();
    echo"<script>alert('sessão encerrada com sucesso!')</script>";
	header('Location:loginCliente.php');

?>