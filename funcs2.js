const id_user = 1;

$(document).ready(function(){
    $('.tabs').tabs();
    $('select').formSelect();
    $('.tooltipped').tooltip();

    let monthSelection = $('#month_select');
    let yearSelection = $('#year_select');

    populate(monthSelection,yearSelection);
    
    //Month selection
    // setup listener for custom event to re-initialize on change
    $('#month_select').on('contentChanged', function() {
        $(this).formSelect();
    });
    monthSelection.trigger('contentChanged');
    //End Month selection

    //Year selection
    // setup listener for custom event to re-initialize on change
    $('#year_select').on('contentChanged', function() {
        $(this).formSelect();
    });
    yearSelection.trigger('contentChanged');
    //End year selection

    //getting date values on initialize
    change($('.month_field input').val(),$('.year_field input').val());

    monthSelection.on('change', function(){
        let val_month = $('.month_field input').val();
        let val_year = $('.year_field input').val();
        
        change(val_month,val_year);
    });

    yearSelection.on('change', function(){
        let val_month = $('.month_field input').val();
        let val_year = $('.year_field input').val();

        change(val_month,val_year);
    });


    //initializing and openning acordeons
    var elem1 = document.querySelector('.collapsible.expandable');
    var inst_col1 = M.Collapsible.init(elem1, {
        accordion: false
    });

    var elem2 = document.querySelector('.collapsible.expandable.collapse2');
    var inst_col2 = M.Collapsible.init(elem2, {
        accordion: false
    });

    //Mobile e Tablet
    if($(window).width() < 992){
        inst_col2.open(0);
        $('.collapse2 .chevron-header').html('expand_less');

        $('.collapsible').on('click', (e) => {  
            if(e.currentTarget.children[0].classList[1] == 'active'){
                $(e.currentTarget.children[0].children[0].children[0]).html('expand_less');
            } else {
                $(e.currentTarget.children[0].children[0].children[0]).html('expand_more');
            }
        })
    }

    //Desktop
    if($(window).width() > 992){
        inst_col1.open(0);
        inst_col2.open(0);
    }

    $('#save').on('click', save);
    
    
});

function change(month, year){
    get_datas(month, year, id_user);
}

function populate(monthSelection,yearSelection){

    //Populating and choosing atual month selection

    let currentMonth = (new Date).getMonth();
    
    let months = {
        0 : "Janeiro",
        1 : "Fevereiro",
        2 : "Março",
        3 : "Abril",
        4 : "Maio",
        5 : "Junho",
        6 : "Julho",
        7 : "Agosto",
        8 : "Setembro",
        9 : "Outubro",
        10 : "Novembro",
        11 : "Dezembro"
    }

    for(var i in months){
        var $newMonth = $("<option>").attr("value",i).text(months[i]);
        if(months[i] == months[currentMonth]) {$newMonth.attr("selected",true)};
        monthSelection.append($newMonth);
    }

    //Populating and choosing atual year selection
    let currentYear = (new Date).getFullYear();
    let years = [currentYear -2, currentYear -1, currentYear, currentYear +1, currentYear +2];

    $.each(years , function (index, value){  
        var $newOpt = $("<option>").attr("value",value).text(value);
        if(value == currentYear){ $newOpt.attr("selected",true)}
        yearSelection.append($newOpt);
    });

}

function get_datas(month, year, user){

    month = monthFormat(month)

    let data = {
        'month' : month,
        'year' : year,
        'user' : user
    }

    $.ajax({
		url: 'models/get_datas.php',
		type: "POST",
		data: {'data': data},
		cache: false,
		async: true,
        success: function(response) {

            $('.results-lancs').empty();
            $('.empty_lancs').show();
            $('.mov_value').text('R$ 0,00');

            if(response){
                //Chamar função de mostrar na tela
                if(response != 'noReturn'){
                    $('.empty_lancs').hide();

                    console.log(response);
                    response = JSON.parse(response);
                    console.log('----');
                    console.log(response);

                    let calculado = calculate(response.movimentacoes);
                    show(response.lancamentos, calculado);
                }
            } else {
                M.toast({html: 'Ops! Algo inesperado aconteceu', classes: 'toast_danger'});
            }

        }
    });
}

