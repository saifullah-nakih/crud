<?php
include('inc/header.php');
include('inc/nav.php');

?>
  <div class="container">
     <div class="form-contant2">
        <div class="row">
		
           <div class="col-sm-12"> 
	     <?php
		 if(isset($_GET['deleteid'])){
			 
			 $id = $_GET['deleteid'];
		  
			$del = "delete from  number_info where id ='$id'";
			
			 $delete = mysqli_query($conn,$del);
			 
			 if($delete){
				echo'<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close"
				  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				   Data Deleted Successfully !
				</div>';
			}else{
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
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
				     <a href="addnumber.php" class="btn btn-success">Add Number</a>
				 </div>
	<div class="table-responsive table-top">
	     
	      <table class="table table-bordered table-condensed table-hover">
		
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