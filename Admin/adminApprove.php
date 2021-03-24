<!-- admin approve and reject page -->
<!-- KEY: UserAdmin table, 0 -- Awaiting Admin Approval, 1 -- Approved, 2 -- Declined --> 
<?php
  session_start();
  require '../connect.php';

  $ID = $_POST['id'];

  $sql = "SELECT Email FROM Suggestions WHERE SugID = $ID";
  $email = mysqli_query($connect, $sql);

  if(isset($_POST['approve'])){
      $value = $_POST['approve'];
      $sql = "UPDATE Suggestions SET Approved = '1' WHERE SugID = $value";
      $result = mysqli_query($connect, $sql);

      mail($email, "PeoplesCity", "Your request has been approved");

      header("Location: adminDB.php?item=Approved");
      exit();
    }else if(isset($_POST['decline'])){
      $value = $_POST['decline'];
      $sql2 = "UPDATE Suggestions SET Approved = '2' WHERE SugID = $value";
      $result1 = mysqli_query($connect, $sql2);

      mail($email, "PeoplesCity", "Your request has been declined");

      header("Location: adminDB.php?item=Declined");
      exit();
  }




?>