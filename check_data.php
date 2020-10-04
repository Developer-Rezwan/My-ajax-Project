<?php
require_once 'database.php';

$Username = $_REQUEST['Username'];
$Email = $_REQUEST['Email'];


if(empty($Username) || empty($Email)){
		echo "<font color='tomato'>Insert A Valid Data!</font>";
}else{
    
	$query = "SELECT* FROM `ajax_user` WHERE Username = '$Username' ";
	$run = mysqli_query($link,$query);
	$row = mysqli_num_rows($run);
    
	if($row >= 1){
		echo "<font color='tomato'>$Username is Unavailable!</font>";
	}else{
		echo "<font color='lime'>$Username is available!</font>";
	}
}
