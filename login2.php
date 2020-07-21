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
    include_once 'models/process_login.php';

    if(isset($_GET['register'])){ 
        $registred = $_GET['register'];
   
        if($registred == 1){
            echo '<script> toastIt("Usuário cadastrado!","success") </script>';
        } else {
            echo `<script> toastIt('Ops! O usuário não foi cadastrado!','error') </script>`;
        }
    }/*
    if(isset($_GET['errorLogin'])){ 
        $erro = $_GET['errorLogin'];
        echo '<script> toastIt("Ops! Você não conseguiu logar","error") </script>';
    }*/
    if(isset($GLOBALS['error'])){
        echo '<script> toastIt("Usuário inválido","error") </script>';
    }
    if(isset($_GET['errorAccess'])){ 
        echo '<script> toastIt("Ops! Faça login para continuar","error") </script>';
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
                    <form onsubmit="formSubmit(event)" name="login_form">
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="email" name="email" id="input-usuario" class="validate">
                                    <label for="input-usuario">E-mail</label>
                                    <span class="helper-text" id="helper-usuario" data-error="Ops! Este usuário não existe"></span>
                                </div>
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">lock</i>
                                    <input type="password" name="password" id="input-senha" class="validate">
                                    <label for="input-senha">Senha</label>
                                    <span class="helper-text" id="helper-senha" data-error="Ops! Esta senha está errada"></span>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light col s4 offset-s4"  type="submit" name="action">
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