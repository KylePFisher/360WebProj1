<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Cornfed Coworking - Registration</title>
        <link rel="stylesheet" href="../CSS/reset.css" media="screen">
        <link rel="stylesheet" href="../CSS/cornfed.css" media="screen">
    </head>
    
    <body>
    <!-- 
     Kyle Fisher
     Final Project, Milestone 5
     INFO 2900 6A
     Brown, McCune, Paschall, Rosas 
     2/26/17
    -->
    <div id="sitewrapper">
        <?php
            include "includes/header.inc.php";
        ?>
        <div id="contentwrapper">
        <main>
            <div id="h1wrapper">
                <h1>Registration</h1>
            </div>
            <?php include("lib/server_side_validation.php"); session_start();?>
            <form name="registrationForm" id="registration" action="register-process.php" onsubmit="return validateRegister()" method="POST">
            <fieldset>
                <legend>Registration info</legend>
                <p><label for="salutation">Salutation:</label>
                <!--<input type="text"  name="salutation" id="salutation" value="<?php echo htmlspecialchars($_SESSION["salutation"]); ?>" tabindex="1" /></p>-->
                <select name="salutation">
                <option value="">Select...</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
                </select>
                </p>
                <br>
                <p><label for="firstName">First Name:</label>
                <input type="text"  name="firstName" id="firstName" value="<?php echo htmlspecialchars($_SESSION["firstName"]); ?>" tabindex="2" /></p>
                <br>
                <p><label for="lastName">Last Name:</label>
                <input type="text"  name="lastName" id="lastName" value="<?php echo htmlspecialchars($_SESSION["lastName"]); ?>" tabindex="3" /></p>
                <br>
                <p><label for="telephone">Telephone:</label>
                <input type="text"  name="telephone" id="telephone" value="<?php echo htmlspecialchars($_SESSION["telephone"]); ?>" tabindex="4" /></p>
                <br>
                <p><label for="email">Email:</label>
                <input type="email"  name="email" id="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" tabindex="5" /></p>
                <br>
                <p><label for="userName">User Name:</label>
                <input type="text"  name="userName" id="userName" value="<?php echo htmlspecialchars($_SESSION["userName"]); ?>" tabindex="6" /></p>
                <br>
                <p><label for="password">Password:</label>
                <input type="password"  name="password" id="password" value="<?php echo htmlspecialchars($_SESSION["password"]); ?>" tabindex="7"/></p>
                <br>
                <p><label for="birthDate">Birth Date:</label>
                <input type="text"  name="birthDate" id="birthDate" value="<?php echo htmlspecialchars($_SESSION["birthDate"]); ?>" tabindex="8"/></p>
                <br>
                <p><label for="workStatus">Work Status:</label>
                <!--<input type="text"  name="workStatus" id="workStatus" value="<?php echo htmlspecialchars($_SESSION["workStatus"]); ?>" tabindex="9"/></p>-->
                <select name="workStatus">
                <option value="">Select...</option>
                <option value="Student">Student</option>
                <option value="Employed">Employed</option>
                </select>
                </p>
                <br>
                <p><label for="company">Company:</label>
                <input type="text"  name="company" id="company" value="<?php echo htmlspecialchars($_SESSION["company"]); ?>" tabindex="10"/></p>
                <br>
                <p><label for="role">Role:</label>
                <!--<input type="text"  name="role" id="role" value="<?php echo htmlspecialchars($_SESSION["role"]); ?>" tabindex="11"/></p>-->
                <select name="role">
                <option value="">Select...</option>
                <option value="Owner">Owner</option>
                <option value="Employee">Employee</option>
                <option value="Client">Client</option>
                </select>
                </p>
                <br>
                <input type="submit" value="Submit" tabindex="12"/>
            </fieldset>
            </form>
            <div id="failedRegisterSubmission">
            <?php
                $errorList = $_SESSION["errorList"];
                if($errorList["emptyVals"])
                {
                    echo "<p class=\"failedSubmissionError\">Please fill every field</p>";
                }
                if($errorList["email"])
                {
                    echo "<p class=\"failedSubmissionError\">Email not in proper format: \"name@domain.com\"</p>";
                }
                if($errorList["telephone"])
                {
                    echo "<p class=\"failedSubmissionError\">Phone number not in proper format: \"402-111-2222\"</p>";
                }
                if($errorList["password"])
                {
                    echo "<p class=\"failedSubmissionError\">Password empty or too long (Max 20 characters)</p>";
                }
                if($errorList["birthDate"])
                {
                    echo "<p class=\"failedSubmissionError\">Birthdate not in proper format: YYYY-MM-DD</p>";
                }
                if($errorList["currentUser"])
                {
                    echo "<p class=\"failedSubmissionError\">An account with that email already exists</p>";
                }
                $_SESSION["errorList"] = NULL;
            ?>
            </div>
    </main>
    </div>
        <?php
            include "includes/footer.inc.php";
        ?>
    <script type="text/javascript" src="../JavaScript/validation.js"></script>
    </body>
</html>