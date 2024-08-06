<?php
include "connect.php";

$stmt=$con ->prepare("DELETE FROM users  where id =9");
$stmt ->execute();
$count=$stmt->rowCount();
if($count> 0){
    echo"sucess";
}else{
    echo"fail";
}



?>