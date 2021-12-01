//spin on click
$(document).ready(function(){
  $(".spinow").click(function(){
    $(this).html('<span class="spinner-border spinner-border-sm"></span>');
  })
});

//signUpform handler
function validateForm() {
    document.getElementById('error-msg').innerHTML = "";
    var user = document.forms["myForm"]["user"].value;
    var fName = document.forms["myForm"]["fName"].value;
    var lName = document.forms["myForm"]["lName"].value;
    var pass = document.forms["myForm"]["pass"].value;
    var passConf = document.forms["myForm"]["passConf"].value;
    //should only contain alphanumeric
    var userRegex = new RegExp("^[A-Za-z0-9$@$!%*?&]*$");
    //should contain at least one upper and one lower case and one number
    var passRegex = new RegExp("^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9$@$!%*?&]{8,20}$");

    if (user == "" || user == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>please enter your username</div>";
        $("#submit").html(' <b>submit</b> ');
        return false;
    }
    if(!userRegex.test(user)){
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>username can only contain alphanumeric</div>";
        $("#submit").html(' <b>submit</b> ');
        return false;
    }
    if (fName == "" || fName == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>please enter your first name</div>";
        $("#submit").html(' <b>submit</b> ');
        return false;
    }
    if (lName == "" || lName == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>please enter your last name</div>";
        $("#submit").html(' <b>submit</b> ');
        return false;
    }
    if (pass == "" || pass == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>please enter your password</div>";
        $("#submit").html(' <b>submit</b> ');
        return false;
    }
    if(!passRegex.test(pass)){
        document.getElementById('error-msg').innerHTML = "<div style='text-align:left' class='alert alert-warning'>password can be 8-20 charachters and should contain :<br> One letter<br> One number</div>" ;
        $("#submit").html(' <b>submit</b> ');
        return false;
    }

    if (pass != passConf) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>password and confirm doesnt match</div>";
        $("#submit").html(' <b>submit</b>');
        return false;
    }
    return true;
}

//  Window scroll header resizer
function windowScroll() {
    const navbar = document.getElementById("headText");
    if (document.body.scrollTop >= 2 || document.documentElement.scrollTop >= 2 ) {
        navbar.classList.remove("display-2");
    } else {
      navbar.classList.add("display-2");
    }
}
window.addEventListener('scroll', (ev) => {
    ev.preventDefault();
    windowScroll();
});
