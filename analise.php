<?php 

    include "./models/login/db_login_access.php";
    include "./models/login/functions.php";

    sec_session_start();
    
    //Checa se o client está logado, se não estiver volta pra tela de login
    if(login_check($db_secure) != true) {
        header('location: ./login2.php?errorAccess=1');
    }

    include "template.html";

?>
<head>
    <title>Analisar</title>

    <link rel="stylesheet" href="style2.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="./controllers/funcs-analise.js"></script>

</head>
<script>
    setId(<?php echo $_SESSION['user_id'] ?>);
    setUserName("<?php echo $_SESSION['username'] ?>");
</script>
<body>
    
    <main>

        <div class="container-fluid container-date">

            <div class="row">
                <div class="container-header z-depth-1">
                    Escolha uma data
                </div>
            </div>

            <!--Container escolha dos meses-->
            <div class="row">
                <div class="container-body col s12 z-depth-1">

                    <!--Escolha dos meses-->
                    <div class="input-field month_field col s8">
                        <select id="month_select">
                            <option value="" disabled selected>Escolha um mês</option>
                        </select>
                        <label>Mês</label>
                    </div>

                    <div class="input-field year_field col s4">
                        <select id="year_select">
                            <option value="" disabled selected>Escolha um ano</option>
                        </select>
                        <label>Ano</label>
                    </div>
                    <!--Fim Escolha dos meses-->

                </div>
            </div>
            
        </div>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m5">
                    <div class="card-panel teal white-text" id="card-panel">
                        <div class="empty_lancs center-align">
                                        
                            <div class="row">
                                <i class="material-icons large">assistant_photo</i>
                            </div>
                            <div class="row">
                                <h5><b>Ainda não há lançamentos neste período!</b></h5>
                                <h6>É hora de lançar suas movimentações</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </main>

</body>