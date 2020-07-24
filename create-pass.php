<?php
    
    include "./models/login/db_login_access.php";

    echo '<script type="text/javascript" src="./controllers/forms.js"></script>';
    echo '<link rel="stylesheet" href="template.css">';

    $key = isset($_GET['key'])?$_GET['key']:null;
    $email = isset($_GET['user'])?$_GET['user']:null;

    if($key && $email){
        $sql = ("SELECT COUNT(*) FROM forget_password WHERE email='" . $email . "' AND chave='" . $key . "'");
        $return = $db_secure->query($sql);
        
        if($return){
            while ($row = $return->fetch_assoc()) {
                $counter = $row['COUNT(*)'];
            }
        }

        if($counter > 0){
            echo '<script> window.onload = function(){ 
                setMail("'.$email.'");
                setKey("'.$key.'");
            }
            </script>';
        } else {
            echo '<script> window.onload = function(){ 
                toastIt("Ops! Credenciais inválidas","error");
                setTimeout(function(){ window.location.href = "./login2.php"; }, 2500); 
            }
            </script>';
        }
            
        
    } else {
        echo '<script> window.onload = function(){ 
            toastIt("Ops! Credenciais inválidas","error");
            setTimeout(function(){ window.location.href = "./login2.php"; }, 2500); 
        }
        </script>';
    }
    
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redefinir Senha</title>

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
                        Redefinir senha
                    </div>
                    
                    <div class="container-body login-body">
                        <form onsubmit="passSubmit(event)" id="pass-form" name="login_form">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field col s12 m10 offset-m1">
                                        <i class="material-icons prefix">email</i>
                                        <input type="email" readonly disabled name="email" id="input-usuario" class="validate">
                                        <label for="input-usuario">E-mail</label>
                                        <span class="helper-text"></span>
                                    </div>
                                    <div class="input-field col s12 m10 offset-m1">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" name="password" id="input-senha" class="validate">
                                        <label for="input-senha">Senha</label>
                                        <span class="helper-text helper-senha" data-error=""></span>
                                    </div>
                                    <div class="input-field col s12 m10 offset-m1">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" name="password" id="confirm-senha" class="validate">
                                        <label for="confirm-senha">Confirme sua senha</label>
                                        <span class="helper-text helper-senha"></span>
                                    </div>
                                </div>

                                <button class="btn waves-effect waves-light col s4 offset-s4"  type="submit" name="action">
                                    Redefinir senha 
                                </button>
                            </div>
                        </form>
                    </div>   
                                
                    <div class="card-action">
                        <a href="login2.php">Fazer login</a>
                        <a href="register.html" class="right">Criar uma conta</a>
                    </div>
                </div>
                
            </div>
        </div>

    </body>
</html>