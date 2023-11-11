<?php
session_start();

include_once("config.php");


if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: loginProfissional.php?login=erro2');
}


$sql = "SELECT NomeCliente as usuario from cliente WHERE CPF_cliente = '" . $_SESSION["usuario"] . "'"; //seleciona o nome do usuario de acordo com o cpf
$con = $conn->query($sql) or die($mysqli->error);
$dado = $con->fetch_array();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a779da957a.js" crossorigin="anonymous"></script>

    <title>Beauty Key - Menu inicial</title>
</head>
<body class="modal-open">
<!--INICIO BODY DA PAGINA -->
<div id="corpo-menu-inicial" > 


    <!-- INICIO MENU DE NAVEGAÇÃO -->
      <div id="menu-navegacao"> 
        <nav class=" navbar navbar-expand-md navbar-dark fixed-top navbar-transparente d-flex">
            <!--Logo-->
            <a href="#" class="navbar-brand">
          <h2>Beauty Key</h2>
            </a>
            
            <!-- Menu Hamburguer -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!--Navegaçao-->

          <div class="collapse navbar-collapse" id="navegacao">
              <ul class="navbar-nav ">
                      <li class="nav-item">
                    <a href="menu_inicial.php" class="nav-link active">Serviços</a>

                  <li class="nav-item">
                    <a href="menu_inicial_localizacao_cliente.php" class="nav-link ">Localização</a>
                  </li>

                  </li>
                      <li class="nav-item" >
                    <a href="menu_inicial_listar_agendamento_cliente.php" class="nav-link" >Agendamento</a>
                  </li>
              </ul>
                  <div class="d-lg-block msg-recepcao dropdown">
                      <li>
                          seja bem vindo 
                          
                          <a href="" class="dropdown-toggle msg-recepcao-a" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                          
                          <?php
                          
                          if($dado["usuario"]) {
                              
                          echo $dado["usuario"] ?>                                                               
                          <?php } ?>

                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a href="" class="dropdown-item" data-toggle="modal" data-target="#modal-editar"><i class="fa-solid fa-user"></i>Editar acesso</a>
                              <a href="" class="dropdown-item"><i class="fa-solid fa-house"></i>Configurar endereço</a>
                              <a href="encerrar_sessao.php" class="dropdown-item"><i class="fa-solid fa-share-from-square"></i>Encerrar sessão </a>
                              
                          </div>
                      </li>

              </div>
          </div>     
      </nav> 
      </div> 
    <!-- FIM MENU DE NAVEGAÇÃO -->

    
    <!-- INICIO SERVIÇOS -->
              
      <div class="row align-self-center">

      <div class="col-12 conteudo-titulo-funcionamento">
            <h1><a class='btn btn-voltar' href="menu_inicial.php"><i class="fa-solid fa-arrow-left-long"></i></a> Salões com especialidade em cabelo</h1> 
      </div>     

      <div class="col-12"> 

        <div class="row  justify-content-md-center">
            <div class="col-10 caixa-funcionamento-listar">
                   <?php
                   

                   $sqlServicoCabelo = "SELECT DISTINCT id_Salao, TipoServico FROM servico WHERE TipoServico = '". 'cabelo' ."'";
                   $resServicoCabelo = $conn->query($sqlServicoCabelo);
                   $qtdServicoCabelo = $resServicoCabelo-> num_rows;

                   

                   if($qtdServicoCabelo > 0){
                    print "<table class='table table-hover table-striped table-bordered'>";
                    print "<tr>";
                    print "<th>Salão</th>";
                    print "<th>Especialidade</th>";
                    print "<th>Endereço</th>";
                    print "<th>Ações</th> ";
                    print "<tr>";
                    while($row = $resServicoCabelo->fetch_object()){

                    $sqlServicoNome = "SELECT name, address FROM `markers` WHERE id_Salao = '{$row->id_Salao}' ";
                    $conServicoNome = $conn->query($sqlServicoNome) or die($mysqli->error);
                    $qtdServicoNome = $conServicoNome->fetch_array();

                    print "<tr>";
                    print "<td>". $qtdServicoNome["name"]; "</td>";
                    print "<td>". $row->TipoServico; "</td>";
                    print "<td>". $qtdServicoNome["address"]; "</td>";
                    print "<td>
                    <a href='menu_inicial_localizacao_cliente.php?servico=$row->id_Salao'  class='btn btn-success'>Ver no mapa</a>  
                     
                    </td>";
                    
        
                    print "<tr>";    
                    }
                    print "</table>";
                   }else{
                    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
                   }


                   
                   ?>
            </div>
            
        </div>           
             
      </div> 
      

                  
    </div>                    
    <!-- FIM SERVIÇOS -->  
    
    <!--INICIO MODAL EDITAR-CONTA -->   
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-editar">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        Editar acesso
    </h5 >

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
                     
    <div class="modal-content"> 
        <div class="row">
          <div class="col-md-12">
            <div class="card-body font-weight-bold">
                <h6 class="modal-title" id="exampleModalLabel" style="color: #2e2e2e ;">
                      Para realizar alterações, Preencha o formulario!
                      <hr>
                  </h6>

                <?php 
                
                    $sql2 = "SELECT * from usuarios_salao WHERE cnpjSalao = '" . $_SESSION["usuarioSalao"] . "'";
                    $con2 = $conn->query($sql2) or die($mysqli->error);
                    
                ?>

                <form action="editarCadastroProfissional.php" method="post" >
                    <?php while($dados = $con2->fetch_array()){ ?>

                    <div class="form-group">           
                        <label>Nome</label>
                        <input name="nome" type="text" value="<?php echo $dados["nomeSalao"]; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label id="label-senha">Senha atual</label>
                        <input name="senha" type="password" class="form-control" id="form-senha" >
                        <?php
                            if(isset($_GET['menu']) && $_GET['menu'] == 'erro1' ) { ?>
                            
                            <script>                                    
                                document.getElementById('form-senha').className = 'form-control-erro ' 
                                document.getElementById('label-senha').className = 'text-danger'
                                alert('Erro ao atualizar o cadastro, senha não confere!');                           
                            </script>
                                
                            <div class="exception2 text-danger">
                                Senha não confere!
                            </div>
                                
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Nova senha</label>
                        <input name="confirmarSenha" type="password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>CNPJ</label>
                        <input name="cnpj" type="text" value="<?php echo $dados["cnpjSalao"]; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="text" value="<?php echo $dados["emailSalao"]; ?>" class="form-control">
                    </div>
                
                    <button type="submit" class="btn btn-lg btn-form d-flex" >
                        <p>Confirmar alterações</p>
                    </button>
                    <?php } ?>
                </form>
                </div>
            </div>	
          </div>
    </div> <!--fim modal content-->
    <!--FIM MODAL EDITAR-CONTA -->        

  </div>
  </div>

</div>                    
    
    
</div> 
<!-- FIM BODY DA PAGINA -->






<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="js/jquery.mask.js" type="text/javascript"></script>


</body>
</html>