<?php
$dbhostname="localhost";
$dbusername="root";
$dbpass="";
$dbname="test";

$conn=mysqli_connect($dbhostname,$dbusername,$dbpass,$dbname);
if(!$conn){
    echo "connection fail:".mysqli_connect_error();
    exit;
}

$name=$_GET['name'];
$email=$_GET['email'];
$pass=$_GET['pass'];

$sql1="SELECT * FROM users WHERE name='$name'";
$result=mysqli_query($conn,$sql1);
if(!$result){
    echo "error".mysqli_error($conn);
    exit;
}
while($row=mysqli_fetch_assoc($result)){
    $te=$row['email'];
    $tp=$row['password'];
    if(($email==$te)and($pass==$tp)){
        echo "login successfull";
        exit;
    }
    else if($email!=$te){
        echo 'email not matched';
    }
    else if($pass!=$tp){
        echo 'password not matching';
    }
    else{
        echo 'not matching';
        continue;
    }
}
mysqli_close($conn);

?>