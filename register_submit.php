<?php
$db_hostname="localhost";
$db_username="root";
$db_password="";
$db_name="test";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
echo 'connection fail'.mysqli_connect_error();
exit;}

$name=$_GET['name'];
$email=$_GET['email'];
$pass=$_GET['pass'];
echo "name=$name <br> email=$email <br>password=$pass";

$sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "error:".mysqli_error($conn);
    exit;
}
echo '<br>registration successfull';
mysqli_close($conn);

?>