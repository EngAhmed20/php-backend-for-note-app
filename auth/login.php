<?php
include("../connect.php");
$email=filterReq("email");
$password=filterReq("password");
$stmt=$con->prepare("SELECT * FROM `users` WHERE `email`=? AND `password` =?");
$stmt->execute(array($email,$password));
$result=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();
if($count> 0){
    echo json_encode(array("status"=> "success","data"=>$result));
}
else{
echo json_encode(array("status"=> "error"));
}    




?>