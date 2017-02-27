/*
    Kyle Fisher
    Final Project, Milestone 3 - Revised in Milestone 4
    INFO 2900 6A
    Brown, McCune, Paschall, Rosas 
    1/19/17
*/

function validateSignIn() 
{
    var name = document.forms["sign-in"]["uName"].value;
    var pass = document.forms["sign-in"]["passWord"].value;
    if (name == "" || pass == "") 
    {
        console.log("validateSignIn Triggered");
        
        var errorDiv = document.getElementById("failedSignInSubmission");
        //Rempve duplicate error messages
        while (errorDiv.firstChild) {
            errorDiv.removeChild(errorDiv.firstChild);
        }
        
        createErrorParagraph("Please fill every field", "failedSignInSubmission");
        
        return false;
    }
    else
    {
        return true;
    }
}

/*Addition in REV 2.0, dynamically adds a message in a <p> tag to whatever
    error div is passed into it*/
function createErrorParagraph(message, errorDivName) 
{
    //Create a variable to hold the div that will contain error messages
    var errorDiv = document.getElementById(errorDivName);
    
    //Code to create error message
    var errorParagraph = document.createElement("p");
        errorParagraph.className = "failedSubmissionError";
        
    //Creating error message content
    var errorParagraphContent = document.createTextNode(message);
    
    //Appending error message content to error message, and adding the error to the DOM
        errorParagraph.appendChild(errorParagraphContent);
        errorDiv.appendChild(errorParagraph);
}

//REV 2.0 in Milestone 4
/*Changed the script from accessing a predefined <p> tag to dynamically adding it
    to a div element */
function validateContact() 
{
    //Logging the method call because I suck at debugging Javascript otherwise
    console.log("Validate contact begins");
    
    //Creating a variable to hold the div that will contain error messages
    var errorDiv = document.getElementById("failedContactSubmission");
    
    //Defaulting submission to true, and setting it to false if anything goes wrong.
    var successfulSubmission = true;
    
    //Initializing javascript variables with form variables
    var name = document.forms["contactUsForm"]["userName"].value;
    var email = document.forms["contactUsForm"]["email"].value;
    var phone = document.forms["contactUsForm"]["telephone"].value;
    var comments = document.forms["contactUsForm"]["comments"].value;
    
    //Putting expecting regex in a var just in case I want to change it
    var phoneRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
    var emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/;
    var commentsRegex = /^.{1,250}$/;
    
    /*This removes every error message, so that
      duplicate error messages don't show */
    while (errorDiv.firstChild) {
        errorDiv.removeChild(errorDiv.firstChild);
    }
    
    //Code to handle empty values
    if (name == "" || email == "" || phone == "" || comments == "") {
        createErrorParagraph("Please fill every field", "failedContactSubmission");
        console.log("Empty values triggered");
        successfulSubmission = false;
    }
    
    //Code to handle bad email formatting
    if (!email.match(emailRegex))
    {
        createErrorParagraph("Email not in proper format: \"name@domain.com\"",
        "failedContactSubmission");
        console.log('Email triggered');
        successfulSubmission = false;
    }

    //Code to handle bad cellphone formatting
    if (!phone.match(phoneRegex))
    {
        createErrorParagraph("Phone number not in proper format: \"402-111-2222\"",
         "failedContactSubmission");
        console.log('Phone triggered');
        successfulSubmission = false;
    }

    //Code to handle improper comment size
    if (!comments.match(commentsRegex))
    {
        createErrorParagraph("Comments empty or too long",  "failedContactSubmission");
        console.log('Comments triggered');
        successfulSubmission = false;
    }

    /*Ending method with a bool return based off our successfulSubmission var
      that is defaulted to true*/
    if (successfulSubmission)
    {
        return true;
    }
    else
    {
        return false; 
    }
}

function validateRegister() 
{
    //Logging the method call because I suck at debugging Javascript otherwise
    console.log("Validate register begins");
    
    //Creating a variable to hold the div that will contain error messages
    var errorDiv = document.getElementById("failedRegisterSubmission");
    
    //Defaulting submission to true, and setting it to false if anything goes wrong.
    var successfulSubmission = true;
    
    //Initializing javascript variables with form variables
    var salutation = document.forms["registrationForm"]["salutation"].value;
    var firstName = document.forms["registrationForm"]["firstName"].value;
    var lastName = document.forms["registrationForm"]["lastName"].value;
    var phone = document.forms["registrationForm"]["telephone"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var userName = document.forms["registrationForm"]["userName"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var birthDate = document.forms["registrationForm"]["birthDate"].value;
    var workStatus = document.forms["registrationForm"]["workStatus"].value;
    var company = document.forms["registrationForm"]["company"].value;
    var role = document.forms["registrationForm"]["role"].value;
    
    //Putting expecting regex in a var just in case I want to change it
    var phoneRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
    var emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/;
    var passwordRegex = /^.{1,20}$/;
    var birthDateRegex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
    
    /*This removes every error message, so that
      duplicate error messages don't show */
    while (errorDiv.firstChild) {
        errorDiv.removeChild(errorDiv.firstChild);
    }
    
    //Code to handle empty values
    if (salutation == "" || firstName == "" || lastName == "" || phone == "" || 
        email == "" || password == "" || birthDate == "" || workStatus == "" ||
        company == "" || role == "" || userName == "") {
        createErrorParagraph("Please fill every field", "failedRegisterSubmission");
        console.log("Empty values triggered");
        successfulSubmission = false;
    }
    
    //Code to handle bad email formatting
    if (!email.match(emailRegex))
    {
        createErrorParagraph("Email not in proper format: \"name@domain.com\"",
        "failedRegisterSubmission");
        console.log('Email triggered');
        successfulSubmission = false;
    }

    //Code to handle bad cellphone formatting
    if (!phone.match(phoneRegex))
    {
        createErrorParagraph("Phone number not in proper format: \"402-111-2222\"",
         "failedRegisterSubmission");
        console.log('Phone triggered');
        successfulSubmission = false;
    }

    //Code to handle improper comment size
    if (!password.match(passwordRegex))
    {
        createErrorParagraph("Password empty or too long",  "failedRegisterSubmission");
        console.log('Password triggered');
        successfulSubmission = false;
    }
    
    if(!birthDate.match(birthDateRegex))
    {
        createErrorParagraph("Birthdate not in proper format: YYYY-MM-DD",  "failedRegisterSubmission");
        console.log('Birthdate triggered');
        successfulSubmission = false; 
    }

    /*Ending method with a bool return based off our successfulSubmission var
      that is defaulted to true*/
    if (successfulSubmission)
    {
        return true;
    }
    else
    {
        return false; 
    }
}