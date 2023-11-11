<?php
    
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
    }

    
    $sql = "SELECT NomeFantasiaSalao as usuarioSalao from salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con = $conn->query($sql) or die($mysqli->error);
    $dado = $con->fetch_array();
    
    /*query pra selecionar o id no bd*/
    $sql3 = "SELECT id_Salao  as salaoID from salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con3 = $conn->query($sql3) or die($mysqli->error);
    $dadoID = $con3->fetch_array();
    if($dadoID["salaoID"] == true){
        $_SESSION["idSalao"] = $dadoID["salaoID"];
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
        
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/a779da957a.js" crossorigin="anonymous"></script>

        <title>Beauty Key - Menu inicial</title>

        <script type="text/javascript">
            $(document).ready(function(jQuery){
            $('#custo').mask('000.000.000.000.000,00', {reverse: true});

        })
    </script>
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
		              <a href="menu_inicial_profissional.php" class="nav-link ">Inicio</a>
		            </li>
                    <li class="nav-item" >
		              <a href="#" class="nav-link" >Agenda</a>
		            </li>
		            <li class="nav-item">
		              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Listar</a>
                      <div class="dropdown-menu ">
                        <a href="menu_inicial_listar_servicos.php" class="dropdown-item"><i class="fa-solid fa-briefcase"></i></i>Serviços</a>
                        <a href="menu_inicial_listar_profissional.php" class="dropdown-item"><i class="fa-solid fa-user"></i>Funcionarios</a>                       
                      </div>
		            </li>
                    
                    <li class="nav-item">
		              <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Cadastrar</a>
                      <div class="dropdown-menu ">
                            <a href="menu_inicial_cadastro_servicos.php" class="dropdown-item"><i class="fa-solid fa-briefcase"></i></i>Serviços</a>
                            <a href="menu_inicial_cadastro_profissional.php" class="dropdown-item"><i class="fa-solid fa-user"></i>Funcionarios</a>                      
                      </div>
		            </li>
                    <li class="nav-item" >
		              <a href="menu_inicial_localizacao_profissional.php" class="nav-link" >Localização</a>
		            </li>
		        </ul>
                <div class="d-none d-lg-block msg-recepcao">
                    <li>                   
                        
                        <a href="#" class="dropdown-toggle msg-recepcao-a" data-toggle="dropdown" >
                        
                        <?php
                        
                        if($dado["usuarioSalao"] == true) {
                            
                        echo $dado["usuarioSalao"] ?>                                                               
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
                  
          <div class="row align-self-center">

          <div class="col-12 conteudo-titulo-funcionamento">
                <h1>Cadastro de preços dos serviços</h1>
          </div>     

          <div class="col-12"> 

            <div class="row  justify-content-md-center">

                <div class="col-10 caixa-funcionamento">
                  	<div class="conteudo-funcionamento align-self-center ">
                      <form action="armazena_cadastro_servicos.php" method="POST">

                        <div class="mb-3 espacamento-cadastro-funcionario">
                            <h3>Nome do profissional</h3>
                            <select type="text" name="nomeProfissional" id="nomeProfissional" class="form-control" onchange="atualizaNomeProfissional()">
                            <?php
                                $sqlProfissional = "SELECT * FROM profissional WHERE id_Salao = '" . $_SESSION["idSalao"] . "'";
                                $resProfissional = $conn->query($sqlProfissional);
                                $qtdProfissional = $resProfissional -> num_rows;

                                if ($qtdProfissional > 0){
                                    while($row = $resProfissional->fetch_object()){
                                        print "<tr>";
                                        print"<option value=".$row->id_Profissional .">".strtoupper($row->NomeProfissional)."</option>";
                                        
                                    }
                                    
                                }
                            ?>
                           
                            </select>
                        </div>

                        <script>
                            function atualizaNomeProfissional(){
                                var ProfissionalAtual = document.getElementById("nomeProfissional").value;

                                $.ajax({
                                    method: "post",
                                    url: "busca_servico.php",
                                    data: {
                                        valor: ProfissionalAtual
                                    },
                                }).then(function(data){         
                                    selectData = document.getElementById('tipo_servico').innerHTML = data;  
                                    console.log(data);
                                });
                                
                               
                            }


                        </script>       

                        <div class="mb-3 espacamento-cadastro-funcionario">
                            <h3>Especialidade</h3>
                            <select type="text" name="tipoServico" id="tipo_servico" class="form-control">

                            </select>
                        </div>

                        <div class="mb-3 espacamento-cadastro-funcionario">
                            <h3>Serviço</h3>
                            <input type="text" name="servico"  class="form-control" >
                        </div>

                        <div class="mb-3 espacamento-cadastro-funcionario">
                            <h3>Valor</h3>
                            <input type="text" name="valorServico"  class="form-control" id="custo" >
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn-cadastro-funcionario btn">Cadastrar</button>
                        </div>
                      </form>
                  	</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.js" type="text/javascript"></script>
    

    
    </body>
</html>