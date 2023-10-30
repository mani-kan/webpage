<?php
$con = new mysqli("localhost","root","","testing");

if($con->connect_error){
    echo "connection failed";
}
else {
    //echo "<script> location.replace('logins.html'); </script>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $con->prepare( " SELECT*FROM forms WHERE username=? AND  password=? ");
    $stmt->bind_param("ss", $username ,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo "<script> location.replace('web.html') </script>";
    }
else {
    
    echo "<script> location.replace('logins.html');</script>";
    echo "<script> alert('pleace check your username or password'); </script>";
}
$stmt->close();
}
}

$con->close();

?>