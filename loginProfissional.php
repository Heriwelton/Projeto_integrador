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
                                Bem vindo ao Beauty Key!<br>
                                vamos começar?
                            </h2>
                                                
                            <div class="col-md-12">
                                <div class="custom-btn row  justify-content-md-center">
                                    <a href="loginCliente.php" class="btn alternativa">
                                        <img src="imagens/fm_hair.png"><br>
                                        Sou cliente
                                    </a>
                                    
                                    <a class="btn selecionado">
                                        <img src="imagens/salon.png"><br>
                                        Sou profissional
                                    </a>
                                </div>
                            </div>

                        <form action="valida_profissional.php" method="post">
                            
                            <div class="inputbox">
                                
                                <i class="fa-regular fa-file"></i>
                                <input type="text" name="cnpj" id="cnpj" required>
                                <label >CNPJ</label>
                                
                            </div>
                            <div class="inputbox">
                                
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="senha" required>
                                <label>Senha</label>
                            </div>

                            <div class="create-account">
                                <p>Não possui uma conta? <a href="cadastroProfissional.php">Registrar-se</a></p>
                            </div>

                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'erro' ) { ?>
                                                        
                                    
                                <div class="exception">
                                    Usuario ou senha inválido(s)
                                </div>
                                    
                            <?php } ?>

                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'erro2' ) { ?>
                                                        
                                    
                                <div class="exception">
                                    Faça login antes de prosseguir!
                                </div>
                                    
                            <?php } ?>
                                
                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'exception1' ) { ?>

                                <script>alert('Editado com Sucesso!');</script>                                                            
                                <div class="exception">
                                    Alteração detectada, realize login novamente!
                                </div>
                                    
                            <?php } ?>
                            

                            <button class="btn-login">
                                Entrar
                            </button>

                            

                        </form>
                    </div>
            </div>
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