<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('cokid','',time()-120);
setcookie('cokeyus','',time()-120);


header("Location:../index.php");
exit;



 ?>