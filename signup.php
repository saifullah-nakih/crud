<?php
global $conn;
include('inc/header.php');

?>

<div class="container">
  <form action="" method="post">
     <div class="form-reg">
        <div class="row">
           <div class="col-sm-12"> 
				   <div class="form-head-add">
					  <h3>Join as a New User</h3>

				   </div>
		<?php
		
		   if($_SERVER['REQUEST_METHOD'] =='POST'){

			    $username     = trim($_POST['username']);
			    $email        = trim($_POST['email']);
			    $password     = trim($_POST['password']);

			 $sql = "insert into user_reg(username,email,password)
			 value('$username','$email','$password')";
			
			   $result = mysqli_query($conn,$sql);
			
			if($result){
				echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
      Congratulations on creating your profile. <a href="">Here for log in</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;


			}else{
				echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Congratulations on creating your profile.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
			}
			
			
			
		   }
		    
		
		
		?>		 




				 
	  <div class="form-box">
	  
				 <div class="form-group">
					<label>Username : </label>
					<input type="text" class="form-control"  name="username" placeholder="Enter Contact Name" required autocomplete >
				 </div>
				 
				 <div class="form-group">
					<label>Email : </label>
					<input type="email" class="form-control"  name="email" placeholder="Enter Email" required autocomplete>
				 </div>
		  <div class="form-group">
			  <label>Password </label>
			  <input type="password" class="form-control"  name="password" placeholder=" Enter Password" required maxlength="11" autocomplete>
		  </div>

		   </div> 
	     </div>




		 <div class="col-sm-offset-4 col-sm-12 col-12">
                  <div class="form-group create d-flex justify-content-center">
		           <button type="submit" class="btn btn-block justify-content-center align-items-center" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Sign Up</button>
	              </div>
         </div>

		 
       </div> 
    </div>
 </form>
</div>

<?php
  include('inc/footer.php');
?>

