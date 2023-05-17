<?php
include('inc/header.php');
include('inc/nav.php');

?>
<?php
 if(isset($_GET['editid'])){
	  $edit = $_GET['editid'];
 } 
?>
<div class="container">
   <form action="" method="post">
     <div class="form-contant-edit">
        <div class="row">
           <div class="col-sm-12"> 
				   <div class="form-head-edit">
					  <h3>Contact Number Management System</h3>
				   </div>
			<?php
			  if($_SERVER['REQUEST_METHOD'] == 'POST'){
				  $name   = trim($_POST['name']);
				  $phone  = trim($_POST['phone']);
				  $email  = trim($_POST['email']);
				  $person = trim($_POST['person']);
				  $city   = trim($_POST['city']);
				  
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
					echo'<div class="alert alert-success alert-dismissable">
					         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							New Number Updated Successfully.
					    </div>';
					
				}else{
					echo'<div class="alert alert-danger alert-dismissable">
					         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							New Number Not Updated.
					    </div>';
				}  
				  
				  
				  
				  
			  }  
			  
			?>







			
             <div class="form-box"> 
		<?php
		
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
						<select name="person"  class="form-control">
							  <option>Select Person Status</option>
							  <option <?php
							    if(isset($row['person']) && $row['person'] == 'Family'){echo 'selected';}
							  ?> value="Family">Family</option>
							  <option <?php
							    if(isset($row['person']) && $row['person'] == 'Friend'){echo 'selected';}
							  ?>value="Friend">Friend</option>
							  <option <?php
							    if(isset($row['person']) && $row['person'] == 'Coworker'){echo 'selected';}
							  ?> value="Coworker">Coworker</option>
							  <option <?php
							    if(isset($row['person']) && $row['person'] == 'Relative'){echo 'selected';}
							  ?> value="Relative">Relative</option>
							  
						</select>
				 </div>
			 
				 <div class="form-group">
					<label>City : </label>
					<input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>"required autocomplete>
				 </div>
			 
			 
			 
	<?php } ?>	 
	 
	 
				 
				 
			  </div>  
			

			  
		   </div> 

	     </div>
		 
		 <div class="col-sm-offset-4 col-sm-4">
                  <div class="form-group create">
		           <button type="submit" class="btn btn-block" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Update</button>
	              </div>
         </div>
		 
       </div> 
       
    
 </form>

  </div>


<footer>
    <div class="container">
	   <div class="row">
       
	    <h3 class="text-center">&copy; CopyRight By NACTAR --  <?php echo date('Y');?></h3>
   
  
			
       </div>
	</div>
</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>			

    