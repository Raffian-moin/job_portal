<?php
include('connection/db.php');
$id=$_POST['id'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$userName=$_POST['userName'];
$email=$_POST['email'];
$password=$_POST['password'];
$admin_type=$_POST['admintype'];
// echo $first_name=$_POST['firstName'];
// echo $last_name=$_POST['lastName'];
// echo $username=$_POST['userName'];
// echo $password=$_POST['password'];
// echo $email=$_POST['email'];
// echo $admintype=$_POST['admintype'];

if(!empty($firstName && $lastName && $userName && $password && $email && $admin_type)){
    $query=mysqli_query($con,"UPDATE admin_login set first_name='$firstName',last_name='$lastName',
    username='$userName',email='$email',password ='$password',admin_type='$admin_type' where id='$id' ");
    if($query){
        echo "success";
    }

}



?>