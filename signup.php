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
   //empty variable declare
		$usererr = $emailrerr = $passrerr = $compasserr = '';

		   if(isset($_POST['submit'])) {

			   $username = $_POST['username'];
			   $email = $_POST['email'];
			   $password = $_POST['password'];
			   $confirmpassword = $_POST['confirmpassword'];

			   $md5_pass = md5( $password );
			   $md5_compass = md5( $confirmpassword);
			   
			   //Data validation
			   if (empty($username)) {
				   $usererr = '<p class="text-danger">Enter username*</p>';
			   }
			   if (empty($email)) {
				   $emailrerr = '<p class="text-danger">Enter Your Email*</p>';
			   }
			   if (empty($password)) {
				   $passrerr = '<p class="text-danger">Enter Password*</p>';
			   }
			   if (empty($confirmpassword)) {
				   $compasserr = '<p class="text-danger">Confirm Pass*</p>';
			   }
			   if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmpassword)){
                     if($password === $confirmpassword){
						 //Insert Sql data
						 $sql = "insert into user_reg(username,email,password,confirmpassword)
			              value('$username','$email','$md5_pass',' $md5_compass')";
						  $result = mysqli_query($conn,$sql);
						  header('location: index.php?neweusercreated');

				   }else{
						 echo '<p class="text-danger">Password Not Matched*</p>';
					 }
			   }


		   }
		?>		 

				 
	  <div class="form-box">
	  
				 <div class="form-group">

					<label>Username : </label>
					 <?php  if(isset($_POST['submit'])){ echo $usererr ;}?>
					<input type="text" class="form-control"  name="username" placeholder="Enter Contact Name" value="<?php if(isset($_POST['submit'])){ echo $username ;} ?>"  >

				 </div>
				 
				 <div class="form-group">
					<label>Email : </label>
					 <?php  if(isset($_POST['submit'])){ echo $emailrerr ;}?>
					<input type="email" class="form-control"  name="email" placeholder="Enter Email" value="<?php if(isset($_POST['submit'])){ echo $email ;} ?>">
				 </div>
		  <div class="form-group">
			  <label>Password </label>
			  <?php  if(isset($_POST['submit'])){ echo $passrerr ;}?>

			  <input type="password" class="form-control"  name="password" placeholder=" Enter Password" >
		  </div>

		  <div class="form-group">

			  <label>Confirm Password</label>
			  <?php  if(isset($_POST['submit'])){ echo $compasserr ;}?>
			  <input type="password" class="form-control"  name="confirmpassword" placeholder=" Confirm Password" >
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

