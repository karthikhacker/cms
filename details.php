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
          if(isset($_GET['post_id'])){
            $post_id = $_GET['post_id'];
            $query = "SELECT * FROM posts WHERE post_id = '$post_id' ";
            $run_query = mysqli_query($con, $query);

            while($q = mysqli_fetch_assoc($run_query)){
                $post_id = $q['post_id'];
                $post_title = $q['post_title'];
                $post_content = $q['post_content'];

                echo "<h1>$post_title</h1>";
                echo "<p class='lead'>$post_content</p>";
            }
          }
 		 ?>
          <h2>Your comments</h2>
          <h4>
          No of comments:
              <?php
               $count = "SELECT * FROM comments WHERE post_id = '$post_id' AND comment_status='approve'";
               $run_count = mysqli_query($con,$count);
               $count_comments = mysqli_num_rows($run_count);
               echo "(" . $count_comments . ")";
              ?>
          </h4>
         <?php
          $c = "SELECT * FROM comments WHERE post_id = '$post_id' AND comment_status ='approve' ";
          $r = mysqli_query($con, $c);
          while($com = mysqli_fetch_assoc($r)){
             $comment_name = $com['comment_name'];
             $comment_text = $com['comment_text'];

             echo "<h4 class='alert alert-info' role='alert'>$comment_name 's comment</h4>";
             echo "<p class='alert alert-danger' role='alert'>$comment_text</p>";
          }
         ?>
       
        <form method="post" action="details.php?post_id=<?php echo $post_id;  ?>">
         <label>Name</label>
         <input type="text" name="comment_name" class="form-control">
         <label>Email</label>
         <input type="text" name="comment_email" class="form-control">
         <label>Your comment</label>
         <textarea name="comment_text" class="form-control"></textarea>
         <br>
         <input type="submit" name="submit" class="btn btn-primary" value="post comment">
            
            
        </form>
        <?php
         if(isset($_POST['comment_text'])){
            $post_id = $post_id;
            $comment_name = $_POST['comment_name'];
            $comment_email = $_POST['comment_email'];
            $comment_text = $_POST['comment_text'];
            $comment_status = "unapprove";

            if($comment_name=='' OR $comment_email=='' OR $comment_text==''){
                echo "<script>alert('please fill in all the fields')</script>";
                exit();
            }else{
                $sql ="INSERT INTO comments(post_id,comment_name,comment_email,comment_text,comment_status) VALUE('$post_id','$comment_name','$comment_email','$comment_text','$comment_status')";
                $run_sql = mysqli_query($con ,$sql);
                echo "<h2>Comment posted</h2>";

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