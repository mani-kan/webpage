<?php

$uname = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['spassword'];

$con = new mysqli('localhost','root','','testing');
if($con->connect_error){
    echo "connection failed!";
    die("connection failed".$con->connect_error);
}else{

    $stm = $con->prepare("INSERT INTO forms(username,email,password ) VALUES (?,?,?)");
    $stm->bind_param("sss",$uname,$email,$password);
    $stm->execute();
    echo "<script> location.replace('web.html') </script>";
    echo "<script> alert('sigin sucessfull...'); </script>";
    $stm->close();
    $con->close();
}

?>