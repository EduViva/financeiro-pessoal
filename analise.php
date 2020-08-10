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
    <script src="./controllers/funcs-analise.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 3],
                ['Onions', 1],
                ['Olives', 1],
                ['Zucchini', 1],
                ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                            'width':400,
                            'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('card-panel'));
            chart.draw(data, options);
        }
    </script>

</head>
<script>
    setId(<?php echo $_SESSION['user_id'] ?>);
    setUserName("<?php echo $_SESSION['username'] ?>");
</script>
<body>
    
    <main>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m5">
                    <div class="card-panel teal white-text" id="card-panel">
                        
                    </div>
                </div>
            </div>
        </div>
        
          

    </main>

</body>