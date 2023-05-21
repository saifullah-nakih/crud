<?php
global $conn;
include('inc/header.php');
include('inc/nav.php');
?>

<div class="container">
  <form action="" method="post">
     <div class="form-reg">
        <div class="row">
           <div class="col-sm-12"> 
				   <div class="form-head-add">
					  <h3>Add Contact</h3>
				   </div>
		<?php
		
		   if($_SERVER['REQUEST_METHOD'] =='POST'){
			   
		        $name     = trim($_POST['name']);
		        $phone    = trim($_POST['phone']);
		        $email    = trim($_POST['email']);
		        $person   = trim($_POST['person']);
		        $city     = trim($_POST['city']);
			 
			 $sql = "insert into number_info(name,number,email,person,city)
			 value('$name','$phone','$email','$person','$city')";
			
			   $result = mysqli_query($conn,$sql);
			
			if($result){
				echo'<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close"
				  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				   Data Inserted Successfully !
				</div>';
				header('Location: dashboard.php');
			}else{
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				   Data Not Inserted  !
				</div>';
			}
			
			
			
		   }
		    
		
		
		?>		 




				 
	  <div class="form-box">
	  
				 <div class="form-group">
					<label>Name : </label>
					<input type="text" class="form-control"  name="name" placeholder="Enter Contact Name" required autocomplete >
				 </div>
				 
				 <div class="form-group">
					<label>Phone Number : </label>
					<input type="text" class="form-control"  name="phone" placeholder="Enter Phone Number" required maxlength="11" autocomplete>
				 </div>
				 
				 <div class="form-group">
					<label>Email : </label>
					<input type="email" class="form-control"  name="email" placeholder="Enter Email" required autocomplete>
				 </div>
				 
				 
				 <div class="form-group">
					<label>Person Status : </label>
						 <select name="person"  class="form-control" required>
							  <option>Select Person Status</option>
							  <option value="Family">Family</option>
							  <option value="Friend">Friend</option>
							  <option value="Coworker">Coworker</option>
							  <option value="Relative">Relative</option>
							  
						</select>
				 </div>
			 
				 <div class="form-group">
					<label>City : </label>
					<input type="text" class="form-control"  name="city" placeholder="Enter City name" required autocomplete>
				 </div>
		   </div> 
	     </div>
		 
		 <div class="col-sm-offset-4 col-sm-12 col-12">
                  <div class="form-group create d-flex justify-content-center">
		           <button type="submit" class="btn btn-block justify-content-center align-items-center"" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Create</button>
	              </div>
         </div>
		 
       </div> 
    </div>
 </form>
</div>

<?php
  include('inc/footer.php');
?>

