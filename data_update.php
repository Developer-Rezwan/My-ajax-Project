<?php
require_once 'database.php';
if(isset($_REQUEST['Value'])){
$value = $_REQUEST['Value'];

	$query = "SELECT* FROM `ajax_user` WHERE ID = '$value' ";
	$run = mysqli_query($link,$query);
	$row = mysqli_fetch_array($run);
    
$result = "";
$result .= '<form class="form-control" action="">
            <input type="hidden" id="hidden" value="'.$row['ID'].'">
              <input type="text" id="up-username" class="form-control my-2" required="" placeholder="Username" name="Username" value="'.$row['Username'].'">
              <input type="email" id="up-email" class="form-control my-2" required="" placeholder="E-mail" name="Email" value="'.$row['Email'].'">
                    <div class="input-group">
                        <input type="password" name="Password" id="up-password" class="form-control" required=""data-toggle="password" placeholder="Type a password" value="'.$row['Password'].'">
                            <div class="input-group-append">
                           <span id="eye" class="input-group-text">
                           <i id="show" class="fa fa-eye"></i>
                          </span>
                      </div>
                  </div>
            </form>';

 echo $result;
}
 if(isset($_REQUEST['Username']) && isset($_REQUEST['Email']) && isset($_REQUEST['Password']) && isset($_REQUEST['id'])){
  
    $id = $_REQUEST['id'];
	$Username = $_REQUEST['Username'];
	$Email = $_REQUEST['Email'];
	$Password = $_REQUEST['Password'];

	$query_up = "UPDATE `ajax_user` SET Username = '$Username' , Email = '$Email' , Password = '$Password' WHERE ID ='$id' ";
	$run_up = mysqli_query($link, $query_up);
	if($run_up){
    echo '1';
   }
 }/** if() end **/



?>