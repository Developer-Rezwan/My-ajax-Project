<?php
require_once 'database.php';
  $value = $_REQUEST['Value'];
    $query = "SELECT* FROM `ajax_user` WHERE Username LIKE '%$value%' OR Email LIKE '%$value%' ";
	$run = mysqli_query($link,$query);
    
    if(mysqli_num_rows($run) > 0 ){
    	$result = "";
    	$result .= '<table class="table table-striped">
					  <thead class="table-primary">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Username</th>
					      <th scope="col">Email</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
				  <tbody>';
			 $i = 1;
		   while($row = mysqli_fetch_array($run)){ 
		$result .= '<tr>
		      <th scope="row">' .$i. '</th>
		      <td >'.$row['Username'].'</td>
		      <td >' .$row['Email'] .'</p></td>
		      <td>
		      	<span>
		      	<button id="update" data-toggle="modal" data-target="#exampleModal-2" data-upvalue = "'.$row['ID'].'" class="btn btn-primary"><i class="fas fa-edit"></i></button>
		      	<button id="delete" data-myvalue = "'. $row['ID'] .'"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
		      </span>
		     </td>
		    </tr>';
		$i++;
		}
		$result .= '</tbody>
		           </table>';
    	echo $result;
    }else{
    	echo "Nothing Found!";
    }

?>