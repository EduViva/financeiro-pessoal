<?php 

    include "template.html";
    //include "controllers/dbAccess.php";

    date_default_timezone_set('America/Sao_Paulo');
    $atualDate = date('d/m/Y');
    $atualAno = date('Y');

?>

<head>
    <title>Lançar</title>

    <link rel="stylesheet" href="style2.css">
    <script src="funcs2.js"></script>

</head>

<body>

    <main>

        <div class="container-fluid container-date">

            <div class="row">
                <div class="container-header">
                    Escolha uma data
                </div>
            </div>

            <div class="row">
                <div class="container-body col s12">

                    <!--
                    <div class="ls-tabs-btn col-md-10 col-md-offset-1 visible-md-block" id="tabs">
                        <ul class="ls-tabs-btn-nav">
                            <li class="col-md-1 col-sm-4 col-xs-4 ls-active"><label class="ls-btn" data-ls-module="button" data-target="#jan" onclick="getData('01')">Jan <input type="radio" id='1' name="btn" value="01"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#fev" onclick="getData('02')">Fev <input type="radio" name="btn" value="02"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#mar" onclick="getData('03')">Mar <input type="radio" name="btn" value="03"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#abr" onclick="getData('04')">Abr <input type="radio" name="btn" value="04"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#mai" onclick="getData('05')">Mai <input type="radio" name="btn" value="05"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#jun" onclick="getData('06')">Jun <input type="radio" name="btn" value="06"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#jul" onclick="getData('07')">Jul <input type="radio" name="btn" value="07"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#ago" onclick="getData('08')">Ago <input type="radio" name="btn" value="08"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#set" onclick="getData('09')">Set <input type="radio" name="btn" value="09"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#out" onclick="getData('10')">Out <input type="radio" name="btn" value="10"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#nov" onclick="getData('11')">Nov <input type="radio" name="btn" value="11"></label></li>
                            <li class="col-md-1 col-sm-4 col-xs-4"><label class="ls-btn" data-ls-module="button" data-target="#dez" onclick="getData('12')">Dez <input type="radio" name="btn" value="12"></label></li>        
                        </ul>
                    </div>
                    -->
                    <!--Escolha dos meses desktop
                    <div class="col s12">
                        <ul class="tabs">
                            <li id="tab-jan" class="tab col s1"><a href="#test1">Jan</a></li>
                            <li class="tab col s1"><a href="#test2">Fev</a></li>
                            <li id="tab-mar" class="tab col s1"><a href="#test1">Mar</a></li>
                            <li class="tab col s1"><a href="#test1">Abr</a></li>
                            <li class="tab col s1"><a href="#test1">Mai</a></li>
                            <li class="tab col s1"><a href="#test1">Jun</a></li>
                            <li class="tab col s1"><a href="#test1">Jul</a></li>
                            <li class="tab col s1"><a href="#test1">Ago</a></li>
                            <li class="tab col s1"><a href="#test1">Set</a></li>
                            <li class="tab col s1"><a href="#test1">Out</a></li>
                            <li class="tab col s1"><a href="#test1">Nov</a></li>
                            <li class="tab col s1"><a href="#test1">Dez</a></li>
                        </ul>
                    </div>       
                    <!--Fim escolha dos meses-->

                    <!--Escolha dos meses mobile-->
                    
                    <div class="input-field col s8">
                        <select>
                            <option value="" disabled selected>Escolha um mês</option>
                            <option value="1">Janeiro</option>
                            <option value="1">Fevereiro</option>
                            <option value="1">Março</option>
                            <option value="1">Abril</option>
                            <option value="1">Maio</option>
                            <option value="1">Junho</option>
                            <option value="1">Julho</option>
                            <option value="1">Agosto</option>
                            <option value="1">Setembro</option>
                            <option value="1">Outubro</option>
                            <option value="1">Novembro</option>
                            <option value="1">Dezembro</option>
                        </select>
                        <label>Mês</label>
                    </div>

                    <div class="input-field col s4">
                        <select>
                            <option value="" disabled selected>Escolha um ano</option>
                            <option value="1">2020</option>
                            <option value="1">2021</option>
                            <option value="1">2022</option>
                            <option value="1">2023</option>
                            <option value="1">2024</option>
                        </select>
                        <label>Ano</label>
                    </div>
                    
                    <!--Fim Escolha dos meses-->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row row-main">
                    
                <div class="container-main container-lancamentos col s12 m7">
                    <div class="container-header">
                        Lançamentos
                    </div>

                    <!--Body lançamentos-->
                    <div class="container-body">
                        addslashes
                    </div>
                </div>

                <div class="container-main container-movimentacoes col s12 m4 offset-m1">

                    <div class="container-header">
                        Movimentações
                    </div>

                    <!--Body movimentações-->
                    <div class="container-body">
                        asdasdasd  
                    </div>
                    
                </div>

            </div>
        </div>
    </main>
</body>