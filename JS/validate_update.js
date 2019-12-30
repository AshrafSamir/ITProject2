
function display() {
    var error = document.getElementById("error");
    var error1 = document.getElementById("error1");
    var error2 = document.getElementById("error2");
    var pass1 = document.getElementById('username').value;
    var pass2 = document.getElementById('email').value;
    var pass3 = document.getElementById('password_1').value;


    var form = document.forms.logg,
    elem = form.elements;


    if (pass1 == "") {
        elem.username.focus();
        error.className = "errorHappen";
        error1.className = "noErrorHappen";
        error2.className = "noErrorHappen";

        return false;
    }
    if(pass2 == "")
    {

        elem.email.focus();
        error.className = "noErrorHappen";
        error1.className = "errorHappen";
        error2.className = "noErrorHappen";

        return false;
    }
    if(pass3 == "")
    {
        elem.password_1.focus();
        error.className = "noErrorHappen";
        error1.className = "noErrorHappen";
        error2.className = "errorHappen";
        return false;

    }
}