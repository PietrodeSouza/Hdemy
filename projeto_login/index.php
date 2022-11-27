<?php
    require_once 'Classes/usuarios.php';
    $v = new Usuario();
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <title>Cadastro de Usuários</title>
    </head>
    <body>
        <header>
            <img src="LogoCompleta.png" alt="logo" style="width: 394px; height: 115.6px; padding-top: 0 px;">
            <a href="../index.html" target="_self"><strong>Voltar</strong></a>
        </header>
        <div id="corpo-form">
            <h1>Login</h1>
            <form method="POST">
                <input type="email" placeholder="Usuário" name="email">
                <input type="password" placeholder="Senha" name="senha">
                <input class="ca" type="submit" value="ACESSAR">
                <a href="cadastro.php">Se ainda não cadastrado, <strong>Cadastrar-se</strong></a>
            </form>
        </div>
            <?php
                $nome = "hdemybanco";
                $host = "hdemyserver.mysql.database.azure.com";
                $usuario = "hroot";
                $senha = "Hdemy12345";
                $options = [
                    PDO::MYSQL_ATTR_SSL_CA => './../certificado.crt.pem',
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
                ];

                try {
                    $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha, $options);

                    echo "Conexao 1 OK!";
                } catch (PDOException $e) {
                    var_dump($e);
                    echo($e->getMessage());
                }


                $connection = mysqli_init();
                $connection->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
                $connection->ssl_set(null, null, "./../certificado.crt.pem", null, null);
                $connection->real_connect('hdemyserver.mysql.database.azure.com', 'hroot', 'Hdemy12345', 'hdemybanco');

                if (!$connection) {
                    var_dump(mysqli_connect_error());
                } else {
                    echo "conexao 2 OK!";
                }


                if (isset($_POST['email'])) {
                    $email = addslashes($_POST['email']);
                    $senha = addslashes($_POST['senha']);

                    //verificar se os campos estão preenchidos
                    if (!empty($email) && !empty($senha)) {
                        $v->conectar("id19894318_hdemybanco", "localhost", "id19894318_hdevs", "[3z!djQLc?7B89Vc");
                        if ($v->msgErro == "") {
                            if ($v->logar($email, $senha)) {
                                header("location: ../simulados/index.php");
                            } else {
                                ?>
                                    <div class="msg-erro">
                                    Email e/ou Senha Errados!
                                    </div>
                                <?php
                            }
                        } else {
                            ?>
                                <div class="msg-erro">
                                <?php echo "Erro: " . $v->msgErro; ?>
                                </div>
                            <?php
                        }
                    } else {
                        ?>
                            <div class="msg-erro">
                                Preencha todos os campos!
                            </div>
                        <?php
                    }
                }
                ?>
    </body>
</html>
