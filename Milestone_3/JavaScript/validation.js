function validateSignIn() {
    var name = document.forms["sign-in"]["uName"].value;
    var pass = document.forms["sign-in"]["passWord"].value;
    if (name == "" || pass == "") {
        document.getElementById("failedSignIn").style.display = "block";
        return false;
    }
    else
    {
        return true;
    }
}

function validateContact() {
    var name = document.forms["contactUsForm"]["uName"].value;
    var email = document.forms["contactUsForm"]["email"].value;
    var phone = document.forms["contactUsForm"]["telephone"].value;
    var comments = document.forms["contactUsForm"]["comments"].value;
    if (name == "" || email == "" || phone == "" || comments == "") {
        document.getElementById("failedContactSubmission").style.display = "block";
        return false;
    }
    else
    {
        return true;
    }
}