<?php
global $conn;
include('inc/header.php');
include('inc/nav.php');
if($_SESSION['login'] != true){
	header('Location: index.php');

}

?>
  <div class="container">
	  <h2 class="pt-2 pt-md-5"> <?php include('inc/greetings.php');?></h2>
     <div class="form-list">

        <div class="row">
		
           <div class="col-sm-12"> 
	     <?php
		 //data deletation query

		 if(isset($_GET['deleteid'])){
			 
			 $id = $_GET['deleteid'];
			 //Sql query
			$del = "delete from  number_info where id ='$id'";
			
			 $delete = mysqli_query($conn,$del);
			 
			 if($delete)if($delete){
				 echo'<div class="container ">
									<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" >
									  Contact Deleted Successfully !!
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
                    </div>' ;
			 }else{
				 echo  '<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				   Data Not Deleted  !
				</div>';
			 }

		 }
		     
		 ?>
	
	
				   <div class="form-head">
					  <h3>Contact Number Management System</h3>
				   </div>
	             <div class="add-number">
				     <a href="addnumber.php" class="btn btn-success">Add Contacts</a>
				 </div>
	<div class="table-responsive table-top">
	     
	      <table class="table table-bordered table-condensed ">
		
				<tr>
					  <th width="8%">Id</th>
					  <th width="25%">Name</th>
					  <th width="15%">Phone Number</th>
					  <th width="10%">email</th>
					  <th width="15%">Person Status</th>
					  <th width="12%">City</th>
					  <th width="20%" colspan="2">ACtion</th>
				 </tr>
		<?php
		//$sql = mysqli_query($conn,"select * from number_info");
		$sql="select * from number_info";
		$result = mysqli_query($conn,$sql);
          $i = 0;
		 while($row = mysqli_fetch_assoc($result)){
			 $i++;
			 ?>
			 
			    <tr>
					  <td width="8%"><?php echo $i;?></td>
					  <td width="25%"><?php echo $row['name'];?></td>
					  <td width="15%"><?php echo $row['number'];?></td>
					  <td width="15%"><?php echo $row['email'];?></td>
					  <td width="12%"><?php echo $row['person'];?></td>
					  <td width="12%"><?php echo $row['city'];?></td>
					  <td width="8%" class="edit">
					  
					     <a href="edit.php?editid=<?php echo $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; &nbsp;&nbsp;Edit</a>
						 
						 </td>
					  <td width="20%" class="delete">
					     <a href="?deleteid=<?php echo $row['id'];?>"
						 onclick="return confirm('Are You Sure To Delete This ID')"
						 >
					      <i class="fa fa-trash" aria-hidden="true"></i>&nbsp; &nbsp;&nbsp;Delete
						 </a>
						</td>
				 </tr>
			 
		<?php } ?>	
                 
				 

				</table>
		      </div> 
	       </div>
        </div> 
     </div>
</div>

<?php
include('inc/footer.php');
?>