function show(lancs, movs){
    
    for(var key in lancs){
        if(key != 0){

            let nodes = $('.results-lancs').children().length;

            let pai = $('.results-lancs');

            let div = $(document.createElement('div'));
            
            let date = $(document.createElement('div')); 
            let cat = $(document.createElement('div')); 
            let desc = $(document.createElement('div')); 
            let val = $(document.createElement('div'));
            let divDel = $(document.createElement('div'));
            let action = $(document.createElement('a'));
            let icon = $(document.createElement('i'));

            div.addClass('lanc-'+nodes);
            div.addClass('lancamentos-item');
            date.addClass('col s5 m3');
            cat.addClass('col s6 m3');
            desc.addClass('col s5 m3 truncate tooltipped');
            val.addClass('col s5 m2');
            divDel.addClass('col s1 m1 delete-lancs');
            action.addClass(`del-${lancs[key].id}`);
            icon.addClass('material-icons');

            desc.attr({
                'data-position':'right',
                'data-tooltip' : lancs[key].descricao
            });

            action.attr({
                'title' : 'Excluir',
                'onclick' : 'excluir(this)'
            });

            let formatedDate = lancs[key].dia + "/" + lancs[key].mes + "/" + lancs[key].ano;
            
            date.append(formatedDate);
            cat.append(lancs[key].categoria);
            desc.append(lancs[key].descricao);
            val.append(stringfy(lancs[key].valor));
            action.append(icon.append('delete'));

            divDel.append(action);

            div.append(date);
            div.append(cat);
            div.append(desc);
            div.append(val);
            div.append(divDel);

            pai.append(div);

            var elems = document.querySelectorAll('.tooltipped');
            M.Tooltip.init(elems, {'enterDelay' : 720});

        };
    };
    
    if(movs){

        $('#mov_renda').text(stringfy(movs['renda']));
        $('#mov_gEssenc').text(stringfy(movs['essenciais']));
        $('#mov_gnEssenc').text(stringfy(movs['n_essenciais']));
        $('#mov_torrar').text(stringfy(movs['torrar']));
        $('#mov_invest').text(stringfy(movs['investimentos']));
        $('#mov_caixa').text(stringfy(movs['caixa']));
    

    }

}

function save(){
    let date = $('#input-date').val();
    let categoria = $('#field-categoria input').val();
    let descricao = $('#input-desc').val();
    let valor = $('#input-val').val();

    if(date == "" || descricao == "" || valor == "" || categoria == "Escolha uma"){

        M.toast({html: 'Preencha os campos antes de salvar', classes: 'toast_warning'});

    } else {

        date = date.split('-').reverse();

        let saveMov = saveFormat(categoria,valor);

        let data = {
            'dia' : date[0],
            'mes' : date[1],
            'ano' : date[2],
            'categoria' : categoria,
            'descricao' : descricao,
            'valor' : valor,
            'save_cat' : saveMov['categoria'],
            'save_val' : saveMov['valor'],
            'id_user' : id_user
        }

        console.log(data);

        let selected_month = monthFormat($('.month_field input').val());
        let selected_year = $('.year_field input').val();

        console.log(date[1]+"/"+date[2]);
        console.log(selected_month + "/" + selected_year);

        $.ajax({
            url: 'models/salvar_lancs.php',
            type: "POST",
            data: {'data': data},
            cache: false,
            async: true,
            success: function(response) {
                console.log(response);
                if(response){
                    M.toast({html: 'Tá Lançado meu querido!', classes: 'toast_success'});

                    if(date[1] == selected_month && date[2] == selected_year){

                        $('.empty_lancs').hide()
                        response = JSON.parse(response);

                        let lancamento = {};
                        lancamento['first'] = {
                            'id' : response['id_lanc'],
                            'dia' : date[0],
                            'mes' : date[1],
                            'ano' : date[2],
                            'categoria' : categoria,
                            'descricao' : descricao,
                            'valor' : saveMov['valor']
                        };

                        let calculado = calculate(response);
                        show(lancamento,calculado);
                    }

                    $('#input-val').val('');
                    $('#input-desc').val('');
                    M.updateTextFields();

                } else {
                    M.toast({html: 'Ops! Não consegui salvar', classes: 'toast_danger'});
                }
            }
        });
    }
}

