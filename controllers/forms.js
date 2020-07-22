function loginSubmit(e){
    e.preventDefault();

    //Remove a marca de inválido quando começa a digitar no campo
    let inputs = document.querySelectorAll('input');
    inputs.forEach(el => {
        el.addEventListener('input', () => {
            el.classList.remove('invalid');
        })
    });
    
    let mail = e.target[0].value;
    let pass = e.target[1].value;

    pass = hex_sha512(pass);

    let data = {
        'email' : mail,
        'password' : pass
    }

    $.ajax({
		url: './models/login/process_login.php',
		type: "POST",
		data: {'data': data},
		cache: false,
		async: true,
        success: function(response) {
            console.log(response);
            switch (response) {
                case 'success':
                    window.location.href = './lancar2.php';
                break;
                case 'usuario':case 'senha':
                    document.getElementById('input-'+response).classList = "invalid";
                break;
                case 'blocked':
                    toastIt("Sua senha foi bloqueada!","error");
                break;
                default:
                    toastIt("Ops! Algo inesperado aconteceu","error");
                break;
            }
        }
    });

}
function registerSubmit(e){
    e.preventDefault();

    
    let name = e.target[0].value;
    let mail = e.target[1].value;
    let pass = e.target[2].value;

    pass = hex_sha512(pass);

    let data = {
        'name' : name,
        'email' : mail,
        'password' : pass
    }

    $.ajax({
		url: './models/login/register.php',
		type: "POST",
		data: {'data': data},
		cache: false,
		async: true,
        success: function(response) {
            response = JSON.parse(response);

            if(response['mail']){
                if(response['exist'] == true){
                    window.location.href = '../login2.php?mail='+response['mail'];
                } else if(response['exist'] == false){
                    window.location.href = '../login2.php?registred=true&mail='+response['mail'];
                }
            }
            
            if(response['error']){
                toastIt('Ops! Algo inesperado aconteceu','error');
            }
        }
    });
}
function toastIt(text,classes){

    let finalClass = {
        'error' : 'toast_danger',
        'success' : 'toast_success',
        'warning' : 'toast_warning'
    }

   
    return M.toast({html: text, classes: finalClass[classes]});
    
}
function setMail(mail){
    
    let field_mail = document.getElementById('input-usuario');
    field_mail.value = mail;
    field_mail.classList = 'valid';
    M.updateTextFields();
    
}