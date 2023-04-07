<?php
    
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro2');
    }

    
    $sql = "SELECT nomeCliente as usuario from usuarios_cliente WHERE cpfCliente = '" . $_SESSION["usuario"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con = $conn->query($sql) or die($mysqli->error);
    $dado = $con->fetch_array();
    if($dado["usuario"] == true){
      
    }
    
    

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

        <title>Beauty Key - Menu inicial</title>
    </head>
    <body>
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
		            </li>
                    <li class="nav-item" >
		              <a href="#" class="nav-link" >Salões</a>
		            </li>
		            <li class="nav-item">
		              <a href="#" class="nav-link">Sobre nós</a>
		            </li>
		        </ul>
                <div class="d-none d-lg-block msg-recepcao">
                    <li>
                        seja bem vindo 
                        
                        <a href="#" class="dropdown-toggle msg-recepcao-a" data-toggle="dropdown" >
                        
                        <?php
                        
                        if($dado["usuario"] == true) {
                            
                        echo $dado["usuario"] ?>                                                               
                        <?php } ?>

                        </a>

                        <div class="dropdown-menu ">
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
		<div class="col-12" > 
            <div class="row justify-content-center">
	    		<div class="col-3 conteudo-titulo-servicos-1">
                    <h1>Cabelo</h1>
	    		</div>
                <div class="col-3 conteudo-titulo-servicos-2">
	    			<h1>Unha</h1>
	    		</div>
                <div class="col-3 conteudo-titulo-servicos-3">
	    			<h1>Maquiagem</h1>
	    		</div>
	        </div>

            <div class="row justify-content-md-center d-flex">
                
                <div class="conteudo-servicos align-self-center col-3 " >   
                       	
                    <a class="botao-imagens-menu-1 ">
                        
                    </a>
                </div>

                <div class="conteudo-servicos align-self-center col-3 ml-md-4"> 
                    <div class="botao-imagens-menu-2">

                        
                    </div>
                </div>

				<div class="conteudo-servicos align-self-center col-3 ml-md-4"> 
                    <div class="botao-imagens-menu-3">
                        
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
					<form action="processa_compra.php" method="post" >
						<div class="form-group">
							<label>Nome</label>
							<input name="nome" type="text" class="form-control">
						</div>

						<div class="form-group">
							<label>Senha</label>
							<input name="senha" type="password" class="form-control" >
						</div>

						<div class="form-group">
							<label>Confirmar senha</label>
							<input name="senha" type="password" class="form-control" >
						</div>

						<div class="form-group">
							<label>CPF</label>
							<input name="cpf" type="text" class="form-control">
						</div>

                        <div class="form-group">
							<label>E-mail</label>
							<input name="email" type="text" class="form-control">
						</div>
					
						<button type="submit" class="btn btn-lg btn-form d-flex" >
							<p>Confirmar alterações</p>
						</button>
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