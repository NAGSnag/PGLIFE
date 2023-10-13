<?php
session_start();
$dbhostname="localhost";
$dbusername="root";
$dbpass="";
$dbname="test";

$conn=mysqli_connect($dbhostname,$dbusername,$dbpass,$dbname);
if(!$conn){
    echo "connection fail:".mysqli_connect_error();
    exit;
}


$email=$_GET['email'];
$pass=$_GET['pass'];

$sql1="SELECT * FROM users WHERE email='$email' and password='$pass' ";
$result=mysqli_query($conn,$sql1);
if(!$result){
    echo "error".mysqli_error($conn);
    exit;
}
while($row=mysqli_fetch_assoc($result)){
    if($row){
    echo 'HELLO '.$row['name'];

    $_SESSION['user_id']=$row['id'];
    $_SESSION['user_name']=$row['name'];

    //setcookie('user_id',$row['id'],time()+3600);
    //setcookie('name',$row['name'],time()+3600);

    ?>
    <br>
    <a href='dashbord.php'>click hear</a>
    <?php
    }
    else{
        echo 'login failed';
    }
}
mysqli_close($conn);

?>