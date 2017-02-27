<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Cornfed Coworking - Admin Page</title>
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
            <h1>Admin Page</h1>
            </div>
            
            <?php
                session_start();
                if($_SESSION["error"])
                {
                    echo "<h2>The user didn't exist</h2>";
                    $_SESSION["error"] = NULL;
                }
            ?>
            
            <h2>Search for a member below</h2>
            <form name="adminSearch" id="adminSearch" action="admin-search.php" onsubmit="" method="post">
                <label for="email">User's Email:</label>
                <input type="text" required name="email" id="email" value="" tabindex="1" />
                 
                <input type="submit" value="Submit" tabindex="2"/>
            </form>
        </main>
        </div>
        <?php
            include "includes/footer.inc.php";
        ?>
    </div>
    </body>
</html>