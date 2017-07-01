<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin area</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
 <div class="container">
 	<div class="row">
 	<h1>Manage your content</h1>
 		<div class="col-md-3">
 			<h3>Manage content</h3>
 			<a class="btn btn-info" href="index.php?insert_post">Insert new posts</a>
 			<a class="btn btn-info"  href="index.php?view_post">View all posts</a>
 			<a class="btn btn-info"  href="index.php?insert_cat">Insert new category</a>
 			<a class="btn btn-info"  href="index.php?view_cats">View all category</a>
 			<a class="btn btn-info"  href="index.php?view_comments">View all comments</a>
 			<a class="btn btn-danger"  href="index.php?logout">Admin log out</a>
 		</div>
 		<div class="col-md-8">
 			<h2>Welcome to admin area</h2>
<?php
if(isset($_GET['insert_post'])){
	include('insert_page.php');
}
?>
<?php
if(isset($_GET['view_post'])){
	include('view_post.php');
}
?>
<?php
 if(isset($_GET['edit_post'])){
 	include("edit_post.php");
 }
?>
 		</div>
 	</div>
 </div>
</body>
</html>
