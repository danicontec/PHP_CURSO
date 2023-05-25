<?php
session_start();
session_destroy();
setcookie("user","",time()-7200);
header("Location: remember-login");
exit();

?>