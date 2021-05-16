<?php include 'include/header.php'; ?>



<?php 
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		
		$app = $_POST['app'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$result = $obj->insertData($app,$username,$password);
		
		if ($result==true &&isset($_SESSION['uname'])) {
			header("location:index.php?dashboard=true&success=true");
		}

		elseif ($result==true) {
			header("location:index.php?success=true");
		}
		
	}

 ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-sm-6">
			<div class="card bg-transparent text-light border-success">		
		  		<div class="card-body">
					<h4 class="card-title">Password Manager</h4>
					<?php if(isset($_GET['success'])){ ?>
						<div class="alert alert-success" role="alert">
						  Password has been saved successfully
						</div>
					<?php } ?>

				    <p class="card-text">
				    	<form method="POST">
					    	<div class="input-group flex-nowrap mt-5">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">App</span>
							  <input type="text" class="form-control bg-transparent text-light" placeholder="Link/App Name" name="app">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">Username</span>
							  <input type="text" class="form-control bg-transparent text-light" placeholder="Username" name="username">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">Password</span>
							  <input type="password" class="form-control bg-transparent text-light" placeholder="Password" name="password">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							 <button name="submit" class="btn btn-outline-success">Submit</button>	
							</div>
						</form>


						<?php if(empty(isset($_SESSION['uname']))){?>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
							  	Login
							</button>
						<?php } ?>


						<?php if (isset($_SESSION['uname'])) { ?>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#logout">
							  	Logout
							</button>
							
						<?php } ?>
							
					
							
						
					
				    </p> <!-- card text -->
 				</div>    <!-- card body -->
			</div> <!-- card -->
		</div> <!-- col-sm-6 -->


	<?php if(isset($_GET['dashboard']) && isset($_SESSION['uname'])){ ?>
		<div class="col-sm-6">
			<div class="card bg-transparent text-light border-success">
		      	<div class="card-body">
			        <h5 class="card-title">Dashboard</h5>

			        <?php if(isset($_GET['updated'])){
			        	?>
			        	<div class="alert alert-success" role="alert">
						  Updated successfully
						</div>

			       <?php } ?>
						<p class="card-text">
							<table class="table text-light">
								<thead>
								    <tr>
								      <th scope="col">S.N</th>
								      <th scope="col">App</th>
								      <th scope="col">Username</th>
								      <th scope="col">Password</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<tbody>
								   	<?php
								   	 $query = "SELECT * FROM passwords";
								   	 $obj->displayPassword($query);
								   	?> 
								</tbody>
							</table>
						</p>

			        <!-- <a href="#" class="btn btn-outline-dark">Go somewhere</a> -->

		     	</div> <!-- card body -->
		    </div> <!-- card -->
		</div> <!-- col-sm-6 -->
	<?php } ?>	


	</div> <!-- row -->
</div> <!-- container -->





<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>

				      <div class="modal-body">
					      	<form method="POST" action="login.php">

					      		<?php if(isset($_GET['error'])){
					      			echo "Error";
					      		} ?>
						        <div class="input-group flex-nowrap mt-3">
								  <span class="input-group-text" id="addon-wrapping">Username</span>
								  <input type="text" class="form-control" placeholder="Username" name="uname">	
								</div>

								<div class="input-group flex-nowrap mt-3">
								  <span class="input-group-text" id="addon-wrapping">Password</span>
								  <input type="password" class="form-control" placeholder="Password" name="pwd">	
								</div>

								<div class="modal-footer">
					   				 <button name="login" class="btn btn-outline-dark">Login</button>
					  			</div> 
							</form>
					   </div>
				 
				    </div>
				  </div>
				</div>

				<!-- Logout Modal -->
				<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>

				      	<div class="modal-body">
					      	Are you want to logout?
					   	</div>
				 		
				 		<div class="modal-footer">  
					        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					    </div>
				    </div>
				  </div>
				</div>
<?php include 'include/footer.php'; ?>



