<?php

session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: loginProfissional.php?login=erro2');
}

include_once("config.php"); 


$salao = new stdClass();
$salao->nome = $_POST["nome"];
$salao->senha = md5($_POST["senha"]);
$salao->novaSenha = md5($_POST["confirmarSenha"]);
$salao->cnpj = $_POST["cnpj"];
$salao->email = $_POST["email"];

/*fazer um if para verificar se as senhas estão iguais*/ 


if($salao->senha != $_SESSION["senhaAtualSalao"]){
    header('Location: menu_inicial_profissional.php?menu=erro1');
}else{
    $sql_update_salao = "UPDATE `salao` SET NomeFantasiaSalao = '{$salao->nome}',CNPJ_Salao ='{$salao->cnpj}' WHERE CodSalao = '" . $_SESSION['idSalao']."'";
    $sql_update_usuario = "UPDATE `usuario` SET EmailUsuario = '{$salao->email}', SenhaUsuario = '{$salao->novaSenha}' WHERE EmailUsuario = '" . $_SESSION["email_usuario_salao"]."'";
    
    $row_update_salao = mysqli_query($conn, $sql_update_salao);
    $row_update_usuario = mysqli_query($conn, $sql_update_usuario);

    if($row_update_salao && $row_update_usuario) {       
        header('Location: loginProfissional.php?login=exception1');
    } else {
        print "Erro ao realizar o cadastro: " . mysqli_error($conn);
    }
}



 /*Inserçao de valores no banco de dados*/
   
  ?>