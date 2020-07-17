<!DOCTYPE html>
<html lang="pt-br">
<?php
    if(isset($_GET['error'])) { 
    echo 'Erro ao Logar!';
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style2.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="template.css">

    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
</head>
<body class="body-login">

    <div class="row valign-wrapper">
        <div class="col s12 m5 offset-m3">
            <div class="card login-card z-depth-3">
                <div class="card-content">
                    <span class="card-title"><b>Entrar</b></span>
                    <div class="divider"></div>
                    <form action="/models/process_login.php" method="post" name="login_form">
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="email" name="email" id="input-login" class="validate">
                                    <label for="input-login" >E-mail</label>
                                    <span class="helper-text" data-error="Ops! Preencha um e-mail válido"></span>
                                </div>
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">lock</i>
                                    <input type="password" name="password" id="input-pass" class="validate">
                                    <label for="input-pass">Senha</label>
                                    <span class="helper-text" data-error="Ops! Esta senha está errada"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light col s4 offset-s4" onclick="formhash(this.form, this.form.password);" type="submit" name="action">
                                Entrar 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="#">Esqueci minha senha</a>
                    <a href="register.html" class="right">Criar uma conta</a>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
    <!--<script src="funcs2.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>