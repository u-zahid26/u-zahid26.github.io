<!-- Admin Login Page --> 
<!-- Admin Login Credentials -- Admin / P4s5w0RD --> 
<?php
    session_start();
    require '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap.min.css"> <!-- Bootstrap stylesheet link --> 
        <title> PeoplesCity </title>
    </head>
    <!-- CSS Section, contains all style notes and formatting of page. -->
    <style>
        body{padding-top: 70px}
        h2{font-family: Georgia, serif; padding-left: 1%}
        .button{border: 0.5px solid; border-color: black; background-color: white; border-radius: 5px}
        .button:hover{background-color: #956497; color: white}
    </style>

    <!-- Start of body section --> 
    <body class="background">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #956497"> <!-- Start of Navbar --> 
            <a class="navbar-brand" href="../index.php">PeoplesCity</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav> <!-- End of Navbar -->

        <main>
            <div id="login" style="text-align: center">
                <h5> Admin Login </h5>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "EmptyFields"){
                            echo '<script type="text/javascript"> alert("Please fill in all the fields") </script>';
                        }elseif($_GET['error'] == "sqlError"){
                        echo '<script type="text/javascript"> alert("SQl Error, please try again in a short while.") </script>';
                        }elseif($_GET['error'] == "WrongPassword"){
                            echo '<script type="text/javascript"> alert("Incorrect password, please try again.") </script>';
                        }elseif($_GET['error'] == "UserDoesNotExist"){
                            echo '<script type="text/javascript"> alert("User not found. Please contact administrator.") </script>';
                        }
                    }
                ?>
                <form action="adminLogin.php" method="POST">
                    <input class="form-group" type="text" name="username" placeholder="Username"></br>
				    <input class="form-group" type="password" name="password" placeholder="Password"></br>
				    <button class="button" type="submit" name="login">Login</button>
                </form>
            </div>
        </main>
    </body>
</html>