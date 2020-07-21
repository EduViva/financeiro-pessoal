function formSubmit(e){
    e.preventDefault();

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
		url: './models/process_login.php',
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
function toastIt(text,classes){

    let finalClass = {
        'error' : 'toast_danger',
        'success' : 'toast_success',
        'warning' : 'toast_warning'
    }

    window.onload = function(){
        return M.toast({html: text, classes: finalClass[classes]});
    }
    
}






//onclick="formhash(this.form, this.form.password);"