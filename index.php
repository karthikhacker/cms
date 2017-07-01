<!DOCTYPE html>
<html>
<head>
	<title>cms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
 <nav>
 	<div class="navbar navbar-inverse">
 		<a href="" class="navbar-brand">Codebase</a>
 		
 		<ul class="nav navbar-nav ">
 			<?php
            include("admin/db.php");

            $get = "SELECT * FROM categories";
            $run = mysqli_query($con,$get);
            while($row = mysqli_fetch_assoc($run)){
            	$cat_id = $row['cat_id'];
            	$cat_title = $row['cat_title'];

            	echo "<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
            }             
 			?>
   		</ul>	
 		<form class="navbar-form navbar-right" role="search" method="get" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="search_query" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
 	</div>
 </nav>
 <div class="container">
 	<div class="row">
 		<div class="col-md-8">
 		 <?php
         if(isset($_GET['cat_id'])){
         	$cat_id = $_GET['cat_id'];
         	$post = "SELECT * FROM posts WHERE cat_id = '$cat_id'";
         	$run_post = mysqli_query($con, $post);
         	while($r = mysqli_fetch_assoc($run_post)){
         		$post_id = $r['post_id'];
         		$post_title = $r['post_title'];
         		$post_content = $r['post_content'];
         		$post_date = $r['post_date'];
         		$post_image = $r['post_image'];

         		echo "<h2 class='jumbotron'>$post_title</h2>";
         		echo "<img src='images/$post_image' alt='image'>";
         		echo "<p>$post_content</p>";
         		echo "<p class='lead'>$post_date</p>";
         		echo "<p><a href='details.php?post_id=$post_id' class='btn btn-warning'>Read more</a></p>";
         	}
         }
 		 ?>
 		</div>
 		<div class="col-md-4">
 		<h2>Recent news</h2>
 			<?php
            $sql = "SELECT * FROM recent_post";
            $run_sql = mysqli_query($con, $sql);

            while($s = mysqli_fetch_assoc($run_sql)){
            	$id = $s['id'];
            	$title = $s['title'];
            	$date = $s['date'];

            	echo "<h3><a href=''>$title</a></h3>";
            	echo "<b>$date</b>";
            }

 			?>
 		</div>
 	</div>
 </div>
 <div class="container">
 	<div class="footer">
 		<p>&copy;2016 wwww.cms.com</p>
 	</div>
 </div>
</body>
</html>