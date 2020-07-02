$(document).ready(function(){
    $('.tabs').tabs();
    $('select').formSelect();
    $('.tooltipped').tooltip();

    //Populating and choosing atual month selection
    let currentMonth = (new Date).getMonth();
    let monthSelection = $('#month_select');

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

    // setup listener for custom event to re-initialize on change
    monthSelection.on('contentChanged', function() {
        $(this).formSelect();
    });

    for(var i in months){
        var $newMonth = $("<option>").attr("value",i).text(months[i]);
        if(months[i] == months[currentMonth]) {$newMonth.attr("selected",true)};
        monthSelection.append($newMonth);
    }

    monthSelection.trigger('contentChanged');
    //End Month selection


    //Populating and choosing atual year selection
    let yearSelection = $('#year_select');
    let currentYear = (new Date).getFullYear();
    let years = [currentYear -2, currentYear -1, currentYear, currentYear +1, currentYear +2];
    
    // setup listener for custom event to re-initialize on change
    $('#year_select').on('contentChanged', function() {
        $(this).formSelect();
    });

    $.each(years , function (index, value){  
        var $newOpt = $("<option>").attr("value",value).text(value);
        if(value == currentYear){ $newOpt.attr("selected",true)}
        yearSelection.append($newOpt);
    });
    yearSelection.trigger('contentChanged');
    //End year selection

    var instMonth = M.FormSelect.getInstance(monthSelection);
    var instYear = M.FormSelect.getInstance(yearSelection);
    change(instMonth.getSelectedValues(),instYear.getSelectedValues());

    monthSelection.on('change', function(){
        let val_month = instMonth.getSelectedValues();
        let val_year = instYear.getSelectedValues();
        change(val_month,val_year);
    });

    yearSelection.on('change', function(){
        let val_month = instMonth.getSelectedValues();
        let val_year = instYear.getSelectedValues();
        change(val_month,val_year);
    });

    /*
    let a = $('.year_select div ul').children()
    for(i of a){
        console.log(i)
    }
    */ 


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

});

function change(month, year){
    console.log(month,year);
}