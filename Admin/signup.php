<!-- Signup php to enter data into Users table -->
<?php
session_start();
if (isset($_POST['login'])){

    require '../connect.php';
    /*pulling in all the required information from the registration form */
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    if (empty($Username) || empty($Password)){ /* empty fields check */
      header("Location: ../index.php?error=EmptyFields");
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)){ /* character check */
      header("Location: ../index.php?error=InvalidUsername");
      exit();
    }
    else {
      $sql = "SELECT Username FROM UserAdmin WHERE Username=?";
      $stmt = mysqli_stmt_init($connect);
      if (!mysqli_stmt_prepare($stmt, $sql)){ /* sql injection prevention */
        header("Location: ../index.php?no");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $Username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) { /* username availability check */
          header("Location: ../index.php?error=UsernameTaken");
          exit();
        }
        else {

          $sql = "INSERT INTO UserAdmin (Username, Password) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($connect); /* sql statement execution */
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=ConnectionError");
            exit();
          }
          else {
            $hashedPwd = password_hash($Password, PASSWORD_DEFAULT); /* hashing password for security */

            mysqli_stmt_bind_param($stmt, "ss", $Username, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?registration=successful");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mqsqli_close($conn);
}
else {
  header("Location: ../index.php?no5");
  exit();
}
