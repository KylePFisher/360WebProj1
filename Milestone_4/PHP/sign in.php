<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Cornfed Coworking - Sign In</title>
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
            <h1>Sign-In Page</h1>
            </div>
            
            <form name="sign-in" id="sign-in" action="#" onsubmit="return validateSignIn()" method="post">
                <label for="userName">Username:</label>
                <input type="text" required name="uName" id="uName" value="" tabindex="1" />
                 
                <label for="passWord">Password:</label>
                <input type="password" required name="passWord" id="passWord" value="" tabindex="2" />
                 
                <input type="submit" value="Submit" tabindex="3"/>
            </form>
            <p id="failedSignIn">Please fill the required fields</p>
        </main>
        </div>
        <?php
            include "includes/footer.inc.php";
        ?>
    </div>
    
    <script src="../JavaScript/validation.js"></script>
                
    </body>
</html>