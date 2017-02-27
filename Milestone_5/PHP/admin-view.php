<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Cornfed Coworking - Admin</title>
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
                        <?php echo "<h1>The user info for: ". $_SESSION['userInfo']["userFirstName"]. " " . $_SESSION['userInfo']["userLastName"] ."</h1>"?>
                    </div>
                    <?php
                    // if ($_SESSION["contactUsSQLSuccessful"])
                    // {
                        echo "<table>";
                            echo "<tr><td>Salutation:</td><td>" . $_SESSION['userInfo']["userSalutation"] . "</td></tr>";
                            echo "<tr><td>First Name:</td><td>" . $_SESSION['userInfo']["userFirstName"] . "</td></tr>";
                            echo "<tr><td>Last Name:</td><td>" . $_SESSION['userInfo']["userLastName"] . "</td></tr>";
                            echo "<tr><td>Telephone:</td><td>" . $_SESSION['userInfo']["userTelephone"] . "</td></tr>";
                            echo "<tr><td>Email:</td><td>" . $_SESSION['userInfo']["userEmail"] . "</td></tr>";
                            echo "<tr><td>User Name:</td><td>" . $_SESSION['userInfo']["userName"] . "</td></tr>";
                            echo "<tr><td>Birth Date:</td><td>" . $_SESSION['userInfo']["userBirthDate"] . "</td></tr>";
                            echo "<tr><td>Work Status:</td><td>" . $_SESSION['userInfo']["userWorkStatus"] . "</td></tr>";
                            echo "<tr><td>Company:</td><td>" . $_SESSION['userInfo']["userCompany"] . "</td></tr>";
                            echo "<tr><td>Role:</td><td>" . $_SESSION['userInfo']["userRole"] . "</td></tr>";
                        echo "</table>";
                        session_destroy();
                    ?>
                </main>
        </div>
                <?php
                    include "includes/footer.inc.php";
                ?>
        </div>
    </body>
</html>