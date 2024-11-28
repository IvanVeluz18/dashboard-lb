<?php
include('../utils.php');
include('incSecure.php');

$Pwd1 = $_POST['Pwd1'];
$Pwd2 = "'" . password_hash($_POST['Pwd2'], PASSWORD_BCRYPT) . "'";

DBOpen();

$Pwd = DBGetData("SELECT Password FROM users WHERE Email='$ses_Email'")[0][0];

if (password_verify($Pwd1, $Pwd) == false) jsonResp('msg', 'Error: Invalid old password');

DBExecute("UPDATE users SET Password=$Pwd2, Updated='$maniladate' WHERE Email='$ses_Email'");

jsonResp('msg', 'Password changed successfully');

DBClose();
?>