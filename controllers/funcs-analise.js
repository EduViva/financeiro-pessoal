var temp_id = 0;

function setId(sec_id){
    temp_id = sec_id;
}

function getId(){
    return temp_id;
}

$(document).ready(function(){
    //Id do usuário
    const id_user = getId();


    
    //Daqui para baixo, Inicializa e popula os selects de escolha de data
    $('select').formSelect();

    //Preenche os selects com os meses e anos
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

    //Pega os dados do mês atual ao inicializar
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
            11 : "Dezembro",
            12 : "Todos"
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

    function change(month, year){
        get_datas(id_user,month, year);
    }

})

function get_datas(id_user,val_month,val_year){

    val_month = monthFormat(val_month);

    let data = {
        'month' : val_month,
        'year' : val_year,
        'user' : id_user
    };
    console.log(data);

    $.ajax({
        url: './models/get_datas.php',
        type: "POST",
        data: {'data': data},
        cache: false,
        async: true,
        success: function(response) {

            if(response){
                if(response != 'noReturn'){
                    response = JSON.parse(response);
                    console.log(response);
                    create_charts(response);
                }
            } else {
                toastIt('Ops! Algo inesperado aconteceu', 'error');
            }
            
        }
    });
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
        "Dezembro" : "12",
        "Todos" : "todos"
    }

    return months[val];
}

function categoriaFormat(val){

    let values = {
        'renda' : "Renda",
        'essenciais' : 'Essenciais',
        'n_essenciais' : 'Não Essenciais',
        'torrar' : 'Torrar',
        'investimentos' : 'Investimento',
        'caixa' : 'Caixa',
    }

    return values[val];

}

function create_charts(data){

    let movimentacoes = data.movimentacoes;
    let arrayMov = {};
    let somaArray = Array();
    //console.log(data.movimentacoes["mes-01"]);

    for(var key in movimentacoes){
        if(key != 0){    
            
            for(var categoria in movimentacoes[key]){
                if(key != 0){
                    if(arrayMov[categoria] == undefined){
                        arrayMov[categoria] = 0;
                    }
                    arrayMov[categoria] += Number(movimentacoes[key][categoria]);
                    //arrayMov.push([categoriaFormat(categoria), Number(movimentacoes[key][categoria])]);
                }
            }

        }
    }
    
    for(x in arrayMov){
        somaArray.push([categoriaFormat(x),arrayMov[x]]);
    }

    somaArray.shift();
    
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Categorias');
        data.addColumn('number','Valores');
        data.addRows(somaArray);

        // Set chart options
        var options = {'title':'Quanto você gastou este mês',
                        'width':400,
                        'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('card-panel'));
        chart.draw(data, options);
    }
}

//Logout
function logout(){
    $.ajax({
        url: './models/login/logout.php',
        type: "POST",
        cache: false,
        async: true,
        success: function(response) {
            window.location.href = "./login2.php";
        }
    });
}

//Username
function setUserName(name){
    name = name.split("-").join(" ");
    $('.userName').text(name);
}