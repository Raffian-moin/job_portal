
<?php
include('connection/db.php');

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$userName=$_POST['userName'];
$email=$_POST['email'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
$admin_type=$_POST['admintype'];

$query=mysqli_query($con,"insert into admin_login(first_name,last_name,username,email,password,admin_type)
 values('$firstName','$lastName','$userName','$email','$password','$admin_type')");

 if($query){
     echo "data has been inserted";
 }else{
     echo "something wrong";
 }

?>