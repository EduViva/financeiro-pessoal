function formhash(form, password) {
    // Cria um novo elemento de entrada, como um campo de entrada de senha sem hash.
    var p = document.createElement("input");
    // Adiciona o novo elemento ao nosso formulário.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden"
    p.value = hex_sha512(password.value);
    // Certifica que senhas em texto plano não sejam enviadas.
    password.value = "";
    // Finalmente, submete o formulário.
    form.submit();
}
function toastIt(text,classes){

    let finalClass = {
        'error' : 'toast_danger',
        'success' : 'toast_success',
        'warning' : 'toast_warning'
    }

    return M.toast({html: text, classes: finalClass[classes]});
}