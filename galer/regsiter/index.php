<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>register</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center flex-column" style="height: 100vh">

      <div class="col-md-6 col-lg-4 col-10 p-4 p-md-5 shadow-sm rounded-4">
        <p class="text-center fs-3 fw-bold mb-5 pb-3">REGISTER</p>
        <form method="post" name="yourForm">
          <div class="my-4 border-bottom py-1">
            <input type="text" class="form-control py-2 border-0" onKeyup="checkform()" name="username" required placeholder="username" />
          </div>
          <div class="my-4 border-bottom py-1">
            <input type="email" class="form-control py-2 border-0" onKeyup="checkform()" name="email" required placeholder="email" />
          </div>
          <div class="my-4 border-bottom py-1">
            <input type="password" class="form-control py-2 border-0" onKeyup="checkform()" name="password" required placeholder="password" />
          </div>
          <div class="my-4 border-bottom py-1">
            <input type="password" class="form-control py-2 border-0" onKeyup="checkform()" name="confirm_pw"
              required placeholder="confirm password" />
          </div>
          <div class="my-4">
            <a href="../login/index.php" class=""><button class="btn btn-dark w-100 py-3" id="submitbutton" type="submit" disabled="disabled" name="signupBtn" value="Submit">Sign Up </button></a>
          </div>
        </form>
        <div class="my-4">
          <p class="text-center">-OR-</p>
        </div>
        <div class="my-4">
          <p class="text-center">
            Already have an account? <a href="../login">Sign In</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php
  include('../config/con.php');
  if (isset($_POST['signupBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirm_pw = $_POST['confirm_pw'];
    if (!empty($username && $password && $email && $confirm_pw)) {
      $cek_username = mysqli_query($con, "SELECT * FROM user WHERE Username='$username'");
      if ($cek_username->num_rows > 0) {
        echo "username sudah ada";
      } else {
        $cek_email = mysqli_query($con, "SELECT * FROM user WHERE Email='$email'");
        if ($cek_email->num_rows > 0) {
          echo "email sudah terdaftar";
        } else {
          if
          ($confirm_pw === $password) {
            mysqli_query($con, "INSERT INTO user VALUES (NULL, '$username', '$password', '$email', NULL, NULL)");
          } else {
            echo "
                <script>
                  alert('password tidak cocok!');
                  history.back();
                </script>
                ";
          }
        }
      }
    } else {
      echo "<script>alert('field empty like my heart');</script>";
    }
    header("Location: ../login/");
  } ?>
  <script src="js/bootstrap.min.js"></script>
  <script>
    function checkform() {
    const formElements = document.forms["yourForm"].elements;
    let submitBtnActive = true;

    for (let inputEl = 0; inputEl < formElements.length; inputEl++) {
        if (formElements[inputEl].value.length == 0) {
          submitBtnActive = false 
        };
    }

    if (submitBtnActive) {
        document.getElementById("submitbutton").disabled = false;
    } else {
        document.getElementById("submitbutton").disabled = "disabled";
    }
}
  </script>
</body>

</html>
