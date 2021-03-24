<!-- File to add entry to DB -->

<?php
  session_start();
  if (isset($_POST['submit'])){
    require '../connect.php';

    $Category = $_POST['category'];
    $Name = $_POST['name'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $Location = $_POST['location'];
    $Suggestion = $_POST['suggestion'];

  if (empty($Name) || empty($Phone) || empty($Email) || empty($Location) || empty($Suggestion)) { /* empty fields check */
    header("Location: index.php?error=EmptyFields");
    exit();
  }
  else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){ /* Email check */
    header("Location: index.php?error=InvalidEmail");
    exit();
  }
  else{ /* inserting values into DB */
    $sql = "INSERT INTO Suggestions (Category, Name, Phone, Email, Location, Suggestion, Approved) VALUES (?, ?, ?, ?, ?, ?, '0')";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: index.php?error=ConnectionError");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ssssss", $Category, $Name, $Phone, $Email, $Location, $Suggestion);
      mysqli_stmt_execute($stmt);

      echo '<script type="text/javascript"> alert("Suggestion has been entered successfully. Thank you for helping better the city.") </script>';
      $confirmEmail = $Email;
      $subject = "PeoplesCity Confirmation";
      $message = "Your suggestion/improvement has been sent for approval. This will be reviewed within 24 hours. Thank you for your input in helping better this city.";

      mail($confirmEmail, $subject, $message, $headers);  

      header("Location: sugConfirm.php?suggestionSuccessful");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($connect);
  }
  else {
    header("Location: index.php?error");
    exit();
  }
?>
