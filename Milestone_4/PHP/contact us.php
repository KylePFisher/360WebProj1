<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
            <form name="contactUsForm" id="contactUs" action="contact us process.php" onsubmit="return validateContact()" method="POST">
            <fieldset>
                <legend>Contact info</legend>
                <p><label for="userName">Username:</label>
                <input type="text"  name="userName" id="userName" value="" tabindex="1" /></p>
                <br>
                <p><label for="email">Email:</label>
                <input type="email"  name="email" id="email" value="" tabindex="2" /></p>
                <br>
                <p><label for="telephone">Telephone:</label>
                <input type="phone"  name="telephone" id="telephone" value="" tabindex="3" /></p>
                <br>
                <p><label for="comments">Comments (Max 250 characters):</label><br>
                <textarea name="comments" id="comments" cols="30" rows="3" tabindex="4"></textarea></p>
                <br>
                <input type="submit" value="Submit" tabindex="5"/>
            </fieldset>
            </form>
            <p class="failedContactSubmission">Please fill the required fields</p>
            <p class="failedContactSubmission">Email not in proper format: "name@domain.com"</p>
            <p class="failedContactSubmission">Phone number not in proper format: "402-111-2222"</p>
            <p class="failedContactSubmission">Comments empty or too long.</p>
    </main>
    </div>
        <?php
            include "includes/footer.inc.php";
        ?>
    <script type="text/javascript" src="../JavaScript/validation.js"></script>
    </body>
</html>