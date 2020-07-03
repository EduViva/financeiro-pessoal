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
                <div class="container-header z-depth-1">
                    Escolha uma data
                </div>
            </div>

            <div class="row">
                <div class="container-body col s12 z-depth-1">

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
            <div class="row row-main">
                
                <!--Container dos lançamentos-->
                <div class="container-main container-lancamentos col s12 l8 ">
                    <ul class="collapsible expandable collapse1">    
                        <li class="collapsible-list">
                            
                            <div class="container-header collapsible-header z-depth-1">
                                Lançamentos
                                <i class="material-icons chevron-header">expand_more</i>
                            </div>

                            <!--Body lançamentos-->
                            <div class="container-body collapsible-body z-depth-1">
                                
                                <div class="row" id="row_inputs">
                                    <div class="col s12">
                                        <div class="input-field col s5 m3">
                                            <input type="date" id="input-date">
                                            <label for="input-date">Data</label>
                                        </div>
                                        <div class="input-field col s6 m3" id="field-categoria">
                                            <select id="input-cat">
                                                <option value="" disabled selected>Escolha uma</option>
                                                <option value="renda">Renda</option>
                                                <option value="essenciais">Gastos Essenciais</option>
                                                <option value="nao_essenciais">Gastos não Essenciais</option>
                                                <option value="torrar">Torrar</option>
                                                <option value="investimento">Investimento</option>
                                                <option value="caixa">Caixa</option>
                                            </select>
                                            <label for="input-cat">Categoria</label>
                                        </div>
                                        <div class="input-field col s5 m3">
                                            <input type="text" id="input-desc" maxlength="50">
                                            <label for="input-desc">Descrição</label>
                                        </div>
                                        <div class="input-field col s5 m2">
                                            <input type="text" id="input-val">
                                            <label for="input-val">Valor</label>
                                        </div>
                                        <div class="input-field col s1 m1" title="Adicionar">
                                            <a id="save" style="cursor:pointer"><i class="material-icons" id="add">add_circle</i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="lancamentos section">

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

                        </li>
                    </ul>
                </div>

                <!--Container das Movimentações-->
                <div class="container-main container-movimentacoes col s12 l3 offset-l1">
                    <ul class="collapsible expandable collapse2">
                        <li class="collapsible-list">

                            <div class="container-header collapsible-header z-depth-1">
                                Movimentações
                                <i class="material-icons chevron-header">expand_more</i>
                            </div>

                            <!--Body movimentações-->
                            <div class="container-body collapsible-body z-depth-1">
                                
                            <ul class="collection collection-movs">
                                <li class="collection-item">
                                    <h6 class="green-text text-darken-1">Renda</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="Seus Rendimentos">help</i>
                                    <span class="right" id="mov_renda"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Gastos essenciais</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>precisa</b> gastar <br> 40% da renda">help</i>
                                    <span class="right" id="mov_gEssenc"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Gastos não essenciais</h6>  
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>não precisa</b> gastar <br> 10% da renda">help</i>
                                    <span class="right" id="mov_gnEssenc"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Torrar</h6>  
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>pode</b> gastar <br> 10% da renda">help</i>
                                    <span class="right" id="mov_torrar"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Investimento</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você deve investir para o futuro <br> 30% da renda">help</i>
                                    <span class="right" id="mov_invest"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Caixa</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você deve guardar <br> 10% da renda">help</i>
                                    <span class="right" id="mov_caixa"></span>
                                </li>
                                
                                </ul>

                            </div>

                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </main>

    <script>
        $('#input-val').mask('000.000.000.000.000,00', {reverse: true});
    </script>
</body>