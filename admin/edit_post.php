<?php
include('db.php');
 
 if(isset($_GET['edit_post'])){
   $edit_id = $_GET['edit_post'];
   $select_post = "SELECT * FROM posts WHERE post_id = '$edit_id'";
   $run_query = mysqli_query($con,$select_post);
   while($row_post = mysqli_fetch_assoc($run_query)){
      $post_id = $row_post['post_id'];
      $cat_id = $row_post['cat_id'];
      $post_title = $row_post['post_title'];
      $post_image = $row_post['post_image'];
      $post_content = $row_post['post_content'];
      $post_date = $row_post['post_date'];

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
 		<td><input type="text" name="cat_id" class="form-control" value="<?php echo $cat_id; ?>"></td>
   </tr>
   <tr>
   	<td><label>Post title</label></td>
    <td><input type="text" name="post_title" class="form-control" value="<?php echo $post_title; ?>"></td>
   </tr>
   <tr>
   	<td><label>post image</label></td>
   	<td><input type="file" name="post_image" class="form-control"><img src='../images/<?php echo $post_image; ?>'</td>
   </tr>
   <tr>
   	<td><label>post content</label></td>
   	<td><textarea name="post_content" class="form-control"><?php echo $post_content; ?></textarea></td>
   </tr>
   <tr>
      <td><label>Date</label></td>
      <td><input type="text" name="post_date" class="form-control" value="<?php echo $post_date; ?>"></td>
   </tr>
   <tr>
   	<td><input type="submit" name="create" class="btn btn-primary btn-lg" value="Update page"></td>
   </tr>
 	</table>
 	</form>
 </div>
</body>
</html>
