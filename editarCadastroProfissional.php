<?php

session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: loginProfissional.php?login=erro2');
}

include_once("config.php"); 

echo '<pre>';
print_r($_POST);
echo '</pre>';

$salao = new stdClass();
$salao->nome = $_POST["nome"];
$salao->senha = md5($_POST["senha"]);
$salao->novaSenha = md5($_POST["confirmarSenhaSalao"]);
$salao->cnpj = $_POST["cnpj"];
$salao->email = $_POST["email"];

/*fazer um if para verificar se as senhas estão iguais*/ 


if($cliente->senha != $_SESSION["senhaAtual"]){
    header('Location: menu_inicial_profissional.php?menu=erro1');
}else{
    $sql = "UPDATE `usuarios_salao` SET nomeSalao = '{$salao->nome}',cnpjCliente ='{$salao->cnpj}',emailCliente = '{$salao->email}', senhaCliente = '{$salao->novaSenha}' WHERE idSalao = '" . $_SESSION['idSalao']."'";
    $usuarios_app = mysqli_query($conn, $sql);
    if($usuarios_app) {       
        header('Location: loginProfissional.php?login=exception1');
    } else {
        print "Erro ao realizar o cadastro: " . mysqli_error($conn);
    }
}



 /*Inserçao de valores no banco de dados*/
   
  ?>