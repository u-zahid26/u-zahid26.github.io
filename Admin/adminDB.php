<!-- See Suggestions Page -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap.min.css"> <!-- Bootstrap stylesheet link --> 
        <title> PeoplesCity </title>
        <?php require '../connect.php'; ?>
    </head>
    <!-- CSS Style --> 
    <style>
        body{padding-top: 70px}
        h2{font-family: Georgia, serif; padding-left: 1%}
        .button{border: 0.5px solid; border-color: black; background-color: white; border-radius: 5px}
        .button:hover{background-color: #956497; color: white}
    </style>


  <!-- Start of body section --> 
    <body>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #956497"> <!-- Start of Navbar --> 
            <a class="navbar-brand" href="../index.php">PeoplesCity</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="logout">
				<?php
                    session_start();
                    if(isset($_SESSION['UserID'])){ /* option to logout if logged in */
                        echo '<form action="DB/logout.php" method="post">
                                <button type="submit" name="logout"> Logout </button>
                            </form>';
                    } 
                ?>
            </div>
        </nav> <!-- End of Navbar -->

        <main> 
            <!-- See suggestions page. Table view of information in the DB. 
                Clickable table headers to sort according to user preference. -->
            <p style="text-align: center; font-weight: bold; font-size: 25px"> Awaiting Approval </p>

            <div class="see_suggestions" style="padding-top: 50px">
                <?php /* PHP code for  displaying suggesting from DB on web page. */
                $sql = "SELECT * FROM Suggestions WHERE Approved = '0' "; /* SQL query - selects all data from 'Suggestions' table. */
                $result  = mysqli_query($connect, $sql); /* establishes connection to DB server */
                $resultCheck = mysqli_num_rows($result); 

                echo '<div class="container">
                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" style="width: 100%;
                        border: 1px solid #ddd; padding: 12px 20px 12px 40px; margin-bottom: 12px"> -->
                        <script type=text/javascript src="seeSugSearchJS.js">searchFunction()</script>
                        <table id="suggestionsTable" class="table table-hover sortable">
                        <thread>
                        <tr>
                            <th> Location </th>
                            <th> Suggestion </th>
                            <th> Approve </th>
                        </tr>
                        </thread>';
                while ($row = mysqli_fetch_assoc($result)){
                    echo '<tbody>
                        <tr class="item">
                            <td>'.$row['Location'].'</td>
                            <td>'.$row['Suggestion'].'</td>
                            <td><form action="adminApprove.php" method="POST">
                                <button class="button" type="submit" name="approve" id="approve" value="'.$row['SugID'].'">Approve</button>
                                <button class="button" type="submit" name="decline" id="decline" value="'.$row['SugID'].'">Decline</button>
                                <input type="hidden" name="id" value="'.$row['SugID'].'"/>
                            </td>
                        </tr>
                        </tbody>';
                }  
                ?>
            </div>
        </main>
    </body>
</html>