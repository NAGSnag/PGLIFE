<?php
$db_hostname="localhost";
$db_username="root";
$db_password="";
$db_name="test";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
echo 'connection fail'.mysqli_connect_error();
exit;}
$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "error:".mysqli_error($conn);
    exit;
}
while($row=mysqli_fetch_assoc($result)){
    echo $row['name']."<br />";
}
mysqi_close($conn);
?>