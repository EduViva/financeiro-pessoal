<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style2.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="template.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
</head>
<?php
    if(isset($_GET['register'])){ 
        $registred = $_GET['register'];
   
        if($registred == 1){
            echo `<script> toastIt('Usuário cadastrado!','success') </script>`;
            echo 'Usuário cadastrado!';
        } else {
            echo `<script> toastIt('Ops! Usuário não cadastrado!','error') </script>`;
            echo 'Usuário não cadastrado!';
        }
    }
    if(isset($_GET['errorLogin'])){ 
        echo 'Usuário não logado!';
        echo `<script> toastIt('Ops! Você não conseguiu logar','error') </script>`;
    }
    if(isset($_GET['errorAccess'])){ 
        echo 'Você não está autorizado a acessar esta página. Por favor, efetue login.';
        echo `<script> toastIt('Ops! Você não conseguiu logar','error') </script>`;
    }
?>
<body class="body-login2">
    <div class="container">
        <div class="row valign-wrapper">
            
            <div class="container-main col m6 offset-m3">

                <div class="container-header">
                    Entrar
                </div>
                
                <div class="container-body login-body">
                    <form action="./models/process_login.php" method="post" name="login_form">
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="email" name="email" id="input-login" class="validate">
                                    <label for="input-login">E-mail</label>
                                    <span class="helper-text" data-error="Ops! Preencha um e-mail válido"></span>
                                </div>
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">lock</i>
                                    <input type="password" name="password" id="input-pass" class="validate">
                                    <label for="input-pass">Senha</label>
                                    <span class="helper-text" data-error="Ops! Esta senha está errada"></span>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light col s4 offset-s4" onclick="formhash(this.form, this.form.password);" type="submit" name="action">
                                Entrar 
                            </button>
                        </form>
                    </div>
                </div>   
                            
                <div class="card-action">
                    <a href="#">Esqueci minha senha</a>
                    <a href="register.html" class="right">Criar uma conta</a>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>