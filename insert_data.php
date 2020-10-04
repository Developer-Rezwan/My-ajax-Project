<?php
require_once 'database.php';

$Username = $_REQUEST['Username'];
$Email = $_REQUEST['Email'];
$Password = $_REQUEST['Password'];

$query = "INSERT INTO `ajax_user`(`Username`, `Email`,`Password`) VALUES ('$Username','$Email','$Password')";
$run = mysqli_query($link, $query);
if ($run) {

    $sel_query = "SELECT* FROM `ajax_user` ORDER BY ID DESC ";
	$run_sel_query = mysqli_query($link,$sel_query);

$data = "";
$data .= '
<div id="success"></div>
<table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">SL. No</th>
      <th scope="col">USERNAME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>';
  $sl_no = 1;
  while($row = mysqli_fetch_array($run_sel_query)){
  $data .='
   	<tr>
      <td>'.$sl_no.'</td>
      <td id="tb-1">'.$row['Username'].'</td>
      <td >'.$row['Email'].'</td>
      <td>
      	<span>
      	<button id="edit" class="btn btn-primary" data-upvalue ="'.$row["ID"].'"><i class="fas fa-edit"></i></button>
      	<button id="delete" data-myvalue ="'.$row["ID"].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
      </span>
     </td>
    </tr>';

    $sl_no ++;
 }
    
 $data .= '</tbody>
</table> ';
echo $data;

} else {
    echo "<font color='tomato'>Something wents wrong!!!</font>";
}
