<!-- Login php file, checks input data against database -->
<?php
  session_start();
  if(isset($_POST['login'])){

    require '../connect.php';

    $Username = $_POST['username'];
    $Password = $_POST['password'];

    echo $Username;
    echo $Password;

   if(empty($Username) || empty($Password)){ /* empty field check */
      header("Location: admin.php?error=EmptyFields");
      exit();
    }
    else{
      $sql = "SELECT * FROM UserAdmin WHERE Username=?";
      $stmt = mysqli_stmt_init($connect);

      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: admin.php?error=sqlError");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $Username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
          $pwdCheck = password_verify($Password, $row['Password']);
          if ($pwdCheck == false ){ /* password check */
            header("Location: admin.php?error=WrongPassword");
            exit();
          }
          else if ($pwdCheck == true){
            /* storing required information into sessions to be used elsewhere in the site */
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['Username'] = $row['Username'];

            header("Location: adminDB.php?login=success");
            exit();
          }
          else{
            header("Location: admin.php?error=WrongPassword");
            exit();
          }
        } else {
          header("Location: admin.php?error=UserDoesNotExist");
          exit();
        }
      }
    }
  }

?>
