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
         1/16/17
        -->
        <div id="sitewrapper">
        <?php
            session_start();
            
            include "includes/header.inc.php";
        ?>
        
        <div id="contentwrapper">
                <main>
                    <div id="h1wrapper">
                        <h1>Thank you for submitting your contact info!</h1>
                    </div>
                    <?php
                    echo "<table>";
                        echo "<tr><td>User Name:</td><td>" . $_SESSION['userName'] . "</td></tr>";
                        echo "<tr><td>Email:</td><td>" . $_SESSION['email'] . "</td></tr>";
                        echo "<tr><td>Telephone:</td><td>" . $_SESSION['telephone'] . "</td></tr>";
                        echo "<tr><td>Comments:</td><td>" . $_SESSION['comments'] . "</td></tr>";
                    echo "</table>";
                    ?>
                </main>
        </div>
                <?php
                    include "includes/footer.inc.php";
                ?>
        </div>
    </body>
</html>