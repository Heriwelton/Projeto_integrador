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
        
        <script src="https://kit.fontawesome.com/a779da957a.js" crossorigin="anonymous"></script>

        <title>Beauty Key - login</title>
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
                                Criar conta
                            </h2>
                                                
                        
                        <form action="armazena_cadastro_cliente.php" method="post">
                        <input type="hidden" name="acao" value="cadastrar"> 
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="nomeCliente" required>
                                <label >Nome</label>
                                
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="senhaCliente" required>
                                <label>Senha</label>
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-file "></i>
                                <input type="text" name="cpfCliente" size="11" maxlength ="11" required>
                                <label>CPF</label>
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="emailCliente" required>
                                <label>E-mail</label>
                            </div>
                            
                            <div class="create-account">
                                <p>Já possui conta? <a href="loginCliente.php">Entrar!</a></p>
                            </div>
                            

                            <button class="btn-login">
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

</body>
</html>