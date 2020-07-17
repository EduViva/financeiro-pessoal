<?php 

    include "template.html";

    /*
    sec_session_start();
    if(login_check($mysqli) == true) {

    // Adicione o conteúdo de sua página protegida aqui.

    } else {
        echo 'Você não está autorizado a acessar esta página. Por favor, efetue login. <br/>';
    }
    */

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

                                    <div class="results results-lancs">
                                        
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
                                
                            <ul class="collection collection-movs with-header">
                                <li class="collection-item">
                                    <h6 class="green-text text-darken-1">Renda</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="Seus Rendimentos">help</i>
                                    <span class="right mov_value" id="mov_renda"></span>
                                </li>
                                <li class="collection-header"><h5>Gastos</h5></li>
                                <li class="collection-item">
                                    <h6>Essenciais</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>precisa</b> gastar <br> 40% da renda">help</i>
                                    <span class="right mov_value" id="mov_gEssenc"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Não essenciais</h6>  
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>não precisa</b> gastar <br> 10% da renda">help</i>
                                    <span class="right mov_value" id="mov_gnEssenc"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Torrar</h6>  
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você <b>pode</b> gastar <br> 10% da renda">help</i>
                                    <span class="right mov_value" id="mov_torrar"></span>
                                </li>
                                <li class="collection-header"><h5>Guardar</h5></li>
                                <li class="collection-item">
                                    <h6>Investimento</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você deve investir para o futuro <br> 30% da renda">help</i>
                                    <span class="right mov_value" id="mov_invest"></span>
                                </li>
                                <li class="collection-item">
                                    <h6>Caixa</h6>
                                    <i class="tiny material-icons tooltipped" data-position="top" data-tooltip="O que você deve guardar <br> 10% da renda">help</i>
                                    <span class="right mov_value" id="mov_caixa"></span>
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


CREATE USER 'sec_user'@'localhost' IDENTIFIED BY 'Th7HN87AacBtgRsM';
GRANT SELECT, INSERT, UPDATE ON `secure_login`.* TO 'sec_user'@'localhost';