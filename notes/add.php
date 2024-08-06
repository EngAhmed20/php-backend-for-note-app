<?php

include "../connect.php";
$title= filterReq("title");
$content=filterReq("content");
$userid=filterReq("userid");
$imgname=uploadImg("file");
if($imgname !='fail')
{
    $stmt=$con->prepare("INSERT INTO `notes`(`notes_title`, `notes_content`, `notes_users`,notes_image) VALUES (?,?,?,?)");
$stmt->execute(array($title,$content,$userid,$imgname));
$count=$stmt->rowCount();
if($count> 0){
    echo json_encode(array("status"=> "success"));
}else{
    echo json_encode(array("status"=> "fail"));

}
}else{
    echo json_encode(array("status"=> "error"));
}

?>