function gen_password(len){
    var password = "";
    var symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!№;%:?*()_+=";
    for (var i = 0; i < len; i++){
        password += symbols.charAt(Math.floor(Math.random() * symbols.length));
    }
    return password;
}

function set_password(elements){
    console.log(elements);
    Object.values(elements).forEach(el => el.value = gen_password(10));
}

window.onclick = function (ev) {
    if (ev.target.id == 'get_pass'){
        let password = document.getElementsByClassName('password form-control');
        set_password(password);
    }
}
