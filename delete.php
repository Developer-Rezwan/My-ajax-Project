<?php
require_once 'database.php';

$id = $_REQUEST['Id'];


$query = "DELETE FROM ajax_user WHERE id = '$id' ";
$run = mysqli_query($link, $query);
if ($run) {
    echo 1 ;
} else{
	echo 0 ;
}
