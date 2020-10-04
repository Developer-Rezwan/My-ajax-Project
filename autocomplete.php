<?php
require_once 'database.php';

$Value = $_REQUEST['Value'];
    
	$query = "SELECT* FROM `ajax_user` WHERE Username LIKE '%$Value%' ";
	$run = mysqli_query($link,$query);
	$num_row = mysqli_num_rows($run);
	if($num_row >0){
		while ($row = mysqli_fetch_array($run)) {

			echo "<ul><li>".$row['Username']."</li></ul>";


	   }
	}
	

