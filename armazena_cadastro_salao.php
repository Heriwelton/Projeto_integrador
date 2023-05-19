<?php

    session_start(); 


    require "./bibliotecas/PHPMailer/Exception.Php";
    require "./bibliotecas/PHPMailer/OAuth.Php";
    require "./bibliotecas/PHPMailer/OAuthTokenProvider.Php";
    require "./bibliotecas/PHPMailer/PHPMailer.Php";
    require "./bibliotecas/PHPMailer/POP3.Php";
    require "./bibliotecas/PHPMailer/SMTP.Php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include_once("config.php"); 
  
  // Verifica se os dados foram enviados pelo formulário
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Recupera os dados enviados pelo formulário

      $salao = new stdClass();
      $salao->nome = $_POST["nomeSalao"];
      $salao->senha = md5($_POST["senhaSalao"]);
      $salao->cnpj = $_POST["cnpjSalao"];
      $salao->email = $_POST["emailSalao"];

    if(!isset($salao->nome)){
        $return = "Erro ao realizar o cadastro: Nome não identificado!";
        print "<script>alert('Cadastrado com Sucesso!');</script>";
    }

    if(!isset($salao->senha)){
        print "<script>alert('Erro ao realizar o cadastro: Senha não identificado!');</script>";
        print "<script>location.href='cadastroCliente.php';</script>";
        die;
    }

    if(!isset($salao->cnpj)){
        print "<script>alert('Erro ao realizar o cadastro: CNPJ não identificado!');</script>";
        print "<script>location.href='cadastroCliente.php';</script>";
        die;
    }

    if(!isset($salao->email)){
        print "<script>alert('Erro ao realizar o cadastro: E-mail não identificado!');</script>";
        print "<script>location.href='cadastroCliente.php';</script>";
        die;
    }

    $sqlSelect = "SELECT * FROM salao WHERE CNPJ_Salao = '{$salao->cnpj}'";
    $usuarios_existentes = $conn->query($sqlSelect);

    if($usuarios_existentes->num_rows > 0){
        header('Location: cadastroProfissional.php?login=erro3');
        print "<script>location.href='cadastroCliente.php';</script>";
        die;
    }

    $sqlSelect_email = "SELECT EmailUsuario FROM usuario WHERE EmailUsuario = '{$salao->email}'";
    $email_existentes = $conn->query($sqlSelect_email);

    if($email_existentes->num_rows > 0){
        header('Location: cadastroProfissional.php?login=erro4');
        print "<script>location.href='cadastroProfissional.php';</script>";
        die;
    }
  
      // Insere os dados no banco de dados
      $sql = "INSERT INTO salao (NomeFantasiaSalao, CNPJ_Salao) VALUES ('$salao->nome', '$salao->cnpj')"; 
      $sql2 = "INSERT INTO usuario (SenhaUsuario, EmailUsuario) VALUES ('{$salao->senha}','{$salao->email}')";
      $usuarios_app = mysqli_query($conn, $sql);
      $usuarios_app2 = mysqli_query($conn, $sql2);

      if ($usuarios_app && $usuarios_app2) {
          

          // Classe para estruturar o corpo do email para uso do PHPmailer
            class Mensagem {
            private $nome = null;
            private $email = null;
            public $status = array('codigo_status' => null, 'descricao_status' => '');
    
            public function __get($atributo) {
                return $this->$atributo;
            }
    
            public function __set($atributo, $valor) {
                $this->$atributo = $valor;
            }
    
            public function mensagemValida() {
                if(empty($this->nome) || empty($this->email)) {
                    return false;
                }
    
                return true;
            }
        }
    
        $mensagem = new Mensagem();
        //pega dos inputs do front
        $mensagem->__set('nome', $_POST['nomeSalao']);
        $mensagem->__set('email', $_POST['emailSalao']);
    
    
        $mail = new PHPMailer(true);
        
        
    
    
        try {
                //Server settings
                $mail->SMTPDebug = false;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'beautysolutionsoficial@gmail.com';                     //SMTP username
                $mail->Password   = 'lhnzbqcizhmertkz';                               //SMTP password
                $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;        
                $mail->CharSet = 'UTF-8';                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom('beautysolutionsoficial@gmail.com', 'BEAUTY KEY - Um novo conceito de beleza');
                $mail->addAddress($mensagem->__get('email'));     //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
    
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = ('Olá '.$mensagem->__get('nome').' seja bem vindo ao Beauty Key!!');
                $mail->Body    = '<Strong>TESTE</strong>';
    
    
                $mail->AltBody = 'É necessario usar um client que suporte HTML para obter todos os recursos dessa mensagem';
    
                $mail->send();
    
                
                $mensagem->status['codigo_status'] = 1;
                $mensagem->status['descricao_status'] = 'Email enviado com sucesso';
                print "<script>alert('Cadastrado com Sucesso');</script>";
    
        } catch (Exception $e) {
    
                $mensagem->status['codigo_status'] = 2;
                $mensagem->status['descricao_status'] = 'Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro' . $mail->ErrorInfo;
                //alguma lógica que armazena algum possivel erro
        }
        print "<script>location.href='loginProfissional.php';</script>";

      } else {
          echo "Erro ao realizar o cadastro: " . mysqli_error($conn);
      }

  }
  
  function validaCampos($data){
    $return = '';

    return $return;

}
?>
