<?php
ob_start();
include "connection.php";

//$email=$_POST["email"];
$email = $_POST["email"];
setcookie("currentUserEmail",$email);
$pass=$_POST["password"];

$sql = "SELECT * FROM File WHERE Email='$email' and Password = '$pass'";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

$row=mysqli_fetch_array($result);
//echo $count;
if ($count==1) {
        // echo 'hello';
        // echo '$row["Email"]';
         header('Location:file.php');
}
else{
    echo "<script type='text/javascript'>alert('username or password is wrong ');</script>";
    header('refresh:0.1; url =index.html'); 
    //echo 'not found';
}
$conn->close();
ob_end_flush();
?>