<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>view post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
 <div class="col-md-10">
 	<table class="table">
 		<tr>
 			<th>Post id</th>
 			<th>Post title</th>
 			<th>Post image</th>
 			<th>Post comments</th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>
 		<?php
          $get = "SELECT * FROM posts";
          $run = mysqli_query($con,$get);
          while($row = mysqli_fetch_assoc($run)){
          	 $post_id = $row['post_id'];
          	 $post_title = $row['post_title'];
          	 $post_image = $row['post_image'];
         ?>
         <tr>
         	<td><?php echo $post_id; ?></td>
         	<td><?php echo $post_title; ?></td>
         	<td><?php echo $post_image; ?></td>
         	<td>
         		<?php
         		 $get_comments = "SELECT * FROM comments WHERE post_id= '$post_id'";
         		 $r = mysqli_query($con, $get_comments);
         		 $count = mysqli_num_rows($r);
         		 echo $count;
                 ?>
         	</td>
         	<td><a class='btn btn-info' href="index.php?edit_post=<?php echo $post_id; ?>">Edit</a></td>
         	<td><a class='btn btn-danger' href='delete_post.php?delete_post=<?php echo $post_id; ?>'>Delete</a></td
         </tr>
         <?php
          }
 		?>
 	</table>
 </div>
</body>
</html>