function calculate(objeto){

    let movs = {};

    movs['renda'] = Number(objeto['renda']);
    movs['essenciais'] = (objeto['renda'] * 40 / 100) - objeto['essenciais'];
    movs['n_essenciais'] = (objeto['renda'] * 10 / 100) - objeto['n_essenciais'];
    movs['torrar'] = (objeto['renda'] * 10 / 100) - objeto['torrar'];
    movs['investimentos'] = (objeto['renda'] * 30 / 100) - objeto['investimentos'];
    movs['caixa'] = (objeto['renda'] * 10 / 100) - objeto['caixa'];

    return movs;

}

function excluir(obj){

    if(confirm("Você deseja realmente excluir este item?")){

        let val_month = $('.month_field input').val();
        let val_year = $('.year_field input').val();

        let id = obj.classList[0].split('-')[1];

        obj = $(`.del-${id}`).parent().parent()[0].children;

        let cat = obj[1].textContent;
        let val = obj[3].textContent.split("$")[1];


        val_month = monthFormat(val_month);
        let formated = saveFormat(cat,val);

        let data = {
            'id' : id,
            'categoria' : formated['categoria'],
            'valor' : formated['valor'],
            'mes' : val_month,
            'ano' : val_year,
            'user' : id_user
        }


        $.ajax({
            url: 'models/excluir_lancs.php',
            type: "POST",
            data: {'data': data},
            cache: false,
            async: true,
            success: function(response) {

                if(response){
                    M.toast({html: 'Excluido com sucesso!', classes: 'toast_success'}); 

                    $(`.del-${id}`).parent().parent()[0].remove();

                    if(!$('.results-lancs')[0].hasChildNodes()){
                        $('.empty_lancs').show();
                    }
                    response = JSON.parse(response);

                    let calculado = calculate(response);
                    show({0:'linkedin.com/in/edu-viva'},calculado);
                    
                } else {
                    M.toast({html: 'Ops! Não consegui excluir', classes: 'toast_danger'});
                }
            }
        });

    }

}


//Formaters
function stringfy(val){
    return Number(val).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
}

function monthFormat(val){
    let months = {
        "Janeiro" : "01",
        "Fevereiro" : "02",
        "Março" : "03",
        "Abril" : "04",
        "Maio" : "05",
        "Junho" : "06",
        "Julho" : "07",
        "Agosto" : "08",
        "Setembro" : "09",
        "Outubro" : "10",
        "Novembro" : "11",
        "Dezembro" : "12"
    }

    return months[val];
}

function categoriaFormat(val){

    let values = {
        'Renda' : 'renda',
        'Gastos Essenciais' : 'essenciais',
        'Gastos não Essenciais' : 'n_essenciais',
        'Torrar' : 'torrar',
        'Investimento' : 'investimentos',
        'Caixa' : 'caixa',
    }

    return values[val];

}

function saveFormat(categoria, valor){

    categoria = categoriaFormat(categoria);

    valor = valor.split(".").join("").replace(",",".");
    valor = Number(valor); 

    let saida = {
        'categoria' : categoria,
        'valor' : valor
    };

    return saida;

}