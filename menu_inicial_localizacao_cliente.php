<?php
    
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
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
		              <a href="menu_inicial.php" class="nav-link ">Serviços</a>
		            </li>

		            <li class="nav-item">
		              <a href="menu_inicial_localizacao_cliente.php" class="nav-link active">Localização</a>
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
                  
          <div class="col-12" style="border: 1px solid">  <!--inicio DIVISAO -->

            <div class="row">

                <div class="col-5 caixa-funcionamento-localizacao ">
                  	<div class="conteudo-funcionamento align-self-center ">
                      <h4>Salões disponiveis</h4>

                        <div class="conteudo-cadastro-cliente">
                            <?php
                                if(isset($_GET['servico']) == false ) { ?>                                                                                                          
                                    <div class="recepcao-cliente">
                                        <i class="fa-solid fa-map-location-dot"></i><br>
                                        <h3>Para começar, selecione um dos nossos salões parceiros!!</h3>
                                    </div>
                                    <div class="recepcao-cliente2">
                                        <i class="fa-solid fa-magnifying-glass-location teste"></i><br>
                                        <h3>Você poderá consultar e agendar serviços em qualquer salão da sua preferência</h3>
                                    </div>
                            <?php }?>
          
                            <?php
                                if(isset($_GET['servico']) && $_GET['servico'] >= 0 ) { ?>

                                <?php $consultaSalao = "SELECT * FROM  markers WHERE id_Salao = '". htmlspecialchars($_GET["servico"]). "'";
                                      $sqlConsultaSalao = $conn->query($consultaSalao) or die ($mysqli->error);
                                    
                                      $_SESSION["id_salao"] = htmlspecialchars($_GET["servico"]);
                                      while($dadoConsultaSalao = $sqlConsultaSalao->fetch_array()){ ?>
                                      <h3><?php echo $dadoConsultaSalao["name"]?></h3>   
                                <?php } ?>
                               
                                    
                                                

                                    <img class="img-salon-localizacao" src="imagens/salon.png">
                                    <?php 

                                    $consulta = "SELECT * FROM  usuario WHERE id_Usuario = '". htmlspecialchars($_GET["servico"]). "'";
                                    $sqlConsulta = $conn->query($consulta) or die ($mysqli->error);

                                    $consultaServico = "SELECT DISTINCT TipoServico FROM `servico` WHERE id_Salao = '". htmlspecialchars($_GET["servico"]). "'";
                                    $sqlConsultaServico = $conn->query($consultaServico) or die ($mysqli->error);

                                    while($dadoConsulta = $sqlConsulta->fetch_array()){ ?>                 
                                    <h3>Localização: </h3>
                                    <h3>Rua: <span><?php echo $dadoConsulta["EnderecoUsuario"]?>  </span> numero: <span><?php echo $dadoConsulta["NumEdcUsuario"] ?></span></h3>
                                    <h3>Bairro: <span><?php echo $dadoConsulta["BairroUsuario"] ?></span> </h3>
                                    <h3>Cidade: <span><?php echo $dadoConsulta["CidadeUsuario"] ?></span> </h3>
                                    <h3>Estado: <span><?php echo $dadoConsulta["EstadoUsuario"] ?></span> </h3><br/>
                                    <h3>Especialidades: </h3>
                                    <?php }?>
                                    <?php 
                                       
                                    while($dadoConsultaServico = $sqlConsultaServico->fetch_array()){ ?>                                    
                                    <h3><span><?php echo $dadoConsultaServico["TipoServico"] ?></span></h3>
                                    
                                    <?php }?>

                                    <a class="btn-localizacao-cliente" href="menu_inicial_agendamento_cliente.php">Agendar serviço<i class="fa-solid fa-arrow-right"></i></a>

                                  
                            <?php } ?> 

                        </div>
                  	</div>
                </div>

                <div class="col-7 caixa-funcionamento-localizacao"> 
                  <div class="conteudo-funcionamento align-self-center">
                    <h4>Sua localização atual</h4>
                    
                    <div id="map"></div>
                    

                    <script>
                        var customLabel = {
                            restaurant: {
                            label: 'R'
                            },
                            bar: {
                            label: 'B'
                            }
                        };

                        <?php
                            if(isset($_GET['servico']) == false ) { ?>   // Mapa padrao---------------------------------------------------------

                            function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(-23.54543129063135, -46.615752711753274),
                            zoom: 10
                            });
                            var infoWindow = new google.maps.InfoWindow;
                            
                           
                            
                            // Change this depending on the name of your PHP or XML file
                            downloadUrl('resultado_cliente.php', function(data) {
                                var xml = data.responseXML;
                                var markers = xml.documentElement.getElementsByTagName('marker');
                                Array.prototype.forEach.call(markers, function(markerElem) {
                                var name = markerElem.getAttribute('name');
                                var address = markerElem.getAttribute('address');
                                var type = markerElem.getAttribute('idSalao');
                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('lat')),
                                    parseFloat(markerElem.getAttribute('lng')));

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));

                                var text = document.createElement('text');
                                text.textContent = address
                                
                                infowincontent.appendChild(text);
                                infowincontent.appendChild(document.createElement('br'));

                                var a = document.createElement('a'); 
                                var createAlink = document.createTextNode(a);
                                a.setAttribute('href',"http://localhost/ProjetoIntegrador/menu_inicial_localizacao_cliente.php"+ "?servico="+ type);
                                a.appendChild(createAlink);                                  
                                a.textContent = "Obter detalhes"                          
                                infowincontent.appendChild(a);
                                

                                var icon = customLabel[type] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);
                                    infoWindow.open(map, marker);
                                });
                                });
                            });
                            //inicio ver loc atual -----------------------------------------------------------------------------------------------------------------------------------------------------------
                            const locationButton = document.createElement("button");

                            locationButton.textContent = "Ir para localização atual";
                            locationButton.classList.add("custom-map-control-button");
                            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                            locationButton.addEventListener("click", () => {
                            // Try HTML5 geolocation.
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                    };
                                    
                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent("Você está aqui.");                       
                                    infoWindow.open(map);
                                    map.setCenter(pos);
                                },
                                () => {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                }
                                );
                            } else {
                                // Browser doesn't support Geolocation
                                handleLocationError(false, infoWindow, map.getCenter());
                            }
                            });


 

                            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                            infoWindow.setPosition(pos);
                            infoWindow.setContent(
                            browserHasGeolocation
                                ? "Error: The Geolocation service failed."
                                : "Error: Your browser doesn't support geolocation."
                            );
                            infoWindow.open(map);
                            }
                            //fim ver loc atual -----------------------------------------------------------------------------------------------------------------------------------------------------------

                            // EVENTOS -----------------------------------------------------------------------------------------------------------------------------------------------------------
                                
                                map.addListener('zoom_changed', function() {
                                
                            });


                            // FIM EVENTOS -----------------------------------------------------------------------------------------------------------------------------------------------------------

                            

                        }                            
                            

                        <?php }?>


                        <?php
                            if(isset($_GET['servico']) && $_GET['servico'] >= 0 ) { ?> // Mapa quando algum marker é selecionado---------------------------------------------------------  

                            function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(<?php

                            $consultaMapa = "SELECT * FROM  markers WHERE id_Salao = '". htmlspecialchars($_GET["servico"]). "'";
                            $sqlConsultaMapa = $conn->query($consultaMapa) or die ($mysqli->error);
                                                       
                            while($dadoConsultaMapa = $sqlConsultaMapa->fetch_array()){ ?>
                            <?php echo $dadoConsultaMapa["lat"]?>, <?php echo $dadoConsultaMapa["lng"]?>
                            
                            <?php } ?>),
                            zoom: 13
                            });
                            var infoWindow = new google.maps.InfoWindow;
                            
                           
                            
                            // Change this depending on the name of your PHP or XML file
                            downloadUrl('resultado_cliente.php', function(data) {
                                var xml = data.responseXML;
                                var markers = xml.documentElement.getElementsByTagName('marker');
                                Array.prototype.forEach.call(markers, function(markerElem) {
                                var name = markerElem.getAttribute('name');
                                var address = markerElem.getAttribute('address');
                                var type = markerElem.getAttribute('idSalao');
                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('lat')),
                                    parseFloat(markerElem.getAttribute('lng')));

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));

                                var text = document.createElement('text');
                                text.textContent = address
                                
                                infowincontent.appendChild(text);
                                infowincontent.appendChild(document.createElement('br'));

                                var a = document.createElement('a'); 
                                var createAlink = document.createTextNode(a);
                                a.setAttribute('href',"http://localhost/ProjetoIntegrador/menu_inicial_localizacao_cliente.php"+ "?servico="+ type);
                                a.appendChild(createAlink);                                  
                                a.textContent = "Obter detalhes"                          
                                infowincontent.appendChild(a);
                                

                                var icon = customLabel[type] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);
                                    infoWindow.open(map, marker);
                                });
                                });
                            });
                            //inicio ver loc atual -----------------------------------------------------------------------------------------------------------------------------------------------------------
                            const locationButton = document.createElement("button");

                            locationButton.textContent = "Ir para localização atual";
                            locationButton.classList.add("custom-map-control-button");
                            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                            locationButton.addEventListener("click", () => {
                            // Try HTML5 geolocation.
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                    };
                                    
                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent("Você está aqui.");                       
                                    infoWindow.open(map);
                                    map.setCenter(pos);
                                },
                                () => {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                }
                                );
                            } else {
                                // Browser doesn't support Geolocation
                                handleLocationError(false, infoWindow, map.getCenter());
                            }
                            });


 

                            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                            infoWindow.setPosition(pos);
                            infoWindow.setContent(
                            browserHasGeolocation
                                ? "Error: The Geolocation service failed."
                                : "Error: Your browser doesn't support geolocation."
                            );
                            infoWindow.open(map);
                            }
                            //fim ver loc atual -----------------------------------------------------------------------------------------------------------------------------------------------------------

                            // EVENTOS -----------------------------------------------------------------------------------------------------------------------------------------------------------
                                
                                map.addListener('zoom_changed', function() {
                                
                            });


                            // FIM EVENTOS -----------------------------------------------------------------------------------------------------------------------------------------------------------

                            

                        }
                        <?php } ?>  


                        function downloadUrl(url, callback) {
                            var request = window.ActiveXObject ?
                                new ActiveXObject('Microsoft.XMLHTTP') :
                                new XMLHttpRequest;

                            request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                            };

                            request.open('GET', url, true);
                            request.send(null);
                        }



                        function doNothing() {}
                        </script>
                        <script async defer
                        
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDixYYt1vx-ibbfEFbVP8CNxPillYq2xXs&callback=initMap">
                    </script>

                  	
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
                    
                        $sql_salao = "SELECT NomeFantasiaSalao,CNPJ_Salao from salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"] . "'";
                        $sql_usuario = "SELECT SenhaUsuario, EmailUsuario, CodUsuario from usuario WHERE CodUsuario = '" . $_SESSION["idSalao"] . "'";

                        $row_salao = $conn->query($sql_salao) or die($mysqli->error);
                        $row_usuario = $conn->query($sql_usuario) or die($mysqli->error);
                        
                    ?>

					<form action="editarCadastroProfissional.php" method="post" >
                        <?php
                        
                        while($dados_salao = $row_salao->fetch_array()){
                            $dados_usuario =  $row_usuario->fetch_array();
                            
                            ?>

						<div class="form-group">           
							<label>Nome</label>
							<input name="nome" type="text" value="<?php echo $dados_salao["NomeFantasiaSalao"]; ?>" class="form-control">
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
							<input name="cnpj" type="text" value="<?php echo $dados_salao["CNPJ_Salao"]; ?>" class="form-control">
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