<?php
require_once 'inc/header.php';
require_once 'database.php';

    $query = "SELECT* FROM `ajax_user` ORDER BY ID DESC ";
	$run = mysqli_query($link,$query);

?>
<body>
	<br/>
	<!------ Search bar ---------->
	<div class="container">	
 	 <div class="float-right col-sm-3">	
        <input id="search" placeholder="Search your key" class="form-control" type="text" >
        <div id="search-status" class="form-control"></div>
	</div>
</div>
	
	<div class="container container-fluid">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Add User
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-dark" id="exampleModalLabel">Registration Form</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					<!-- My won Id div tag---->
					<div class="container-fluid text-dark" id="msg"></div>
					<div class="modal-body">
						<form class="form-control">
							<input type="text" id="username" class="form-control my-2" required="" placeholder="Username">
							<input type="email" id="email" class="form-control my-2" required="" placeholder="E-mail">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required=""data-toggle="password" placeholder="Type a password" >
                            <div class="input-group-append">
                           <span id="eye" class="input-group-text">
                           <i id='show' class="fa fa-eye"></i>
                          </span>
                      </div>
                  </div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id='close' data-dismiss="modal">Close</button>
						<button type="button" id="submit" class="btn btn-success">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>
<!-------------------------------- This is the Table Section --------------------------------------->

<section class="container" id="table">
	<div id="deleted"></div>
   <table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   $i = 1;
   while($row = mysqli_fetch_array($run)){ ?>
   	<tr>
      <th scope="row"><?= $i ; ?></th>
      <td ><?= $row['Username']; ?></td>
      <td ><p><?= $row['Email']; ?></p></td>
      <td>
      	<span>
      	<button id="edit" data-toggle="modal" data-target="#exampleModalCenter" data-upvalue = "<?= $row['ID']; ?>" class="btn btn-primary"><i id="edit" class="fas fa-edit"></i></button>
      	<button id="delete" data-myvalue = "<?= $row['ID']; ?>"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
      </span>
     </td>
    </tr>
   <?php $i++; }?>
    
  </tbody>
</table>
</section>

<!---------- Pop up Box ----------->
<section>
	<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Your Expected Data!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="form-id"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-changes" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</section>
<!----------------------------------------------end table section -------------------------------->
<?php require_once 'inc/footer.php'; ?>