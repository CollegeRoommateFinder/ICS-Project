<?php

$ServerName = 'localhost';
$UserName= 'root';
$Password = '';
$db = 'roommate_finder';

// Create connection
$conn = new mysqli($ServerName, $UserName, $Password, $db) or die('Could not connect');
echo "Connected Successfully";
?>