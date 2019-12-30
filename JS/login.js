function display() {
    var error = document.getElementById("error");
    var error1 = document.getElementById("error1");
    var pass1 = document.getElementById('username').value;
    var pass2 = document.getElementById('password').value;


    var form = document.forms.logg,
    elem = form.elements;

    var ext = getExt(pass1);

    

    if(pass1 == "")
    {

        elem.game_name.focus();
        error.className = "errorHappen";
        error1.className = "noErrorHappen";
        return false;
    }
    if(pass2 == "")
    {
        elem.game_date.focus();
        error1.className = "errorHappen";
        error.className = "noErrorHappen";
        return false;

    }

}