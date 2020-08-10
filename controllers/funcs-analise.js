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

    function get_datas(){

        let month = new Date().getMonth();
        let year = new Date().getFullYear();

        if(month < 10){
            month = '0' + month;
        }

        let data = {
            'month' : month,
            'year' : year,
            'user' : id_user
        };

        $.ajax({
            url: './models/data-for-charts.php',
            type: "POST",
            data: {'data': data},
            cache: false,
            async: true,
            success: function(response) {
                console.log(response);
                
            }
        });
    }
})

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