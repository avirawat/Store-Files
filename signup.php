<?php
$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
$pass=$_POST['password'];

include "connection.php";

$sql="INSERT INTO File(Name,Email,Age,Password) VALUES ('$name','$email','$age','$pass')";
if(!mysqli_query($conn,$sql)) {
echo 'not inserted';
}
else {
     header('Location:index.html');
}
?>