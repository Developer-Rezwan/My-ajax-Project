<?php
require_once 'inc/header.php';
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

<!-------------------------- This is the Table Section -------------------->

<section class="container">
  <div id="deleted"></div>
  <div id="success"></div>
  <div id="live-search"></div>
  <div id="show-table"></div>
</section>
<!-------------------------- End Table Section -------------------->

<!---------- Pop up Box ----------->

	<!-- Button trigger modal -->
<!-- Modal -->
<section>
  <!-- Modal -->
    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel">Update Your Existing Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <!-- My won Id div tag---->
          <div class="container-fluid text-dark" id="msg"></div>
          <div class="modal-body">
            <div id="update-form"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id='close' data-dismiss="modal">Close</button>
            <button type="button" id="save-changes" class="btn btn-success">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<?php require_once 'inc/footer.php'; ?>