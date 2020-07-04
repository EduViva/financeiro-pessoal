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
            console.log(e);
            console.log(e.currentTarget);
            console.log(e.currentTarget.children);
            
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
    console.log(month,year);
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

function save(){
    let date = $('#input-date').val().split('-').reverse();
    let categoria = $('#field-categoria input').val();
    let descricao = $('#input-desc').val();
    let valor = $('#input-val').val();

    console.log(date); 
    console.log(categoria); 
    console.log(descricao); 
    console.log(valor); 

    data = {
        'dia' : date[0],
        'mes' : date[1],
        'ano' : date[2],
        'categoria' : categoria,
        'descricao' : descricao,
        'valor' : valor
    }

    $.ajax({
		url: 'models/salvar_lancs.php',
		type: "POST",
		data: {'data': data},
		cache: false,
		async: true,
        success: function(response) {

            if(response){
                M.toast({html: 'Tá Lançado meu querido!', classes: 'toast_success'});
            } else {
                M.toast({html: 'Ops! Não consegui salvar', classes: 'toast_danger'});
            }

            

        }
    });
}