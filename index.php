<?php include('model/model.php');

//object for class Model
$obj=new Model();
//print_r($obj);



//insert Data
if(isset($_POST['submit'])){
	//echo "submit";   check
	//print_r($_POST);
	
	$obj->insertRecords($_POST);   //object banaker uskai function ko call 
}


//$datarecord=$obj->displayRecords();
//print($datarecord);


//update Records
if(isset($_POST['update'])){
	
	//print_r($_POST);
	$obj->updateRecords($_POST);   
}



//delete Records
if(isset($_GET['deleteid'])){
	$delid=$_GET['deleteid'];
	$obj->deleteRecords($delid);   
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud Operations In OOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
</head>
<body>

<div class="container">
     
<h2>Crud Operations In OOP</h2>	 



<?php

if(isset($_GET['msg']) and $_GET['msg']=='ins'){
	
	echo '<div class="alert alert-success">
  <strong>Success!</strong> Record Inserted!
</div>';
	
}


if(isset($_GET['msg']) and $_GET['msg']=='upd'){
	
	echo '<div class="alert alert-info">
  <strong>Success!</strong> Record Updated!
</div>';
	
}


if(isset($_GET['msg']) and $_GET['msg']=='del'){
	
	echo '<div class="alert alert-danger">
  <strong>Delete </strong> Record !
</div>';
	
}


?>


<?php

//fectch data by id for updated/edited 
if(isset($_GET['editid'])){
	$editid=$_GET['editid'];
	$myrecord=$obj->dataFetchById($editid);
	?>
	
	
	<form action="" method="post">

<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" value="<?php echo $myrecord['name']; ?>"  name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control"  value="<?php echo $myrecord['email']; ?>" name="email" id="email" required>
  </div>
  
  <input type="hidden" name="hide" value="<?php echo $myrecord['id'] ?>" ></button>
  <button type="submit" name="update" value="update" class="btn btn-info">Update</button>
</form>	
	
	
	
<?php	
}
else{
	


?>


<form action="" method="post">

<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control"  name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control"   name="email" id="email" required>
  </div>
  
 
  <button type="submit" name="submit" class="btn btn-info">Submit</button>
</form>	


<?php 

}  //else closed
?>

<br>
<br>


<h2>Display Data Records</h2>


<table class="table text-center ">
    <thead class="bg-dark text-white">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>Email</th>
		<th>ACTION</th>
		
      </tr>
	  
    </thead>
	
	
	
	<?php $datarecord=$obj->displayRecords();
          //print_r($datarecord);
		  foreach($datarecord as $value){
			?>
			
			<tr>
		<td><?php echo  $value['id']   ?></td>
        <td><?php echo  $value['name']   ?></td>
        <td><?php echo  $value['email']   ?></td>
		
		<td><a href="index.php?editid=<?php echo $value['id']; ?>" class="btn  btn-info"> Edit </a>
	&nbsp;&nbsp;
		    <a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn  btn-danger"> Delete </a>
		</td>
		
			 
			</tr>
			

			<?php
		      }
	         ?>
   
  </table>		
  
</div>

</body>
</html>
