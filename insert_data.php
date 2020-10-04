<?php
require_once 'database.php';

$Username = $_REQUEST['Username'];
$Email = $_REQUEST['Email'];
$Password = $_REQUEST['Password'];

$query = "INSERT INTO `ajax_user`(`Username`, `Email`,`Password`) VALUES ('$Username','$Email','$Password')";
$run = mysqli_query($link, $query);
if ($run) {
  echo "1";
}