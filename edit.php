<?php
global $conn;
include('inc/header.php');
include('inc/nav.php');
?>

<?php if(isset($_GET['editid'])){
$edit = $_GET['editid'];
}
?>

<div class="container">
	<form action="" method="post">
		<div class="form-reg">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-head-add">
						<h3>Update Contact</h3>
					</div>
					<?php

					if($_SERVER['REQUEST_METHOD'] =='POST'){

						$name     = trim($_POST['name']);
						$phone    = trim($_POST['phone']);
						$email    = trim($_POST['email']);
						$person   = trim($_POST['person']);
						$city     = trim($_POST['city']);


						$sql2 = "update number_info
				          set
						  name   = '$name',
						  number = '$phone',
						  email  = '$email',
						  person = '$person',
						  city   = '$city'
						  where id = '$edit'";

						$update = mysqli_query($conn,$sql2);

						if($update){
							echo'<div class="container mt-4">
									<div class="alert alert-success alert-dismissible fade show" role="alert">
									 Your Contact Successfully Updated.
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								  </div>' ;


						}else{
							echo'<div class="container mt-4">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
									  This is a primary alert with a close button.
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								  </div>';
						}


					}

					?>


					<div class="form-box">

						<?php
						//Sql query
						$sql ="select * from number_info where id= '$edit'";
						$editdata = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($editdata)){?>

						<div class="form-group">
							<label>Name : </label>
							<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required autocomplete>
						</div>

						<div class="form-group">
							<label>Phone Number : </label>
							<input type="text" class="form-control" name="phone" value="<?php echo $row['number'];?>"required autocomplete>
						</div>

						<div class="form-group">
							<label>Email : </label>
							<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" required autocomplete>
						</div>


						<div class="form-group">
							<label>Person Status : </label>
							<select name="person"  class="form-control" required>
								<option>Select Person Status</option>
								<option
									<?php
									if(isset($row['person']) && $row['person'] == 'Family'){echo 'selected';} ?>
									value="Family">Family</option>
								<option <?php
										if(isset($row['person']) && $row['person'] == 'Friend'){echo 'selected';}
										?>
									value="Friend">Friend</option>
								<option <?php
								if(isset($row['person']) && $row['person'] == 'Coworker'){echo 'selected';}
								?>  value="Coworker">Coworker</option>
								<option value="Relative">Relative</option>

							</select>
						</div>

						<div class="form-group">
							<label>City : </label>
							<input type="text" class="form-control"  name="city" placeholder="Enter City name" required autocomplete>
						</div>
					</div>
					<?php }?>
				</div>

				<div class="col-sm-offset-4 col-sm-12 col-12">
					<div class="form-group create d-flex justify-content-center">
						<button type="submit" class="btn btn-block justify-content-center align-items-center"" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Update</button>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>

<?php
include('inc/footer.php');
?>

