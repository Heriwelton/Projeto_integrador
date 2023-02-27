<?php
    session_start();



?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="estilo.css">

        <title>Beauty Key - login</title>
    </head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="valida_usuario.php" method="post">
                    <h2>login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" required>
                        <label>Email</label>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>