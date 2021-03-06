<!-- Home Landing Page -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> <!-- Bootstrap stylesheet link --> 
    <title> PeoplesCity </title>
    <?php require 'connect.php'; ?>
  </head>
  <!-- CSS Section, contains all style notes and formatting of page. -->
  <style> 
    h4{text-decoration: underline; text-align: center; padding-top: 70px}
    .sansserif{font-family: Arial, helvetica, sans-serif} /* sort out font issue with h4 */
    p{text-align: center}
    .button{border: 0.5px solid; border-color: black; background-color: white; border-radius: 5px}
    .button:hover{background-color: #956497; color: white}
    #map{height: 400px; width: 100%}
    .section1{height: 300px}
    .section2{height: 400px; background-color: #eae1ea} 
    .enter{height: 900px}
    body{padding-top: 10px; /* background-image: url('brum_background.jpg');*/}
  </style> 

  <!-- Start of body section --> 
  <body class="background">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #956497"> <!-- Start of Navbar --> 
      <a class="navbar-brand" href="#">PeoplesCity</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#About">About</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="#Enter">Enter Suggestion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sugPages/see_sug.php">See Suggestions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sug/Pagesupcoming_improvements">Upcoming Improvements</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav> <!-- End of Navbar -->

    <main>
      <!-- Start of offset scroll through page. -->
      <div data-spy="scroll" data-target="#navbar" data-offset="0">
        <div class="section1">
          <h4 id="About" class="sansserif"> About </h4>
          <div class="container">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <p style="text-align: center;"> PeoplesCity is a platform designed to allow citizens improve the transport network around
                  the city. By giving the residents the opportunity to raise their concerns, issues and suggestions to improve the network,
                  it allows the council and responsible stakeholders develop and improve the areas and issues that are being voiced. 
                  Do you have a problem with the roads in your town? Is there always traffic on the way to drop the kids off? Why is there 
                  no direct access to that restaurant? Ask your questions or send your suggestions using the form below.  </p>
              </div>
            </div>
          </div>
        </div>

        <div class="enter section2">
          <!--Enter Suggestions form section. Could possibly be separate page. -->
          <h4 id="Enter" class="sansserif"> Enter Your Comments </h4>
          <!-- PHP Code that captures errors in filling in form, outputs alerts. --> 
          <?php
            if(isset($_GET['error'])){
              if($_GET['error'] == "EmptyFields"){
                echo '<script type="text/javascript"> alert("Please fill in all the fields") </script>';
              }else if($_GET['error'] == "InvalidEmail"){
                echo '<script type="text/javascript"> alert("Please enter a valid email address" </script>)';
              }
            }
          ?>
          <div class="enter_form"> <!-- start of entry form -->
            <form action="sugPages/enter_sug.php" method="post" style="text-align: center">
              <select class="form-group" name="category">
                <option value="suggestion">Suggestion</option>
                <option value="complaint">Complaint</option>
                <option value="other">Other</option>
              </select></br>
              <input class="form-group" type="text" name="name" placeholder="Name"></br>
              <input class="form-group" type="text" name="phone" placeholder="Phone"></br>
              <input class="form-group" type="email" name="email" placeholder="Email"></br>
              <!-- Move Google Maps API to here, allow user to choose location of improvement -->
              <div class="maps">
                <!-- <p> Google Maps API Integration </p> -->
                <script
                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEAjrzpyzmvPRRsH47XfVRjOIAR4r43pE&callback=initMap&libraries=&v=weekly"
                  defer
                ></script>
                <style type="text/css">
                  /* Set the size of the div element that contains the map */
                  #map {
                    height: 400px;
                    width: 750px;
                    margin-left: auto;
                    margin-right: auto;
                  }
                </style>
                <script>
                  // Initialize and add the map
                  function initMap() {
                    // The location of Uluru
                    const uluru = { lat: 52.4862, lng: -1.8904};
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 10,
                      center: uluru,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                      position: uluru,
                      map: map,
                    });
                  }     
                </script>
                <div id="map"></div>
              </div></br>
              <input class="form-group" type="text" name="location" placeholder="Location"></br> <!-- can be removed once api is working -->
              <input class="form-group" type="text" name="suggestion" placeholder="Comments"></br>
              <button class="button" type="submit" name="submit"> Submit </button>
            </form>
          </div> <!-- end of entry form -->
        </div>

        <div class="section1" style="text-align: center">
          <!-- See suggestions section. Redirect to secondary page showing data. -->
          <h4 id="Suggestions" class="sansserif"> See Suggestions </h4>
          <div class="containter">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <p style="text-align: center"> See current suggestions and improvements from citizens. See what your fellow citizens 
                  and neighbours are suggesting for development or improvement. Alter and refine searches based on category or location. </p>
                <button class="button" type="submit"><a href="sugPages/see_sug.php">See Suggestions</a></button>
              </div>
            </div>
          </div>  
        </div>

        <div class="section2" style="text-align: center">
          <!-- Upcoming Developments section. Possible redirect to section showing upcoming news and developments. -->
          <h4 id="Improvements" class="sansserif"> Upcoming Improvements </h4>
          <div class="container">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8"> 
                <p style="text-align: center"> Current improvements and future developments/plans for the city. Plans from the council as well as major
                    developments can be seen here. See the future of the city. </p>
                <button class="button" type="submit"><a href="sugPages/upcoming_improv.php">Upcoming Improvements</a></button>
              </div>
            </div>
          </div>      
        </div>
      </div>

    </main> 
    <script type="text/javascript" src="bootstrap.min.js"></script>

    <!--Page Footer --> 
    <footer class="page-footer" style="background-color: #956497">
      <p style="text-align: left"><a href="Admin/admin.php"> Admin Login </a></p>
    </footer> <!-- End of Footer --> 
  </body> <!-- End of body -->

</html>
