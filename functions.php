<?php
define('MB',1048576);
function filterReq($requestname){
   return htmlspecialchars(strip_tags($_POST[$requestname]));
}
function uploadImg($imgrequest){
   global $imgErr;
   $imgname=rand(1,100).$_FILES[$imgrequest]['name'];
   $imgtemp=$_FILES[$imgrequest]['tmp_name'];
   $imgsize=$_FILES[$imgrequest]['size'];
   $allowExt=array("jpg","png","jepg","gif","mp3","pdf");
   $strToArr=explode(".",$imgname);
   $ext=end($strToArr);
   $ext = strtolower($ext);
   if(!empty($imgname)&&!in_array($ext,$allowExt)){
      $imgErr[]="ext";
}if($imgsize>2*MB){
$imgErr[]="size";
}if(empty($imgErr)){
   move_uploaded_file($imgtemp,"../upload/".$imgname);
   return $imgname;
}
else{
return "fail";
}
}
function deleteFile($dir,$imagename){
   if(file_exists($dir."/".$imagename)){
      unlink($dir."/". $imagename);
   }
}
function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "ahmed" ||  $_SERVER['PHP_AUTH_PW'] != "ahmed12345"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}

?>