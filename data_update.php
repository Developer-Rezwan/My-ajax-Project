<?php

require_once 'database.php';
$value = $_REQUEST['Value'];
if(isset($_REQUEST['Value'])){

	$query = "SELECT* FROM `ajax_user` WHERE id = '$value' ";
	$run = mysqli_query($link,$query);
	
 
 $output = "";

 while($row = mysqli_fetch_array($run)){
 $output .='<form class="form-control">
		  <input type="text" id="up-username" class="form-control my-2" required="" placeholder="Username" value="' .$row["Username"].'" >
			<input type="email" id="up-email" value="'.$row["Email"].'" class="form-control my-2" required="" placeholder="E-mail">
             <div class="input-group" >
              <input type="password" name="password" id="up-password" class="form-control" required="" data-toggle="password" placeholder="Type a password" value="'.$row["Password"].'" >
              <div class="input-group-append">
                <span id="eye" class="input-group-text">
                 <i id="show" class="fa fa-eye"></i>
              </span>
           </div>
         </div>
	  </form>';
	}

echo $output;
} /** if() end **/

if(isset($_REQUEST['Username']) && isset($_REQUEST['Email']) && isset($_REQUEST['Password']) && isset($_REQUEST['Value'])){
  
    $value = $_REQUEST['Value'];
	$Username = $_REQUEST['Username'];
	$Email = $_REQUEST['Email'];
	$Password = $_REQUEST['Password'];

	$query_up = "UPDATE `ajax_user` SET Username = '$Username' , Email = '$Email' , Password = '$Password' WHERE id='$value' ";
	$run_up = mysqli_query($link, $query_up);
	if($run_up){
    echo '1';
   }
 }/** if() end **/



?>