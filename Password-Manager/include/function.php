<?php 

include 'connection.php';
/**
 * 
 */
class passwordManager
{
	private $conn;
	
	function __construct($a)
	{
		$this->conn = $a;
	}

	//Insert Passwords
	public function insertData($app,$username,$password){

			$query = "INSERT INTO passwords VALUES(?,?,?,?)";
			$stmt = $this->conn->prepare($query);
			$stmt->execute(['',$app,$username,$password]);
			return true;		
	}

	//Login
	public function login($uname,$pwd){

		$query = "SELECT * FROM admin where username=? and password=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$uname,$pwd]);  	
      	$row = $stmt->rowCount();
      	
      	return $row;
	}

	//Display Password
	public function displayPassword($query)
	{
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>

			<tr>
		      <th scope="row"><?php echo $row['Sn'];?></th>
		      <td><?php echo $row['App']; ?></td>
		      <td><?php echo $row['Username']; ?></td>
		      <td><?php echo $row['Password']; ?></td>
		      <td>
		      	<a href="update.php?ID=<?php echo $row['Sn'];?>"><i class='fas fa-pencil-alt' style='color:white;'></i></a>
		      	<a href="delete.php?ID=<?php echo $row['Sn'];?>"><i class='fas fa-times' style='color:red;'></i></a>
		      </td>

		    </tr>

			<?php
		}
	}

	//Delete Data
	public function deleteData($id,$query)
	{
		$stmt = $this->conn->prepare($query);
		$stmt->execute([$id]);
	}


	public function editData($ID)
	{
		$sql = "SELECT * FROM passwords where Sn = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$ID]);

		 ?>
		<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 justify-content-center">
 			<div class="card  bg-transparent text-light border-success">		
		  		<div class="card-body">
					<h4 class="card-title">Password Manager</h4>

				    <p class="card-text">
				    	<form method="POST">
				    		<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
					    	<div class="input-group flex-nowrap mt-5">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">App</span>
							  <input type="text" class="form-control bg-transparent text-light" placeholder="Link/App Name" name="app" value="<?php echo $row['App'];?>">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">Username</span>
							  <input type="text" class="form-control bg-transparent text-light" placeholder="Username" name="username" value="<?php echo $row['Username'];?>">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							  <span class="input-group-text bg-transparent text-light" id="addon-wrapping">Password</span>
							  <input type="text" class="form-control bg-transparent text-light" placeholder="Password" name="password" value="<?php echo $row['Password'];?>">	
							</div>

							<div class="input-group flex-nowrap mt-3">
							 <button name="submit" class="btn btn-outline-success">Submit</button>	
							</div>
						<?php }?>
						</form>
				    </p> <!-- card text -->
 				</div>    <!-- card body -->
			</div> <!-- card -->
		</div>
	</div>
</div>

<?php
	}
	//Update
	public function updateData($ID,$query,$app,$username,$password){
		$stmt = $this->conn->prepare($query);
		$stmt->execute([$app,$username,$password,$ID]);
		return true;
		
	}


}

 ?>