calendar();
let password = document.getElementsByName('password');

console.log(password);

function gen_password(len){
    var password = "";
    var symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!№;%:?*()_+=";
    for (var i = 0; i < len; i++){
        password += symbols.charAt(Math.floor(Math.random() * symbols.length));
    }
    return password;
}

function set_password(elements){
    elements.forEach(
        el => el.value = gen_password(10)
    );
}

window.onclick = function (ev) {
    if (ev.target.id == 'get_pass'){
        set_password(password);
    }
}


function calendar(){
    var now = new Date();
    var startMonth = new Date(now.getFullYear(), now.getMonth(), 1)
    let days = ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];
    console.log(days[startMonth.getDay()]);
    console.log(now);
    console.log(startMonth.);
}
