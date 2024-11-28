<?php
include('../utils.php');

$Email = SQLs($_POST['Email']);
$Password = $_POST['Password'];
$RedirUrl = $_POST['RedirUrl'];

// die(password_hash($Password, PASSWORD_BCRYPT));

DBOpen();
$r = DBGetData2("SELECT ID, Email, Fullname, Password, Role, Dept FROM users WHERE Email=$Email")[0];

if (is_null($r)) redirMsg('index.php', 'Invalid email or password');

if (password_verify($Password, $r['Password']) === false) redirMsg('index.php', 'Invalid email or password.');

DBExecute("UPDATE users SET LastIn='$maniladate' WHERE ID=$r[ID]");
DBClose();


$_SESSION['ID'] = $r['ID'];
$_SESSION['Email'] = $r['Email'];
$_SESSION['Mobile'] = $r['Mobile'];
$_SESSION['Dept'] = $r['Dept'];
$_SESSION['Role'] = $r['Role'];
$_SESSION['Fullname'] = $r['Fullname'];

saveCookie('Email', $r['Email']);

if ($RedirUrl == '')
 $RedirUrl = 'main.php';

redir($RedirUrl);
?>