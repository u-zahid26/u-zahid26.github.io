<!-- Upcoming Improvements Page --> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap.min.css"> <!-- Bootstrap stylesheet link --> 
        <title> PeoplesCity </title>
        <?php require '../connect.php'; ?>
    </head>
    <!-- CSS Section, contains all style notes and formatting of page. -->
    <style> 
        .sansserif{font-family: Arial, helvetica, sans-serif} /* sort out font issue with h4 */
        p{text-align: center}
        .button{border: 0.5px solid; border-color: black; background-color: white; border-radius: 5px}
        .button:hover{background-color: #956497; color: white}
        .section1{height: 300px}
        .section2{height: 400px; background-color: #eae1ea} 
        body{padding-top: 10px; /* background-image: url('brum_background.jpg');*/}
    </style> 

    <!-- Start of body section --> 
    <body class="background">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #956497"> <!-- Start of Navbar --> 
            <a class="navbar-brand" href="../index.php">PeoplesCity</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#Enter">Enter Suggestion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="see_sug.php">See Suggestions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Upcoming Improvements</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav> <!-- End of Navbar -->

        <main> 
            <div data-spy="scroll" data-target="#navbar" data-offset="0">
                <div class="section1">
                    <div class="container">
                        <div class="row" style="padding-top: 70px">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <p style="text-align: center;"> See upcoming improvements and future development plans in place to improve the current 
                                    transport network within the city and its surrounding areas. </p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Next section goes here --> 
            </div>
        </main>
        
    </body>
</html>

