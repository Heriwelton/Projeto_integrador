<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="stylesheet" href="estilo.css">
  <title>Beauty Key - Cadastro</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="valida_login.php" method="post">
                    <h2>Cadastro Cliente</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" required>
                        <label>Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="number" required>
                        <label>CPF</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" required>
                        <label>E-mail</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required>
                        <label>Senha</label>
                    </div>
                    <button>Registrar</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>