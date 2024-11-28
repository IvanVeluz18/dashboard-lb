<?php
$ses_ID = (int)$_SESSION['ID'];
$ses_Email = $_SESSION['Email'];
$ses_Mobile = $_SESSION['Mobile'];
$ses_Dept = $_SESSION['Dept'];
$ses_Role = $_SESSION['Role'];
$ses_Fullname = $_SESSION['Fullname'];

if ($ses_ID == 0) redir('index.php');
?>