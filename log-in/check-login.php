<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_POST['emailid']) || !isset($_POST['password']))
{
    die("No permission");
}
else {
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    $remember=isset($_POST['remember'])?1:0;
    
}

//CHECK IT FROM DATABASE
$my_emailid='surenroy@gmail.com';
$my_password='12345678';


if($emailid==$my_emailid && $password==$my_password){
    $_SESSION["passcode"] = '9748254444';
    $_SESSION["g_user_id"] = '1';
    header('Location: ../');    
}
else{
    header('Location: ./'); 
}



?>