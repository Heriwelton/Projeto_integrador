<?php
    
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro2');
    }

   
    
    $sql = "SELECT NomeCliente as usuario from cliente WHERE CPF_cliente = '" . $_SESSION["usuario"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con = $conn->query($sql) or die($mysqli->error);
    $dado = $con->fetch_array();
    
    /*print_r($_SESSION["usuario"]);*/

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap.css">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/a779da957a.js" crossorigin="anonymous"></script>

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>

        
        <title>Beauty Key - Menu inicial</title>
    </head>
    <body>
    <!--INICIO BODY DA PAGINA -->
    <div id="corpo-menu-inicial-cliente" > 


        <!-- INICIO MENU DE NAVEGAÇÃO -->
        <div id="menu-navegacao"> 
		  <nav class=" navbar navbar-expand-md navbar-dark fixed-top navbar-transparente d-flex">
		      <!--Logo-->
		      <a href="#" class="navbar-brand">
				<h2>Beauty Key</h2>
		      </a>
		      

		      <!--Navegaçao-->

		     <div class="collapse navbar-collapse" id="navegacao">
		        <ul class="navbar-nav ">
                    <li class="nav-item">
		              <a href="menu_inicial.php" class="nav-link active">Serviços</a>
		            </li>

		            <li class="nav-item">
		              <a href="menu_inicial_localizacao_cliente.php" class="nav-link">Localização</a>
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
                            <a href="encerrar_sessao.php" class="dropdown-item"><i class="fa-solid fa-share-from-square"></i>Encerrar sessão </a>
                            
                        </div>
                    </li>

		        </div>
		     </div>      
		 </nav> 
        </div> 
        <!-- FIM MENU DE NAVEGAÇÃO -->

        
        <!-- INICIO SERVIÇOS -->
		<div class="col-12" > 
            <div class="row justify-content-center">
	    		<div class="col-3 conteudo-titulo-servicos-1">
                    <h1 class="titulo-servicos">Cabelo</h1>
	    		</div>
                <div class="col-3 conteudo-titulo-servicos-2">
	    			<h1 class="titulo-servicos">Unhas</h1>
	    		</div>
                <div class="col-3 conteudo-titulo-servicos-3">
	    			<h1 class="titulo-servicos">Maquiagem</h1>
	    		</div>
	        </div>

            <div class="row justify-content-md-center d-flex">
                
                <div class="conteudo-servicos align-self-center col-3" >   
                       	
                    <a class="botao-imagens-menu-1" href="menu_inicial_listar_servicos_cabelo.php">
                        
                    </a>
                </div>

                <div class="conteudo-servicos align-self-center col-3 ml-md-4"> 
                    <a class="botao-imagens-menu-2" href="menu_inicial_listar_servicos_unha.php" >

                        
                    </a>
                </div>

				<div class="conteudo-servicos align-self-center col-3 ml-md-4"> 
                    <a class="botao-imagens-menu-3" href="menu_inicial_listar_servicos_maquiagem.php">
                        
                    </a>
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
                        
                        $sql_cliente = "SELECT NomeCliente,CPF_cliente from cliente WHERE CPF_cliente = '" . $_SESSION["usuario"] . "'";
                        $sql_usuario = "SELECT SenhaUsuario, EmailUsuario, id_Usuario FROM usuario WHERE id_Usuario = '" . $_SESSION["idCliente"] . "'";

                        $row_cliente = $conn->query($sql_cliente) or die($mysqli->error);
                        $row_usuario = $conn->query($sql_usuario) or die($mysqli->error);
                        
                        
                    ?>

					<form action="editarCadastroCliente.php" method="post" >
                        <?php
                        
                        while($dados_cliente = $row_cliente->fetch_array()){ 
                            $dados_usuario =  $row_usuario->fetch_array();

                            ?>
                        
						<div class="form-group">           
							<label>Nome</label>
							<input name="nome" type="text" class="form-control" value="<?php echo $dados_cliente["NomeCliente"]; ?>" >
						</div>

						<div class="form-group">
							<label id="label-senha">Senha atual</label>
                            <input name="senha" type="password" id="form-senha" class="form-control " >
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
							<label>CPF</label>
							<input name="cpf" type="text" value="<?php echo $dados_cliente["CPF_cliente"]; ?>" class="form-control">
						</div>

                        <div class="form-group">
							<label>E-mail</label>
							<input name="email" type="text" value="<?php echo $dados_usuario["EmailUsuario"]; ?>" class="form-control">
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
    
    </body>
</html>