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
    var errorParagraphs = document.querySelectorAll(".failedContactSubmission");
    var successfulSubmission = true;
    var name = document.forms["contactUsForm"]["uName"].value;
    var email = document.forms["contactUsForm"]["email"].value;
    var phone = document.forms["contactUsForm"]["telephone"].value;
    var comments = document.forms["contactUsForm"]["comments"].value;
    
    var phoneRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
    var emailRegex = /^[a-z0-9]+@[a-z0-9]+\.[a-z]+$/;
    var commentsRegex = /^.{1,250}$/;

    var i;
    for (i = 0; i < errorParagraphs.length; i++)
    {
        errorParagraphs[i].style.display = "none";
    }
    
    if (name == "" || email == "" || phone == "" || comments == "") {
        errorParagraphs[0].style.display = "block";
        successfulSubmission = false;
    }
    

    if (!email.match(emailRegex))
    {
        errorParagraphs[1].style.display = "block";
        console.log('email triggered');
        successfulSubmission = false;
    }

    if (!phone.match(phoneRegex))
    {
        errorParagraphs[2].style.display = "block";
        successfulSubmission = false;
    }

    if (!comments.match(commentsRegex))
    {
        errorParagraphs[3].style.display = "block";
        console.log('comments triggered');
        successfulSubmission = false;
    }

    if (successfulSubmission)
    {
        return true;
    }

    return false;  
}