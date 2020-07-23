<?php
    $setMail = isset($_GET['mail'])?$_GET['mail']:null;
    echo '<script type="text/javascript" src="./controllers/forms.js"></script>';
    echo '<link rel="stylesheet" href="template.css">';

    if(isset($_GET['registred'])){ 
        echo '<script> window.onload = function(){ 
                toastIt("Usuário cadastrado!","success");
                setMail("'.$setMail.'");}
            </script>';
    } else {
        if(isset($_GET['mail'])){ 
            echo '<script> window.onload = function(){ 
                    toastIt("Este e-mail já está cadastrado","warning");
                    setMail("'.$setMail.'");}
                </script>';
        }
    }
    
    if(isset($_GET['errorAccess'])){ 
        echo '<script> window.onload = function(){ 
                toastIt("Ops! Faça login para continuar","error") }
            </script>';
    }
?>

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
    <script type="text/javascript" src="./controllers/sha512.js"></script>
</head>

<body class="body-login2">
    <div class="container">
        <div class="row valign-wrapper">
            
            <div class="container-main col m6 offset-m3">

                <div class="container-header">
                    Entrar
                </div>
                
                <div class="container-body login-body">
                    <form onsubmit="loginSubmit(event)" name="login_form">
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
                        </div>
                    </form>
                </div>   
                            
                <div class="card-action">
                    <a href="forget-pass.html">Esqueci minha senha</a>
                    <a href="register.html" class="right">Criar uma conta</a>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>