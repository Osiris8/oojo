<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=oojo;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>