<?php
include('connection/db.php');

$id=$_POST['deleteId'];

$query=mysqli_query($con,"delete from admin_login where id='$id'");
if($query){
    echo "s";
}


?>