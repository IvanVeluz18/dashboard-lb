<?php
include('../utils.php');

session_destroy();
setcookie(session_name(),'',0,'/');

redir('index.php');
?>