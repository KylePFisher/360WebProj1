<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Cornfed Coworking - Contact Us</title>
        <link rel="stylesheet" href="../CSS/reset.css" media="screen">
        <link rel="stylesheet" href="../CSS/cornfed.css" media="screen">
    </head>
    
    <body>
    <!-- 
     Kyle Fisher
     Final Project, Milestone 2
     INFO 2900 6A
     Brown, McCune, Paschall, Rosas 
     1/15/17
    -->
    <div id="sitewrapper">
        <?php
            include "includes/header.inc.php";
        ?>
        <div id="contentwrapper">
        <main>
            <div id="h1wrapper">
                <h1>Contact Us</h1>
            </div>
            <?php include("lib/server_side_validation.php"); session_start();?>
            <form name="contactUsForm" id="contactUs" action="contact-us-process.php" onsubmit="return validateContact()" method="POST">
            <fieldset>
                <legend>Contact info</legend>
                <p><label for="userName">Username:</label>
                <input type="text"  name="userName" id="userName" value="<?php echo htmlspecialchars($_SESSION["userName"]); ?>" tabindex="1" /></p>
                <br>
                <p><label for="email">Email:</label>
                <input type="email"  name="email" id="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" tabindex="2" /></p>
                <br>
                <p><label for="telephone">Telephone:</label>
                <input type="text"  name="telephone" id="telephone" value="<?php echo htmlspecialchars($_SESSION["telephone"]); ?>" tabindex="3" /></p>
                <br>
                <p><label for="comments">Comments (Max 250 characters):</label><br>
                <textarea name="comments"  id="comments" cols="30" rows="3" tabindex="4"></textarea></p>
                <br>
                <input type="submit" value="Submit" tabindex="5"/>
            </fieldset>
            </form>
            <div id="failedContactSubmission">
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
                if($errorList["comments"])
                {
                    echo "<p class=\"failedSubmissionError\">Comments empty or too long</p>";
                }
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