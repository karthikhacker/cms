<?php
include('db.php');

if(isset($_POST['create'])){
   
   $cat_id = $_POST['cat_id'];
   $post_title = $_POST['post_title'];
   $post_image = $_FILES['post_image']['name'];
   $post_image_tmp = $_FILES['post_image']['tmp_name'];
   $post_content = $_POST['post_content'];
   $post_date = date("y-m-d");

   move_uploaded_file($post_image_tmp, "../images/$post_image");

   $ins = "INSERT INTO posts (cat_id,post_title,post_image,post_content,post_date) VALUES('$cat_id','$post_title','$post_image','$post_content','$post_date')";
   $run_ins = mysqli_query($con, $ins);

   if($run_ins){
      echo "<h3>Created</h3>";
   }
 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
 <div class="col-md-8">
 
 <form method="post" action="index.php?insert_post" enctype="multipart/form-data">
 	<table class="table">
 	<tr>
 		<td><label>cat id</label></td>
 		<td><input type="text" name="cat_id" class="form-control"></td>
   </tr>
   <tr>
   	<td><label>Post title</label></td>
    <td><input type="text" name="post_title" class="form-control"></td>
   </tr>
   <tr>
   	<td><label>post image</label></td>
   	<td><input type="file" name="post_image" class="form-control"></td>
   </tr>
   <tr>
   	<td><label>post content</label></td>
   	<td><textarea name="post_content" class="form-control"></textarea></td>
   </tr>
   <tr>
      <td><label>Date</label></td>
      <td><input type="text" name="post_date" class="form-control"></td>
   </tr>
   <tr>
   	<td><input type="submit" name="create" class="btn btn-primary btn-lg" value="Create page"></td>
   </tr>
 	</table>
 	</form>
 </div>
</body>
</html>
