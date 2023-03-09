<?php
    session_start();



?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="estilo.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        
        <title>Beauty Key - login</title>
    </head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="valida_usuario.php" method="post">
                    <h2>login</h2>
                    
                    <div class="col-md-12">
                        <div class="row conteudo-alinhamento justify-content-md-center">
                            <div id="clicavel" data-target="menu_inicial.php" class="conteudo-servicos align-self-center col-md-4 " >                 	
                                <h4>Sou cliente</h4>
                            </div>

                            <div id="clicavel" data-target="menu_inicial.php" class="conteudo-servicos align-self-center col-md-4 ml-md-4"> 

                                <h4>Sou cliente</h4>
                            </div>        
                        </div>
                    </div>
                    <div class="inputbox">
                        
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" required>
                        <label>CPF</label>
                        
                    </div>
                    <div class="inputbox">
                        
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" required>
                        <label>Senha</label>
                    </div>

                    <?php
                        if(isset($_GET['login']) && $_GET['login'] == 'erro' ) { ?>
                                                   
                            
                        <div>
                            Usuario ou senha inválido(s)
                        </div>
                            
                    <?php } ?>

                    <?php
                        if(isset($_GET['login']) && $_GET['login'] == 'erro2' ) { ?>
                                                   
                            
                        <div>
                            Faça login antes de acessar os conteudos protegidos
                        </div>
                            
                    <?php } ?>

                    <button>entrar</button>

                    <div>
                        <p>Não possui uma conta? <a href="cadastro.php">Registrar-se</a></p>
                    </div>

                </form>
            </div>
        </div>
    </section>



     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>