<?php
    session_start();  

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
        <script src="https://kit.fontawesome.com/a779da957a.js" crossorigin="anonymous"></script>

        <title>Beauty Key - Cadastro</title>
        <script>
			function getDadosEnderecoPorCEP(cep) {
				let url = 'https://viacep.com.br/ws/'+cep+'/json/'

				let xmlHttp = new XMLHttpRequest()
				xmlHttp.open('GET', url)

				xmlHttp.onreadystatechange = () => {
					if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
						let dadosJSONText = xmlHttp.responseText
						let dadosJSONObj = JSON.parse(dadosJSONText)

						document.getElementById('endereco').value = dadosJSONObj.logradouro
                        document.getElementById('bairro').value = dadosJSONObj.bairro
						document.getElementById('cidade').value = dadosJSONObj.localidade
                        document.getElementById('uf').value = dadosJSONObj.uf
						
					}
				}

				xmlHttp.send()
			}
		</script>
    </head>
<body>
    <section>
        <div class="row ">
            <div class="form-box col-5">
                    <div class="form-value">
                            <div class="logo-beauty-solutions">
                                <img src="imagens/Logo_beauty_solutions.png">
                            </div>

                            <h2>
                                Informe seu endereço
                            </h2>
                                                
                        
                        <form action="armazena_cadastro_salao_endereco.php" method="post">
                        <input type="hidden" name="acao" value="cadastrar"> 
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-earth-americas"></i>
                                <input type="text" onblur="getDadosEnderecoPorCEP(this.value)" id="cep"/>
                                <label >CEP</label>
                                
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-road"></i>
                                <input type="text"  name="ruaSalao" id="endereco"/>
                                <label>Rua</label>
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-list-ol"></i>
                                <input type="text" name="numeroSalao" >
                                <label>Numero</label>
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-city"></i>
                                <input type="text" name="bairroSalao" id="bairro" />
                                <label>Bairro</label>
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-city"></i>
                                <input type="text" name="cidadeSalao" id="cidade" />
                                <label>Cidade</label>
                            </div>

                            <div class="inputbox">                              
                                <i class="fa-solid fa-city"></i>
                                <input type="text" name="ufSalao" id="uf" />
                                <label>Estado</label>
                            </div>
                            


                            <div class="create-account">
                                <p>Já possui conta? <a href="loginProfissional.php">Entrar!</a></p>
                            </div>
                            
                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'erro4' ) { ?>
                                                        
                                    
                                <div class="exception">
                                   Email já cadastrado! tente outro!
                                </div>
                                    
                            <?php } ?>
                                   
                            <button class="btn-login" id="acesso">
                                Cadastrar
                            </button>                  

                    </form>
                </div>
            </div>


            <!--Área da parte visual da direita -->
            <div class="col-7 custom-box" >
                 <div class="perfil">

                 </div>                   
            </div>

        </div>
    </section>                            

     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(jQuery){
        $("#cnpj").mask('99.999.999/9999-99');

    })
    </script>  
</body>
</html>