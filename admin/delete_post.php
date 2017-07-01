<?php
include("db.php");

if(isset($_GET['delete_post'])){
	$delete_id = $_GET['delete_post'];

	$delete_post = "DELETE FROM posts WHERE post_id = '$delete_id'";
	$del = mysqli_query($con, $delete_post);
	echo "<script>alert('post deleted')</script>";
}

?>