
function getExt(filename) {
    var dot_pos = filename.lastIndexOf(".");
    if (dot_pos == -1) {
        return "";
    }
    return filename.substr(dot_pos + 1).toLowerCase();
}
function display() {
    var error = document.getElementById("error");
    var error1 = document.getElementById("error1");
    var error2 = document.getElementById("error2");
    var error3 = document.getElementById("error3");
    var pass1 = document.getElementById('image').value;
    var pass2 = document.getElementById('game_name').value;
    var pass3 = document.getElementById('game_date').value;
    var pass4 = document.getElementById('game_desc').value;

    var form = document.forms.logg,
    elem = form.elements;

    var ext = getExt(pass1);

    

    if(pass2 == "")
    {

        elem.game_name.focus();
        error.className = "errorHappen";
        error1.className = "noErrorHappen";
        error3.className = "noErrorHappen";
        error2.className = "noErrorHappen";
        return false;
    }

    if (!((ext == "gif") || (ext == "jpg") || (ext == "jpeg") || (ext == "png"))) {
        elem.image.focus();
        error1.className = "errorHappen";
        error2.className = "noErrorHappen";
        error3.className = "noErrorHappen";
        error.className = "noErrorHappen";
        return false;
    }
    if(pass3 == "")
    {
        elem.game_date.focus();
        error2.className = "errorHappen";
        error1.className = "noErrorHappen";
        error3.className = "noErrorHappen";
        error.className = "noErrorHappen";
        return false;

    }
    if(pass4 == "" || pass4.empty())
    {
        elem.game_desc.focus();
        error3.className = "errorHappen";
        error1.className = "noErrorHappen";
        error2.className = "noErrorHappen";
        error.className = "noErrorHappen";

        return false;
    }
}