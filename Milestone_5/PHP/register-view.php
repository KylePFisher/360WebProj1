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
            session_start();
            
            include "includes/header.inc.php";
        ?>
        
        <div id="contentwrapper">
                <main>
                    <div id="h1wrapper">
                        <h1>Thank you for submitting your registration info!</h1>
                    </div>
                    <?php
                    if ($_SESSION["registrationSQLSuccessful"])
                    {
                        echo "<table>";
                            echo "<tr><td>Salutation:</td><td>" . $_SESSION['salutation'] . "</td></tr>";
                            echo "<tr><td>First Name:</td><td>" . $_SESSION['firstName'] . "</td></tr>";
                            echo "<tr><td>Last Name:</td><td>" . $_SESSION['lastName'] . "</td></tr>";
                            echo "<tr><td>Telephone:</td><td>" . $_SESSION['telephone'] . "</td></tr>";
                            echo "<tr><td>Email:</td><td>" . $_SESSION['email'] . "</td></tr>";
                            echo "<tr><td>User Name:</td><td>" . $_SESSION['userName'] . "</td></tr>";
                            echo "<tr><td>Birth Date:</td><td>" . $_SESSION['birthDate'] . "</td></tr>";
                            echo "<tr><td>Work Status:</td><td>" . $_SESSION['workStatus'] . "</td></tr>";
                            echo "<tr><td>Company:</td><td>" . $_SESSION['company'] . "</td></tr>";
                            echo "<tr><td>Role:</td><td>" . $_SESSION['role'] . "</td></tr>";
                        echo "</table>";
                        session_destroy();
                    }
                    else 
                    {
                        echo "<p class=\"failedSubmissionError\">There was an error with the submission, please try again within a few minutes.</p>";
                    }
                    ?>
                </main>
        </div>
                <?php
                    include "includes/footer.inc.php";
                ?>
        </div>
    </body>
</html>