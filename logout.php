<?php
session_start();
session_destroy();
setcookie("id", "", time() - 3600);

$_SESSION[] = [];

header('Location: login2.php');

?>