<?php include 'connection/db.php';?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="css/login_style.css" rel="stylesheet">
<link href="css/sigin.css" rel="stylesheet">


  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="form-group">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address">
      </div>

      <div class="form-group">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email=$_POST['email'];
$password=$_POST['password'];
if(!empty($email && $password)){
$result=mysqli_query($con, "SELECT * FROM admin_login where email='$email' AND password='$password' ");
if(mysqli_num_rows($result)>0){
  header("Location: admin_dashboard.php");
}else{
  echo "try again";
}
}
}

  // $email = $_REQUEST['email'];
  // if (empty($email)) {
  //   echo "Name is empty";
  // } else {
  //   echo $email;
  // }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/admin_login.js"></script>
  </body>
</html>